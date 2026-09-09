<nav class="premium-nav">

    <div class="nav-container">

        <!-- ==========================================
             LOGO
        =========================================== -->

        <a href="/" class="logo">



            <span>
                {{ Str::before($userData->name, ' ') }}
            </span>
            <h1>
                {{ Str::after($userData->name, ' ') }}
            </h1>
        </a>


        <!-- ==========================================
             DESKTOP LINKS
        =========================================== -->

        <div class="nav-links">

            <a href="/" class="nav-item">
                <i class="fa-solid fa-house"></i>
                <span>الرئيسية</span>
            </a>


            <a href="{{ route('projects.show') }}" class="nav-item">
                <i class="fa-solid fa-folder-open"></i>
                <span>المشاريع</span>
            </a>


            <a href="{{ route('services.show') }}" class="nav-item">
                <i class="fa-solid fa-layer-group"></i>
                <span>الخدمات</span>
            </a>


            <a href="{{ route('poem.show') }}" class="nav-item">
                <i class="fa-solid fa-feather-pointed"></i>
                <span>القصائد</span>
            </a>

        </div>


        <!-- ==========================================
             MOBILE MENU BUTTON
        =========================================== -->

        <button
            type="button"
            class="mobile-menu-btn"
            id="mobileMenuBtn"
            aria-label="فتح القائمة"
            aria-expanded="false"
        >

            <span></span>
            <span></span>
            <span></span>

        </button>

    </div>

</nav>



<!-- =========================================================
     MOBILE MENU
========================================================= -->

<div class="mobile-menu-overlay" id="mobileMenuOverlay">

    <div class="mobile-menu">

        <!-- Decorative lights -->

        <div class="mobile-glow mobile-glow-1"></div>
        <div class="mobile-glow mobile-glow-2"></div>


        <!-- ==========================================
             MOBILE HEADER
        =========================================== -->

        <div class="mobile-menu-header">

            <div class="mobile-menu-brand">

                <div class="mobile-brand-icon">
                 💦
                </div>

                <div>

                    <span>WELCOME</span>

                    <strong>
                        {{ $userData->name }}
                    </strong>

                </div>

            </div>


            <button
                type="button"
                class="mobile-close-btn"
                id="mobileCloseBtn"
                aria-label="إغلاق القائمة"
            >
             </button>

        </div>



        <!-- ==========================================
             MOBILE LINKS
        =========================================== -->

        <div class="mobile-menu-links">


            <a href="/" class="mobile-nav-item">

                <div class="mobile-nav-icon">
                    <i class="fa-solid fa-house"></i>
                </div>

                <div class="mobile-nav-text">

                    <strong>الرئيسية</strong>

                    <span>الصفحة الرئيسية</span>

                </div>

                <i class="fa-solid fa-arrow-left mobile-arrow"></i>

            </a>



            <a
                href="{{ route('projects.show') }}"
                class="mobile-nav-item"
            >

                <div class="mobile-nav-icon">
                    <i class="fa-solid fa-folder-open"></i>
                </div>

                <div class="mobile-nav-text">

                    <strong>المشاريع</strong>

                    <span>استكشف أعمالي ومشاريعي</span>

                </div>

                <i class="fa-solid fa-arrow-left mobile-arrow"></i>

            </a>



            <a
                href="{{ route('services.show') }}"
                class="mobile-nav-item"
            >

                <div class="mobile-nav-icon">
                    <i class="fa-solid fa-layer-group"></i>
                </div>

                <div class="mobile-nav-text">

                    <strong>الخدمات</strong>

                    <span>الخدمات التي أقدمها</span>

                </div>

                <i class="fa-solid fa-arrow-left mobile-arrow"></i>

            </a>



            <a
                href="{{ route('poem.show') }}"
                class="mobile-nav-item"
            >

                <div class="mobile-nav-icon">
                    <i class="fa-solid fa-feather-pointed"></i>
                </div>

                <div class="mobile-nav-text">

                    <strong>القصائد</strong>

                    <span>مساحتي الأدبية والشعرية</span>

                </div>

                <i class="fa-solid fa-arrow-left mobile-arrow"></i>

            </a>


        </div>



        <!-- ==========================================
             FOOTER
        =========================================== -->

        <div class="mobile-menu-footer">

            <div class="mobile-footer-line"></div>

            <span>
                <i class="fa-solid fa-sparkles"></i>
                أهلاً بك في عالمي
            </span>

            <div class="mobile-footer-line"></div>

        </div>

    </div>

