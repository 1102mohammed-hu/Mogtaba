<div id="profileModal" class="modal-overlay">
    <div class="modal-card">
        <!-- زينة إضاءة علوية خلفية للمودال -->
        <div class="modal-glow"></div>
        
        <div class="modal-header">
            <h3><i class="fas fa-user-edit"></i> تعديل الملف الشخصي</h3>
 <button type="button" id="closeModal" class="close-btn">&times;</button>        </div>
        
        <!-- الحاوية القابلة للتمرير الداخلي في حال صغر الشاشة -->
        <div class="modal-body">
            <form id="editProfileForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-grid">
                    <div class="form-group">
                        <label><i class="fas fa-briefcase"></i> المسمى الوظيفي</label>
                        <input type="text" name="job_title" value="{{ $user->profile?->job_title }}" required placeholder="مثال: مطور ويب">
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-phone"></i> رقم الهاتف</label>
                        <input type="text" name="phone" value="{{ $user->profile?->phone }}" placeholder="+966 50 000 0000">
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-file-pdf"></i> رابط الـ CV</label>
                        <input type="url" name="cv_url" value="{{ $user->profile?->cv_url }}" placeholder="https://example.com/cv.pdf">
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-star"></i> التخصص/المهارة</label>
                        <input type="text" name="borrow" value="{{ $user->profile?->borrow }}" placeholder="مثال: Laravel, Vue.js">
                    </div>
                    <div class="form-group">
                        <label><i class="fab fa-linkedin"></i>رابط حساب فيسبوك</label>
                        <input type="url" name="social_links" value="{{ $user->profile?->social_links }}" placeholder="https://linkedin.com/in/username">
                    </div>
                    <div class="form-group">
                        <label><i class="fab fa-github"></i>رابط حساب واتساب</label>
                        <input type="url" name="social_links2" value="{{ $user->profile?->social_links2 }}" placeholder="https://github.com/username">
                    </div>
                </div>

                <div class="form-group full-width" style="margin-bottom: 15px;">
                    <label><i class="fas fa-pen"></i> السيرة الذاتية (Bio)</label>
                    <input  value="{{ $user->profile?->bio }}" name="bio" rows="2" placeholder="اكتب نبذة مختصرة عنك..."></input>
                </div>
                
                <div class="form-group full-width" style="margin-bottom: 20px;">
                    <label><i class="fas fa-image"></i> الصورة الشخصية</label>
                    <div class="file-upload-wrapper">
                        <input type="file" id="profile_image" name="profile_image" accept="image/*">
                        <div class="file-upload-trigger">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span>انقر للتصفح أو اسحب الصورة</span>
                        </div>
                    </div>
                </div>

                <button type="submit" class="submit-btn" id="saveBtn">
                    <span class="btn-text">حفظ التغييرات</span>
                    <div class="spinner"></div>
                </button>
            </form>
        </div>
    </div>
</div>

<style>
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');

:root {
    --card-bg: rgba(15, 23, 42, 0.9); /* زيادة التعتيم للوضوح */
    --border-color: rgba(51, 65, 85, 0.6);
    --primary-glow: linear-gradient(135deg, #a855f7, #d946ef);
    --input-focus: #d946ef;
    --text-muted: #94a3b8;
}

/* تم خفض الـ z-index ليكون تحت الـ SweetAlert (الذي يبدأ عادة من 1050 فما فوق) */
.modal-overlay {
    position: fixed; 
    inset: 0; 
    background: rgba(4, 6, 14, 0.75); 
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    display: none; 
    justify-content: center; 
    align-items: center; 
    z-index: 999; /* تم تعديله هنا ليكون أقل من تنبيهات SweetAlert */
    opacity: 0; 
    transition: opacity 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    padding: 20px; /* لضمان وجود مسافة على الشاشات الصغيرة جداً */
}
.modal-overlay.show { 
    display: flex; 
    opacity: 1; 
}

/* التحكم بحجم الكارد وثباته على كافة الشاشات */
.modal-card {
    position: relative;
    background: var(--card-bg); 
    border: 1px solid var(--border-color); 
    border-radius: 20px;
    padding: 24px; 
    width: 100%; 
    max-width: 650px; /* تقليص العرض قليلاً */
    max-height: 90vh; /* يمنع الكارد من الخروج عن نطاق الشاشة الرأسية */
    display: flex;
    flex-direction: column;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6), 0 0 30px rgba(168, 85, 247, 0.1);
    transform: translateY(30px) scale(0.96);
    transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    direction: rtl;
}
.modal-overlay.show .modal-card { 
    transform: translateY(0) scale(1); 
}

