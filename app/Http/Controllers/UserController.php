<?php

namespace App\Http\Controllers;

use App\Http\Requests\userRequest;
use App\Http\Resources\UserResource;
use App\Models\Poem;
use App\Models\Profile;
use App\Models\projects;
use App\Models\services;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'الاسم مطلوب',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني غير صحيح',
            'email.unique' => 'البريد الإلكتروني مستخدم بالفعل',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.min' => 'كلمة المرور يجب أن تكون 8 أحرف على الأقل',
            'password.confirmed' => 'تأكيد كلمة المرور غير متطابق',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect('/')->with('success', 'تم إنشاء الحساب بنجاح');
    }
    // public function createUser(userRequest $Request)
    // {
    //     $valiDate = $Request->validated();
    //     $user = User::create($valiDate);
    //     return response()->json($user);
    // }

    public function login(Request $request)
    {
        $request->validate([

            'email' => 'required|string|email',
            'password' => 'required|string',

        ]);


        if (!Auth::attempt($request->only('email', 'password'))) {

            return back()
                ->with('error', 'البريد الإلكتروني أو كلمة المرور غير صحيحة')
                ->withInput();
        }


        $request->session()->regenerate();


        return redirect()->route('dashboard.index');
    }

    public function getAllProject()
    {
        // $projects_id = Auth::user()->projects()->get();
        $projects = projects::all();

        return view('components.projects', compact('projects'));
    }

    public function getUserByResource()
    {
        $user_id = Auth::user()->id;
        $userData = User::with('profile')->with('projects')->with('services')->find($user_id);
        return new UserResource($userData);
    }
    public function getMyInfo()
    {

        $userData = User::with('profile')->with('projects')->with('services')->first();
        return new UserResource($userData);
    }
    public function showAll()
    {
        $userData = User::with('profile')->with('projects')->with('services')->first();
        return view('components.hero', compact('userData'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // 2. إبطال الجلسة الحالية لضمان الأمان
        $request->session()->invalidate();

        // 3. إعادة إنتاج CSRF Token لحماية الطلبات القادمة
        $request->session()->regenerateToken();

        // 4. إعادة التوجيه إلى صفحة تسجيل الدخول أو الرئيسية
        return redirect()->route('login')->with('success', 'تم تسجيل الخروج بنجاح!');
    }


    public function updateAccount(Request $request)
{
    $user = Auth::user();

    $validated = $request->validate([
        'name' => 'required|string|max:255',

        'email' => [
            'required',
            'email',
            'max:255',
            Rule::unique('users', 'email')->ignore($user->id),
        ],

        'password' => 'nullable|string|min:8|confirmed',
    ], [
        'name.required' => 'الاسم مطلوب',
        'name.max' => 'الاسم طويل جدًا',

        'email.required' => 'البريد الإلكتروني مطلوب',
        'email.email' => 'البريد الإلكتروني غير صحيح',
        'email.unique' => 'البريد الإلكتروني مستخدم بالفعل',

        'password.min' => 'كلمة المرور يجب أن تكون 8 أحرف على الأقل',
        'password.confirmed' => 'تأكيد كلمة المرور غير متطابق',
    ]);

    $user->name = $validated['name'];
    $user->email = $validated['email'];

    // تغيير كلمة المرور فقط إذا تم إدخال كلمة مرور جديدة
    if (!empty($validated['password'])) {
        $user->password = Hash::make($validated['password']);
    }

    $user->save();

    return back()->with('success', 'تم تحديث بيانات الحساب بنجاح');
}
}