</div>



<script>

document.addEventListener('DOMContentLoaded', function () {

    const menuBtn = document.getElementById('mobileMenuBtn');
    const closeBtn = document.getElementById('mobileCloseBtn');
    const overlay = document.getElementById('mobileMenuOverlay');

    const mobileLinks =
        document.querySelectorAll('.mobile-nav-item');


    if (!menuBtn || !overlay) return;


    /* =====================================================
       OPEN MENU
    ====================================================== */

    function openMobileMenu() {

        overlay.classList.add('active');

        menuBtn.classList.add('active');

        menuBtn.setAttribute(
            'aria-expanded',
            'true'
        );

        document.body.classList.add(
            'mobile-menu-open'
        );

    }


    /* =====================================================
       CLOSE MENU
    ====================================================== */

    function closeMobileMenu() {

        overlay.classList.remove('active');

        menuBtn.classList.remove('active');

        menuBtn.setAttribute(
            'aria-expanded',
            'false'
        );

        document.body.classList.remove(
            'mobile-menu-open'
        );

    }


    /* =====================================================
       OPEN
    ====================================================== */

    menuBtn.addEventListener(
        'click',
        function () {

            if (
                overlay.classList.contains('active')
            ) {

                closeMobileMenu();

            } else {

                openMobileMenu();

            }

        }
    );


    /* =====================================================
       CLOSE BUTTON
    ====================================================== */

    if (closeBtn) {

        closeBtn.addEventListener(
            'click',
            closeMobileMenu
        );

    }


    /* =====================================================
       CLICK OUTSIDE
    ====================================================== */

    overlay.addEventListener(
        'click',
        function (e) {

            if (e.target === overlay) {

                closeMobileMenu();

            }

        }
    );


    /* =====================================================
       CLICK LINK
    ====================================================== */

    mobileLinks.forEach(function (link) {

        link.addEventListener(
            'click',
            function () {

                closeMobileMenu();

            }
        );

    });


    /* =====================================================
       ESCAPE
    ====================================================== */

    document.addEventListener(
        'keydown',
        function (e) {

            if (
                e.key === 'Escape' &&
                overlay.classList.contains('active')
            ) {

                closeMobileMenu();

            }

        }
    );

});

</script>



<style>

/* =========================================================
   DESKTOP NAVBAR
========================================================= */

.premium-nav {

    position: fixed;

    top: 14px;
    left: 50%;

    transform: translateX(-50%);

    width: min(92%, 1200px);

    z-index: 9990;

    animation:
        navEnter 0.8s ease;
}


@keyframes navEnter {

    from {

        opacity: 0;

        transform:
            translate(-50%, -60px);

    }

    to {

        opacity: 1;

        transform:
            translate(-50%, 0);

    }

}


/* =========================================================
   NAV CONTAINER
========================================================= */

.nav-container {

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 25px;

    min-height: 58px;

    padding:
        5px
        18px
        5px
        24px;

    border-radius: 22px;

    background:
        rgba(15, 23, 42, 0.78);

    border:
        1px solid rgba(255,255,255,0.12);

    backdrop-filter:
        blur(22px);

    -webkit-backdrop-filter:
        blur(22px);

    box-shadow:
        0 20px 50px rgba(0,0,0,0.35);
}


/* =========================================================
   LOGO
========================================================= */

.logo {

    display: flex;

    align-items: baseline;

    gap: 5px;

    flex-shrink: 0;

    color: white;

    text-decoration: none;

    white-space: nowrap;
}


.logo h1 {

    margin: 0;

    font-size: 36px;

    font-weight: 900;
}


.logo span {

    color: #6366f1;

    font-size: 26px;

    font-weight: 700;

    text-shadow:
        0 0 20px
        rgba(99,102,241,0.7);
}