/* جسم المودال القابل للتمرير والتدفق */
.modal-body {
    overflow-y: auto;
    padding-right: 4px;
    padding-left: 4px;
    margin-top: 10px;
}

/* تخصيص شكل شريط التمرير ليناسب التصميم الخيالي */
.modal-body::-webkit-scrollbar {
    width: 6px;
}
.modal-body::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.02);
    border-radius: 10px;
}
.modal-body::-webkit-scrollbar-thumb {
    background: rgba(168, 85, 247, 0.3);
    border-radius: 10px;
}
.modal-body::-webkit-scrollbar-thumb:hover {
    background: rgba(217, 70, 239, 0.5);
}

.modal-glow {
    position: absolute;
    top: -40px;
    left: -40px;
    width: 150px;
    height: 150px;
    background: var(--primary-glow);
    filter: blur(80px);
    opacity: 0.2;
    pointer-events: none;
    z-index: 0;
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    padding-bottom: 12px;
    position: relative;
    z-index: 1;
}
.modal-header h3 {
    color: #fff;
    font-size: 1.25rem;
    font-weight: 700;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(to right, #fff, #cbd5e1);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.close-btn {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    color: var(--text-muted);
    width: 32px;
    height: 32px;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    transition: all 0.3s ease;
}
.close-btn:hover {
    background: #ef4444;
    color: white;
    transform: rotate(90deg);
}

.form-grid { 
    display: grid; 
    grid-template-columns: 1fr 1fr; 
    gap: 15px; 
    margin-bottom: 15px;
}
@media (max-width: 550px) {
    .form-grid { grid-template-columns: 1fr; gap: 12px; }
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 6px;
}
.form-group label {
    color: #cbd5e1;
    font-size: 0.85rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 6px;
}
.form-group label i { color: #a855f7; }

.form-group input, .form-group textarea { 
    width: 100%; 
    background: rgba(30, 41, 59, 0.6); 
    border: 1px solid var(--border-color);
    padding: 11px 14px; 
    border-radius: 10px; 
    color: white; 
    font-size: 0.9rem;
    transition: all 0.25s;
}
.form-group input:focus, .form-group textarea:focus {
    outline: none;
    border-color: var(--input-focus);
    box-shadow: 0 0 0 3px rgba(217, 70, 239, 0.15);
}

.file-upload-wrapper {
    position: relative;
    width: 100%;
    height: 50px;
    border: 2px dashed rgba(168, 85, 247, 0.3);
    border-radius: 10px;
    background: rgba(30, 41, 59, 0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}
.file-upload-wrapper input[type="file"] {
    position: absolute;
    width: 100%; height: 100%; opacity: 0; cursor: pointer;
}
.file-upload-trigger {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #94a3b8;
    font-size: 0.85rem;
}

.submit-btn {
    position: relative;
    width: 100%; 
    padding: 14px; 
    background: linear-gradient(135deg, #8b5cf6, #d946ef);
    border: none; 
    border-radius: 10px; 
    color: white; 
    font-weight: 700; 
    font-size: 1rem;
    cursor: pointer;
    box-shadow: 0 5px 15px rgba(217, 70, 239, 0.25);
    transition: all 0.3s;
}
.submit-btn:hover { 
    transform: translateY(-2px); 
    box-shadow: 0 8px 20px rgba(217, 70, 239, 0.4);
}

.spinner {
    display: none;
    width: 18px;
    height: 18px;
    border: 2.5px solid rgba(255,255,255,0.3);
    border-radius: 50%;
    border-top-color: white;
    animation: spin 0.8s ease-in-out infinite;
    position: absolute;
    left: 50%; top: 50%;
    margin-left: -9px; margin-top: -9px;
}
@keyframes spin { to { transform: rotate(360deg); } }

.submit-btn.loading .btn-text { opacity: 0; }
.submit-btn.loading .spinner { display: block; }
.submit-btn:disabled { opacity: 0.7; cursor: not-allowed; transform: none; }
</style>
<script>
document.addEventListener('DOMContentLoaded', function () {

    // =========================
    // Profile Modal
    // =========================

    const openProfileModal = document.getElementById('openProfileModal');
    const profileModal = document.getElementById('profileModal');
    const closeModal = document.getElementById('closeModal');

    if (openProfileModal && profileModal) {

        openProfileModal.addEventListener('click', function (e) {
            e.preventDefault();

            profileModal.classList.add('active');
        });
    }

    if (closeModal && profileModal) {

        closeModal.addEventListener('click', function () {

            profileModal.classList.remove('active');

        });
    }

    // إغلاق عند الضغط خارج النافذة
    if (profileModal) {

        profileModal.addEventListener('click', function (e) {

            if (e.target === profileModal) {
                profileModal.classList.remove('active');
            }

        });
    }


    // =========================
    // Sidebar
    // =========================

    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');

    if (sidebar && sidebarToggle) {

        sidebarToggle.addEventListener('click', function () {

            sidebar.classList.toggle('collapsed');

        });
    }


    // =========================
    // Profile Image
    // =========================

    const profileImage = document.getElementById('profile_image');

    if (profileImage) {

        profileImage.addEventListener('change', function (e) {

            const filename =
                e.target.files[0]?.name ||
                'انقر للتصفح أو اسحب الصورة';

            const span =
                this.nextElementSibling?.querySelector('span');

            if (span) {
                span.textContent = filename;
            }

        });
    }


    // =========================
    // Update Profile
    // =========================

    const editProfileForm =
        document.getElementById('editProfileForm');

    if (editProfileForm) {

        editProfileForm.addEventListener('submit', async function (e) {

            e.preventDefault();

            const btn = document.getElementById('saveBtn');

            if (btn) {
                btn.classList.add('loading');
                btn.disabled = true;
            }

            const formData = new FormData(this);

            formData.append('_method', 'PUT');

            try {

                const response = await fetch(
                    "{{ route('profiles.update') }}",
                    {
                        method: 'POST',

                        body: formData,

                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN':
                                document
                                    .querySelector('meta[name="csrf-token"]')
                                    ?.getAttribute('content')
                        }
                    }
                );

                const result = await response.json();

                if (!response.ok) {

                    let errorMsg =
                        result.message ||
                        'حدث خطأ أثناء تحديث الملف الشخصي';

                    if (result.errors) {

                        errorMsg =
                            Object.values(result.errors)
                                .flat()
                                .join('\n');
                    }

                    throw new Error(errorMsg);
                }


                // نجاح
                if (typeof Swal !== 'undefined') {

                    await Swal.fire({
                        icon: 'success',
                        title: 'تم التحديث بنجاح!',
                        text:
                            result.message ||
                            'تم حفظ بيانات ملفك الشخصي بنجاح',
                        background: '#0f172a',
                        color: '#fff',
                        confirmButtonColor: '#6366f1'
                    });

                } else {

                    alert(
                        result.message ||
                        'تم تحديث الملف الشخصي بنجاح'
                    );
                }


                // إغلاق المودال
                if (profileModal) {
                    profileModal.classList.remove('active');
                }

                // تحديث الصفحة
                window.location.reload();

            } catch (error) {

                console.error(error);

                if (typeof Swal !== 'undefined') {

                    Swal.fire({
                        icon: 'error',
                        title: 'خطأ في التحديث',
                        text:
                            error.message ||
                            'حدث خطأ غير متوقع',
                        background: '#0f172a',
                        color: '#fff',
                        confirmButtonColor: '#ef4444'
                    });

                } else {

                    alert(error.message);

                }

            } finally {

                if (btn) {
                    btn.classList.remove('loading');
                    btn.disabled = false;
                }

            }

        });
    }

});
</script>
<!-- =========================================================
     ACCOUNT SETTINGS MODAL
========================================================= -->

<div id="accountModal" class="account-modal">

    <div class="account-modal-content">

        <!-- Ambient Glow -->
        <div class="account-modal-glow"></div>


        <!-- =================================================
             HEADER
        ================================================== -->

        <div class="account-modal-header">

            <div class="account-modal-title">

                <div class="account-title-icon">
                    <i class="fa-solid fa-user-gear"></i>
                </div>

                <div>
                    <span>إعدادات الحساب</span>

                    <h2>
                        تعديل بياناتك
                    </h2>

                    <p>
                        حدّث معلومات حسابك وبياناتك الشخصية
                    </p>
                </div>

            </div>


            <button
                type="button"
                id="closeAccountModal"
                class="account-close"
                aria-label="إغلاق"
            >
                <i class="fa-solid fa-xmark"></i>
            </button>

        </div>



        <!-- =================================================
             FORM
        ================================================== -->

        <form
            action="{{ route('account.update') }}"
            method="POST"
            class="account-form"
        >

            @csrf
            @method('PUT')


            <!-- SCROLLABLE CONTENT -->

            <div class="account-modal-scroll">


                <!-- =========================================
                     ACCOUNT INFORMATION
                ========================================== -->

                <div class="account-section">

                    <div class="account-section-heading">

                        <div class="section-icon">
                            <i class="fa-solid fa-user"></i>
                        </div>

                        <div>
                            <h3>المعلومات الأساسية</h3>
                            <p>المعلومات المرتبطة بحسابك</p>
                        </div>

                    </div>


                    <!-- NAME -->

                    <div class="account-field">

                        <label for="account_name">
                            <i class="fa-solid fa-user"></i>
                            الاسم
                        </label>

                        <div class="account-input-wrapper">

                            <input
                                id="account_name"
                                type="text"
                                name="name"
                                value="{{ auth()->user()->name }}"
                                placeholder="أدخل اسمك"
                                autocomplete="name"
                                required
                            >

                            <i class="fa-solid fa-pen account-input-icon"></i>

                        </div>

                    </div>


                    <!-- EMAIL -->

                    <div class="account-field">

                        <label for="account_email">
                            <i class="fa-solid fa-envelope"></i>
                            البريد الإلكتروني
                        </label>

                        <div class="account-input-wrapper">

                            <input
                                id="account_email"
                                type="email"
                                name="email"
                                value="{{ auth()->user()->email }}"
                                placeholder="example@email.com"
                                autocomplete="email"
                                required
                            >

                            <i class="fa-solid fa-at account-input-icon"></i>

                        </div>

                    </div>

                </div>



                <!-- =========================================
                     PASSWORD
                ========================================== -->

                <div class="account-section">

                    <div class="account-section-heading">

                        <div class="section-icon password">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>

                        <div>
                            <h3>الأمان وكلمة المرور</h3>

                            <p>
                                اترك الحقول فارغة إذا لم ترغب بالتغيير
                            </p>
                        </div>

                    </div>


                    <!-- NEW PASSWORD -->

                    <div class="account-field">

                        <label for="account_password">
                            <i class="fa-solid fa-lock"></i>
                            كلمة المرور الجديدة
                        </label>

                        <div class="account-input-wrapper password-wrapper">

                            <input
                                id="account_password"
                                type="password"
                                name="password"
                                placeholder="أدخل كلمة مرور جديدة"
                                autocomplete="new-password"
                            >

                            <button
                                type="button"
                                class="password-toggle"
                                data-target="account_password"
                                aria-label="إظهار كلمة المرور"
                            >
                                <i class="fa-solid fa-eye"></i>
                            </button>

                        </div>

                    </div>


                    <!-- CONFIRM PASSWORD -->

                    <div class="account-field">

                        <label for="account_password_confirmation">
                            <i class="fa-solid fa-circle-check"></i>
                            تأكيد كلمة المرور
                        </label>

                        <div class="account-input-wrapper password-wrapper">

                            <input
                                id="account_password_confirmation"
                                type="password"
                                name="password_confirmation"
                                placeholder="أعد كتابة كلمة المرور"
                                autocomplete="new-password"
                            >

                            <button
                                type="button"
                                class="password-toggle"
                                data-target="account_password_confirmation"
                                aria-label="إظهار كلمة المرور"
                            >
                                <i class="fa-solid fa-eye"></i>
                            </button>

                        </div>

                    </div>

                </div>



                <!-- =========================================
                     SECURITY NOTE
                ========================================== -->

                <div class="account-security-note">

                    <div class="security-note-icon">
                        <i class="fa-solid fa-lock"></i>
                    </div>

                    <div>

                        <strong>
                            حماية حسابك
                        </strong>

                        <p>
                            استخدم كلمة مرور قوية تحتوي على أحرف
                            وأرقام ورموز لحماية حسابك.
                        </p>

                    </div>

                </div>


            </div>



            <!-- =================================================
                 ACTIONS
            ================================================== -->

            <div class="account-modal-actions">

                <button
                    type="button"
                    id="cancelAccountModal"
                    class="account-btn cancel"
                >
                    <i class="fa-solid fa-xmark"></i>
                    إلغاء
                </button>


                <button
                    type="submit"
                    class="account-btn save"
                >

                    <span>
                        <i class="fa-solid fa-check"></i>
                        حفظ التغييرات
                    </span>

                    <i class="fa-solid fa-arrow-left save-arrow"></i>

                </button>

            </div>

        </form>

    </div>

</div>



<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    const modal = document.getElementById('accountModal');

    const openBtn = document.getElementById('openAccountModal');

    const closeBtn = document.getElementById('closeAccountModal');

    const cancelBtn = document.getElementById('cancelAccountModal');


    if (!modal) return;


    /* =====================================================
       OPEN
    ====================================================== */

    function openAccountModal() {

        modal.classList.add('is-open');

        document.body.classList.add('account-modal-open');

    }


    /* =====================================================
       CLOSE
    ====================================================== */

    function closeAccountModal() {

        modal.classList.remove('is-open');

        document.body.classList.remove('account-modal-open');

    }


    /* =====================================================
       OPEN BUTTON
    ====================================================== */

    if (openBtn) {

        openBtn.addEventListener('click', function (e) {

            e.preventDefault();

            openAccountModal();

        });

    }


    /* =====================================================
       CLOSE BUTTON
    ====================================================== */

    if (closeBtn) {

        closeBtn.addEventListener('click', function () {

            closeAccountModal();

        });

    }


    /* =====================================================
       CANCEL
    ====================================================== */

    if (cancelBtn) {

        cancelBtn.addEventListener('click', function () {

            closeAccountModal();

        });

    }


    /* =====================================================
       CLICK OUTSIDE
    ====================================================== */

    modal.addEventListener('click', function (e) {

        if (e.target === modal) {

            closeAccountModal();

        }

    });


    /* =====================================================
       ESCAPE KEY
    ====================================================== */

    document.addEventListener('keydown', function (e) {

        if (
            e.key === 'Escape' &&
            modal.classList.contains('is-open')
        ) {

            closeAccountModal();

        }

    });


    /* =====================================================
       PASSWORD TOGGLE
    ====================================================== */

    const passwordToggles =
        document.querySelectorAll('.password-toggle');


    passwordToggles.forEach(function (button) {

        button.addEventListener('click', function () {

            const targetId = button.dataset.target;

            const input = document.getElementById(targetId);

            if (!input) return;


            if (input.type === 'password') {

                input.type = 'text';

                button.innerHTML =
                    '<i class="fa-solid fa-eye-slash"></i>';

            } else {

                input.type = 'password';

                button.innerHTML =
                    '<i class="fa-solid fa-eye"></i>';

            }

        });

    });

});

</script>



<!-- =========================================================
     CSS
========================================================= -->

<style>

/* ============================================================
   ROOT
============================================================ */

.account-modal {
    position: fixed;
    inset: 0;

    width: 100%;
    height: 100dvh;

    z-index: 99999;

    display: flex;

    align-items: center;
    justify-content: center;

    padding: 20px;

    background:
        radial-gradient(
            circle at 50% 20%,
            rgba(6, 78, 59, 0.12),
            transparent 45%
        ),
        rgba(2, 15, 11, 0.72);

    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);

    opacity: 0;
    visibility: hidden;

    transition:
        opacity 0.3s ease,
        visibility 0.3s ease;
}


