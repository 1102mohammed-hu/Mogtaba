@extends('layouts.app')

@section('title', 'إنشاء حساب')

@section('content')

<div class="min-h-screen flex items-center justify-center px-6 py-10">

    <div class="w-full max-w-md">

        {{-- الأخطاء --}}
        @if ($errors->any())
            <div class="mb-6 bg-red-500/10 border border-red-500/30
                        text-red-400 rounded-2xl p-5">

                <ul class="space-y-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif


        <div class="bg-slate-900/80 backdrop-blur-xl
                    border border-slate-700
                    rounded-[35px]
                    p-10 shadow-2xl">


            {{-- Logo --}}

            <div class="text-center mb-8">

                <div class="w-24 h-24 mx-auto rounded-full
                            bg-indigo-600
                            flex items-center justify-center
                            text-5xl shadow-lg">

                    👤

                </div>

                <h1 class="text-3xl font-black text-white mt-6">
                    إنشاء حساب
                </h1>

                <p class="text-slate-400 mt-3">
                    أنشئ حسابك للوصول إلى النظام
                </p>

            </div>


            {{-- Register Form --}}

            <form method="POST" action="{{ route('register.post') }}">

                @csrf


                {{-- Name --}}

                <div class="mb-6">

                    <label class="block text-white font-bold mb-3">
                        الاسم
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="w-full px-5 py-4 rounded-2xl
                               bg-slate-950
                               border border-slate-700
                               text-white
                               focus:border-indigo-500
                               outline-none transition"
                        placeholder="أدخل اسمك"
                        required
                    >

                </div>


                {{-- Email --}}

                <div class="mb-6">

                    <label class="block text-white font-bold mb-3">
                        البريد الإلكتروني
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="w-full px-5 py-4 rounded-2xl
                               bg-slate-950
                               border border-slate-700
                               text-white
                               focus:border-indigo-500
                               outline-none transition"
                        placeholder="example@email.com"
                        required
                    >

                </div>


                {{-- Password --}}

                <div class="mb-6">

                    <label class="block text-white font-bold mb-3">
                        كلمة المرور
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="w-full px-5 py-4 rounded-2xl
                               bg-slate-950
                               border border-slate-700
                               text-white
                               focus:border-indigo-500
                               outline-none transition"
                        placeholder="********"
                        required
                    >

                </div>


                {{-- Confirm Password --}}

                <div class="mb-8">

                    <label class="block text-white font-bold mb-3">
                        تأكيد كلمة المرور
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        class="w-full px-5 py-4 rounded-2xl
                               bg-slate-950
                               border border-slate-700
                               text-white
                               focus:border-indigo-500
                               outline-none transition"
                        placeholder="********"
                        required
                    >

                </div>


                {{-- Button --}}

                <button
                    type="submit"
                    class="w-full py-4 rounded-2xl
                           bg-gradient-to-r from-indigo-600 to-purple-600
                           hover:from-indigo-700 hover:to-purple-700
                           text-white
                           font-black
                           text-lg
                           transition
                           hover:-translate-y-1">

                    إنشاء الحساب

                </button>

            </form>


            {{-- Login Link --}}

            <div class="text-center mt-6">

                <span class="text-slate-400">
                    لديك حساب بالفعل؟
                </span>

                <a
                    href="{{ route('login') }}"
                    class="text-indigo-400 hover:text-indigo-300 font-bold mr-2">

                    تسجيل الدخول

                </a>

            </div>


        </div>

    </div>

</div>

@endsection