/* =========================================================
   DESKTOP LINKS
========================================================= */

.nav-links {

    display: flex;

    align-items: center;

    gap: 4px;

    margin-right: auto;
}


.nav-item {

    position: relative;

    display: flex;

    align-items: center;

    gap: 7px;

    padding:
        10px
        15px;

    border-radius: 14px;

    color: #cbd5e1;

    text-decoration: none;

    font-size: 14px;

    font-weight: 650;

    transition:
        0.25s ease;

    overflow: hidden;
}


.nav-item i {

    font-size: 13px;

    transition:
        transform 0.25s ease,
        color 0.25s ease;
}


.nav-item::before {

    content: "";

    position: absolute;

    inset: 0;

    background:
        linear-gradient(
            135deg,
            rgba(99,102,241,0.25),
            rgba(6,182,212,0.15)
        );

    opacity: 0;

    transition:
        opacity 0.25s ease;
}


.nav-item:hover {

    color: white;

    transform:
        translateY(-2px);

}


.nav-item:hover::before {

    opacity: 1;
}


.nav-item:hover i {

    color: #a5b4fc;

    transform:
        scale(1.15);
}


.nav-item::after {

    content: "";

    position: absolute;

    bottom: 3px;

    left: 50%;

    width: 0;

    height: 2px;

    border-radius: 20px;

    background:
        linear-gradient(
            90deg,
            #6366f1,
            #06b6d4
        );

    transform:
        translateX(-50%);

    transition:
        width 0.25s ease;
}


.nav-item:hover::after {

    width: 45%;
}


/* =========================================================
   MOBILE BUTTON
========================================================= */

.mobile-menu-btn {

    display: none;

    position: relative;

    width: 44px;
    height: 44px;

    flex-shrink: 0;

    align-items: center;
    justify-content: center;

    flex-direction: column;

    gap: 5px;

    border: 1px solid
        rgba(255,255,255,0.12);

    border-radius: 13px;

    background:
        rgba(255,255,255,0.07);

    cursor: pointer;

    transition:
        0.3s ease;
}


.mobile-menu-btn span {

    width: 19px;
    height: 2px;

    border-radius: 10px;

    background: white;

    transition:
        transform 0.35s ease,
        opacity 0.25s ease,
        width 0.35s ease;
}


.mobile-menu-btn:hover {

    background:
        rgba(99,102,241,0.2);

    border-color:
        rgba(99,102,241,0.4);
}


/* =========================================================
   HAMBURGER → X
========================================================= */

.mobile-menu-btn.active span:nth-child(1) {

    transform:
        translateY(7px)
        rotate(45deg);
}


.mobile-menu-btn.active span:nth-child(2) {

    opacity: 0;

    width: 0;
}


.mobile-menu-btn.active span:nth-child(3) {

    transform:
        translateY(-7px)
        rotate(-45deg);
}


/* =========================================================
   MOBILE OVERLAY
========================================================= */

.mobile-menu-overlay {

    position: fixed;

    inset: 0;

    z-index: 9989;

    display: flex;

    align-items: flex-start;
    justify-content: center;

    padding:
        78px
        12px
        20px;

    background:
        rgba(2, 6, 23, 0.68);

    backdrop-filter:
        blur(18px);

    -webkit-backdrop-filter:
        blur(18px);

    opacity: 0;

    visibility: hidden;

    pointer-events: none;

    transition:
        opacity 0.4s ease,
        visibility 0.4s ease;
}


.mobile-menu-overlay.active {

    opacity: 1;

    visibility: visible;

    pointer-events: auto;
}


/* =========================================================
   MOBILE PANEL
========================================================= */

.mobile-menu {

    position: relative;

    width: 100%;

    max-width: 430px;

    max-height:
        calc(100dvh - 100px);

    overflow: hidden;

    padding: 22px;

    border-radius: 28px;

    background:
        linear-gradient(
            145deg,
            rgba(15,23,42,0.98),
            rgba(10,18,34,0.96)
        );

    border:
        1px solid
        rgba(255,255,255,0.12);

    box-shadow:
        0 35px 100px
        rgba(0,0,0,0.55),
        inset 0 1px 0
        rgba(255,255,255,0.06);

    transform:
        translateY(-25px)
        scale(0.94);

    transition:
        transform 0.45s
        cubic-bezier(.2,.8,.2,1);
}