/* ============================================================
   OPEN STATE
============================================================ */

.account-modal.is-open {

    opacity: 1;

    visibility: visible;
}


/* ============================================================
   BODY LOCK
============================================================ */

body.account-modal-open {

    overflow: hidden !important;
}


/* ============================================================
   MODAL CONTENT
============================================================ */

.account-modal-content {

    position: relative;

    width: 100%;

    max-width: 620px;

    max-height: calc(100dvh - 40px);

    display: flex;

    flex-direction: column;

    overflow: hidden;

    background:
        linear-gradient(
            145deg,
            #ffffff 0%,
            #fbfdfc 55%,
            #f7faf9 100%
        );

    border: 1px solid rgba(255,255,255,0.8);

    border-radius: 28px;

    box-shadow:
        0 40px 100px rgba(0,0,0,0.30),
        0 15px 40px rgba(6,78,59,0.12);

    transform:
        translateY(25px)
        scale(0.96);

    transition:
        transform 0.35s cubic-bezier(.2,.8,.2,1);

}


/* ============================================================
   OPEN ANIMATION
============================================================ */

.account-modal.is-open
.account-modal-content {

    transform:
        translateY(0)
        scale(1);
}


/* ============================================================
   AMBIENT GLOW
============================================================ */

.account-modal-glow {

    position: absolute;

    width: 260px;
    height: 260px;

    top: -150px;
    right: -100px;

    background:
        radial-gradient(
            circle,
            rgba(184,155,94,0.16),
            transparent 70%
        );

    pointer-events: none;
}