.mobile-menu-overlay.active
.mobile-menu {

    transform:
        translateY(0)
        scale(1);
}


/* =========================================================
   GLOWS
========================================================= */

.mobile-glow {

    position: absolute;

    width: 220px;
    height: 220px;

    border-radius: 50%;

    filter: blur(60px);

    pointer-events: none;

    opacity: 0.25;
}


.mobile-glow-1 {

    top: -130px;

    right: -100px;

    background:
        #6366f1;
}


.mobile-glow-2 {

    bottom: -150px;

    left: -100px;

    background:
        #06b6d4;
}


/* =========================================================
   MOBILE HEADER
========================================================= */

.mobile-menu-header {

    position: relative;

    display: flex;

    align-items: center;

    justify-content: space-between;

    padding-bottom: 20px;

    margin-bottom: 8px;

    border-bottom:
        1px solid
        rgba(255,255,255,0.08);

    z-index: 2;
}


.mobile-menu-brand {

    display: flex;

    align-items: center;

    gap: 12px;
}


.mobile-brand-icon {

    width: 43px;
    height: 43px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 14px;

    background:
        linear-gradient(
            135deg,
            #6366f1,
            #06b6d4
        );

    color: white;

    box-shadow:
        0 8px 25px
        rgba(99,102,241,0.25);
}


.mobile-menu-brand span {

    display: block;

    margin-bottom: 3px;

    color: #818cf8;

    font-size: 9px;

    font-weight: 800;

    letter-spacing: 2px;
}


.mobile-menu-brand strong {

    display: block;

    color: white;

    font-size: 14px;

    font-weight: 800;

    max-width: 220px;

    overflow: hidden;

    text-overflow: ellipsis;

    white-space: nowrap;
}


/* =========================================================
   CLOSE
========================================================= */

.mobile-close-btn {

    width: 40px;
    height: 40px;

    display: flex;

    align-items: center;
    justify-content: center;

    border:
        1px solid
        rgba(255,255,255,0.1);

    border-radius: 12px;

    background:
        rgba(255,255,255,0.06);

    color: #cbd5e1;

    font-size: 16px;

    cursor: pointer;

    transition:
        0.25s ease;
}


.mobile-close-btn:hover {

    background:
        rgba(239,68,68,0.15);

    border-color:
        rgba(239,68,68,0.3);

    color: #fca5a5;

    transform:
        rotate(90deg);
}


/* =========================================================
   MOBILE LINKS
========================================================= */

.mobile-menu-links {

    position: relative;

    display: flex;

    flex-direction: column;

    gap: 8px;

    z-index: 2;
}


.mobile-nav-item {

    display: flex;

    align-items: center;

    gap: 13px;

    padding: 12px;

    border:
        1px solid
        rgba(255,255,255,0.06);

    border-radius: 17px;

    background:
        rgba(255,255,255,0.035);

    color: white;

    text-decoration: none;

    opacity: 0;

    transform:
        translateX(25px);

    transition:
        background 0.25s ease,
        border-color 0.25s ease,
        transform 0.3s ease,
        opacity 0.4s ease;
}


/* =========================================================
   LINK REVEAL
========================================================= */

.mobile-menu-overlay.active
.mobile-nav-item {

    opacity: 1;

    transform:
        translateX(0);
}


.mobile-menu-overlay.active
.mobile-nav-item:nth-child(1) {

    transition-delay:
        0.08s;
}


.mobile-menu-overlay.active
.mobile-nav-item:nth-child(2) {

    transition-delay:
        0.14s;
}


.mobile-menu-overlay.active
.mobile-nav-item:nth-child(3) {

    transition-delay:
        0.20s;
}


.mobile-menu-overlay.active
.mobile-nav-item:nth-child(4) {

    transition-delay:
        0.26s;
}


/* =========================================================
   LINK HOVER
========================================================= */