/* ============================================================
   HEADER
============================================================ */

.account-modal-header {

    position: relative;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: space-between;

    gap: 20px;

    padding: 24px 28px 20px;

    border-bottom: 1px solid #edf1ef;

    background:
        rgba(255,255,255,0.94);

    z-index: 2;
}


/* ============================================================
   TITLE
============================================================ */

.account-modal-title {

    display: flex;

    align-items: center;

    gap: 14px;

    min-width: 0;
}


.account-title-icon {

    width: 48px;
    height: 48px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 15px;

    background:
        linear-gradient(
            135deg,
            #064e3b,
            #087052
        );

    color: #ffffff;

    font-size: 19px;

    box-shadow:
        0 8px 20px rgba(6,78,59,0.20);
}


.account-modal-header span {

    display: block;

    margin-bottom: 3px;

    color: #b89b5e;

    font-size: 11px;

    font-weight: 800;

    letter-spacing: 0.5px;
}


.account-modal-header h2 {

    margin: 0;

    color: #064e3b;

    font-size: 24px;

    line-height: 1.3;

    font-weight: 850;
}


.account-modal-header p {

    margin: 4px 0 0;

    color: #7a8790;

    font-size: 12px;

    line-height: 1.5;
}


/* ============================================================
   CLOSE BUTTON
============================================================ */

.account-close {

    width: 42px;
    height: 42px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border: 1px solid #e8eeeb;

    border-radius: 13px;

    background: #f7f9f8;

    color: #64706c;

    cursor: pointer;

    font-size: 17px;

    transition:
        background 0.25s ease,
        color 0.25s ease,
        transform 0.25s ease,
        border-color 0.25s ease;
}


.account-close:hover {

    background: #064e3b;

    border-color: #064e3b;

    color: #ffffff;

    transform: rotate(90deg);
}


/* ============================================================
   FORM
============================================================ */

.account-form {

    min-height: 0;

    display: flex;

    flex-direction: column;

    flex: 1;
}


/* ============================================================
   SCROLL AREA
============================================================ */

.account-modal-scroll {

    flex: 1;

    min-height: 0;

    overflow-y: auto;

    padding: 24px 28px 10px;

    overscroll-behavior: contain;

    scrollbar-width: thin;

    scrollbar-color:
        #b89b5e
        transparent;
}


/* Chrome / Edge / Safari */

.account-modal-scroll::-webkit-scrollbar {

    width: 6px;
}


.account-modal-scroll::-webkit-scrollbar-track {

    background: transparent;
}


.account-modal-scroll::-webkit-scrollbar-thumb {

    background: #b89b5e;

    border-radius: 20px;
}