.mobile-nav-item:hover {

    background:
        linear-gradient(
            135deg,
            rgba(99,102,241,0.15),
            rgba(6,182,212,0.08)
        );

    border-color:
        rgba(99,102,241,0.25);

    transform:
        translateX(-4px);
}


/* =========================================================
   NAV ICON
========================================================= */

.mobile-nav-icon {

    width: 43px;
    height: 43px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 13px;

    background:
        rgba(99,102,241,0.12);

    color: #a5b4fc;

    font-size: 15px;

    transition:
        0.25s ease;
}


.mobile-nav-item:hover
.mobile-nav-icon {

    background:
        linear-gradient(
            135deg,
            #6366f1,
            #06b6d4
        );

    color: white;

    transform:
        scale(1.05);
}


/* =========================================================
   NAV TEXT
========================================================= */

.mobile-nav-text {

    flex: 1;

    min-width: 0;
}


.mobile-nav-text strong {

    display: block;

    margin-bottom: 3px;

    color: #f8fafc;

    font-size: 14px;

    font-weight: 800;
}


.mobile-nav-text span {

    display: block;

    color: #7f8da3;

    font-size: 10px;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;
}


/* =========================================================
   ARROW
========================================================= */

.mobile-arrow {

    color: #64748b;

    font-size: 11px;

    transition:
        0.25s ease;
}


.mobile-nav-item:hover
.mobile-arrow {

    color: #818cf8;

    transform:
        translateX(-4px);
}


/* =========================================================
   FOOTER
========================================================= */

.mobile-menu-footer {

    position: relative;

    display: flex;

    align-items: center;

    gap: 10px;

    margin-top: 18px;

    z-index: 2;
}


.mobile-footer-line {

    flex: 1;

    height: 1px;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,0.1)
        );
}


.mobile-footer-line:last-child {

    background:
        linear-gradient(
            90deg,
            rgba(255,255,255,0.1),
            transparent
        );
}


.mobile-menu-footer span {

    display: flex;

    align-items: center;

    gap: 5px;

    color: #64748b;

    font-size: 9px;

    white-space: nowrap;
}


.mobile-menu-footer i {

    color: #818cf8;
}


/* =========================================================
   BODY LOCK
========================================================= */

body.mobile-menu-open {

    overflow: hidden !important;
}


/* =========================================================
   TABLET / MOBILE
========================================================= */

@media (max-width: 800px) {

    .premium-nav {

        top: 10px;

        width:
            calc(100% - 20px);
    }


    .nav-container {

        min-height: 52px;

        padding:
            4px
            7px
            4px
            14px;

        border-radius: 18px;
    }


    .logo h1 {

        font-size: 34px;
    }


    .logo span {

        font-size: 10px;
    }


    /* Hide desktop links */

    .nav-links {

        display: none;
    }


    /* Show hamburger */

    .mobile-menu-btn {

        display: flex;
    }

}


/* =========================================================
   SMALL PHONES
========================================================= */

@media (max-width: 430px) {

    .premium-nav {

        top: 7px;

        width:
            calc(100% - 14px);
    }


    .nav-container {

        min-height: 49px;

        border-radius: 16px;
    }


    .logo h1 {

        font-size: 19px;
    }


    .logo span {

        display: none;
    }


    .mobile-menu-btn {

        width: 40px;
        height: 40px;

        border-radius: 11px;
    }


    .mobile-menu-overlay {

        padding:
            68px
            8px
            15px;
    }


    .mobile-menu {

        padding: 17px;

        border-radius: 23px;

        max-height:
            calc(100dvh - 85px);
    }


    .mobile-menu-header {

        padding-bottom: 16px;
    }


    .mobile-menu-brand strong {

        font-size: 13px;
    }


    .mobile-nav-item {

        padding: 10px;

        border-radius: 15px;
    }


    .mobile-nav-icon {

        width: 40px;
        height: 40px;

        border-radius: 12px;
    }

}


/* =========================================================
   VERY SMALL SCREENS
========================================================= */

@media (max-width: 360px) {

    .mobile-menu {

        padding: 14px;
    }


    .mobile-nav-text span {

        display: none;
    }


    .mobile-menu-footer {

        margin-top: 13px;
    }

}

</style>