.account-modal-scroll::-webkit-scrollbar-thumb:hover {

    background: #064e3b;
}


/* ============================================================
   SECTION
============================================================ */

.account-section {

    margin-bottom: 24px;

    padding: 20px;

    border: 1px solid #e9efec;

    border-radius: 18px;

    background:
        linear-gradient(
            145deg,
            #ffffff,
            #fbfcfc
        );

    box-shadow:
        0 5px 18px rgba(6,78,59,0.035);
}


/* ============================================================
   SECTION HEADING
============================================================ */

.account-section-heading {

    display: flex;

    align-items: center;

    gap: 12px;

    margin-bottom: 20px;

    padding-bottom: 15px;

    border-bottom: 1px dashed #e2e9e5;
}


.section-icon {

    width: 36px;
    height: 36px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 11px;

    background: rgba(6,78,59,0.08);

    color: #064e3b;

    font-size: 14px;
}


.section-icon.password {

    background: rgba(184,155,94,0.12);

    color: #a07e3d;
}


.account-section-heading h3 {

    margin: 0;

    color: #263b34;

    font-size: 15px;

    font-weight: 800;
}


.account-section-heading p {

    margin: 3px 0 0;

    color: #8a9691;

    font-size: 11px;
}


/* ============================================================
   FIELD
============================================================ */

.account-field {

    margin-bottom: 17px;
}


.account-field:last-child {

    margin-bottom: 0;
}


.account-field label {

    display: flex;

    align-items: center;

    gap: 7px;

    margin-bottom: 8px;

    color: #34463f;

    font-size: 13px;

    font-weight: 750;
}


.account-field label i {

    color: #b89b5e;

    font-size: 12px;
}


/* ============================================================
   INPUT WRAPPER
============================================================ */

.account-input-wrapper {

    position: relative;

    width: 100%;
}


.account-field input {

    width: 100%;

    height: 48px;

    box-sizing: border-box;

    padding:
        0 44px
        0 15px;

    border: 1px solid #e0e8e4;

    border-radius: 13px;

    outline: none;

    background: #f9fbfa;

    color: #1e3029;

    font-family: inherit;

    font-size: 13px;

    transition:
        border-color 0.25s ease,
        background 0.25s ease,
        box-shadow 0.25s ease,
        transform 0.25s ease;
}


.account-field input::placeholder {

    color: #a8b1ad;
}


.account-field input:hover {

    border-color: #cbd8d2;

    background: #ffffff;
}


.account-field input:focus {

    border-color: #0b6b4d;

    background: #ffffff;

    box-shadow:
        0 0 0 4px rgba(6,78,59,0.08);

    transform: translateY(-1px);
}


/* ============================================================
   INPUT ICON
============================================================ */

.account-input-icon {

    position: absolute;

    right: 15px;

    top: 50%;

    transform: translateY(-50%);

    color: #a0aaa5;

    font-size: 13px;

    pointer-events: none;

    transition: color 0.2s ease;
}


.account-input-wrapper:focus-within
.account-input-icon {

    color: #064e3b;
}


/* ============================================================
   PASSWORD
============================================================ */

.password-wrapper input {

    padding-right: 15px;

    padding-left: 48px;
}


.password-toggle {

    position: absolute;

    left: 8px;

    top: 50%;

    transform: translateY(-50%);

    width: 34px;
    height: 34px;

    display: flex;

    align-items: center;
    justify-content: center;

    border: 0;

    border-radius: 9px;

    background: transparent;

    color: #87938e;

    cursor: pointer;

    transition:
        background 0.2s ease,
        color 0.2s ease;
}


.password-toggle:hover {

    background: rgba(6,78,59,0.08);

    color: #064e3b;
}


/* ============================================================
   SECURITY NOTE
============================================================ */

.account-security-note {

    display: flex;

    align-items: flex-start;

    gap: 12px;

    margin: 0 0 15px;

    padding: 15px 16px;

    border: 1px solid rgba(184,155,94,0.22);

    border-radius: 15px;

    background:
        linear-gradient(
            135deg,
            rgba(184,155,94,0.08),
            rgba(184,155,94,0.035)
        );
}


.security-note-icon {

    width: 34px;
    height: 34px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 10px;

    background: rgba(184,155,94,0.13);

    color: #a07e3d;

    font-size: 13px;
}


.account-security-note strong {

    display: block;

    margin-bottom: 3px;

    color: #705626;

    font-size: 12px;

    font-weight: 800;
}


.account-security-note p {

    margin: 0;

    color: #8a7651;

    font-size: 11px;

    line-height: 1.6;
}


/* ============================================================
   ACTIONS
============================================================ */

.account-modal-actions {

    position: relative;

    flex-shrink: 0;

    display: flex;

    gap: 12px;

    padding: 18px 28px 24px;

    border-top: 1px solid #edf1ef;

    background:
        rgba(255,255,255,0.97);

    z-index: 3;
}


/* ============================================================
   BUTTON
============================================================ */

.account-btn {

    min-height: 48px;

    border: 0;

    border-radius: 13px;

    display: flex;

    align-items: center;
    justify-content: center;

    gap: 8px;

    font-family: inherit;

    font-size: 13px;

    font-weight: 800;

    cursor: pointer;

    transition:
        transform 0.2s ease,
        box-shadow 0.2s ease,
        background 0.2s ease;
}


.account-btn.cancel {

    flex: 0.7;

    background: #f1f4f3;

    color: #596761;
}


.account-btn.cancel:hover {

    background: #e6ebe9;

    transform: translateY(-1px);
}


.account-btn.save {

    flex: 1.3;

    padding: 0 18px;

    justify-content: space-between;

    background:
        linear-gradient(
            135deg,
            #064e3b,
            #087052
        );

    color: #ffffff;

    box-shadow:
        0 8px 20px rgba(6,78,59,0.18);
}


.account-btn.save:hover {

    transform: translateY(-2px);

    box-shadow:
        0 12px 28px rgba(6,78,59,0.25);
}


.account-btn.save span {

    display: flex;

    align-items: center;

    gap: 8px;
}


.save-arrow {

    color: #d9c18d;

    transition:
        transform 0.2s ease;
}


.account-btn.save:hover
.save-arrow {

    transform: translateX(-4px);
}


/* ============================================================
   MOBILE
============================================================ */

@media (max-width: 600px) {

    .account-modal {

        padding: 10px;

        align-items: center;
    }


    .account-modal-content {

        max-height: calc(100dvh - 20px);

        border-radius: 22px;
    }


    .account-modal-header {

        padding:
            18px
            18px
            16px;
    }


    .account-title-icon {

        width: 42px;
        height: 42px;

        border-radius: 13px;

        font-size: 16px;
    }


    .account-modal-header h2 {

        font-size: 20px;
    }


    .account-modal-header p {

        display: none;
    }


    .account-close {

        width: 38px;
        height: 38px;

        border-radius: 11px;
    }


    .account-modal-scroll {

        padding:
            18px
            18px
            8px;
    }


    .account-section {

        padding: 16px;

        border-radius: 16px;

        margin-bottom: 18px;
    }


    .account-section-heading {

        margin-bottom: 16px;
    }


    .account-field {

        margin-bottom: 15px;
    }


    .account-modal-actions {

        padding:
            14px
            18px
            18px;
    }

}


/* ============================================================
   VERY SMALL SCREENS
============================================================ */

@media (max-height: 700px) {

    .account-modal {

        align-items: flex-start;

        padding-top: 10px;

        padding-bottom: 10px;
    }


    .account-modal-content {

        max-height: calc(100dvh - 20px);

        border-radius: 20px;
    }


    .account-modal-header {

        padding:
            14px
            18px;
        margin: 0;
    }


    .account-title-icon {

        width: 38px;
        height: 38px;
    }


    .account-modal-header h2 {

        font-size: 18px;
    }


    .account-modal-scroll {

        padding-top: 15px;
    }


    .account-section {

        padding: 14px;

        margin-bottom: 14px;
    }


    .account-section-heading {

        margin-bottom: 13px;

        padding-bottom: 11px;
    }


    .account-field input {

        height: 44px;
    }


    .account-modal-actions {

        padding:
            12px
            18px
            15px;
    }


    .account-btn {

        min-height: 44px;
    }

}


/* ============================================================
   REDUCED MOTION
============================================================ */

@media (prefers-reduced-motion: reduce) {

    .account-modal,
    .account-modal-content,
    .account-btn,
    .account-close,
    .account-field input {

        transition: none !important;

        animation: none !important;
    }

}

</style>