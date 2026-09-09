 
<aside id="sidebar" class="sidebar">

    {{-- ==============================
         Header
    =============================== --}}
    <div class="sidebar-header">

        <div class="brand">

            <div class="brand-text">
                <span>MyPortfolio</span>
                <small>لوحة التحكم</small>
            </div>

        </div>

        <button
            type="button"
            id="sidebarToggle"
            class="sidebar-toggle"
            aria-label="إغلاق القائمة"
        >
            <i class="fa-solid fa-angle-right"></i>
        </button>

    </div>


    {{-- ==============================
         Profile
    =============================== --}}
    <div class="sidebar-profile">

        <div class="profile-avatar">
            <i class="fa-solid fa-user"></i>
        </div>

        <div class="profile-info">

            <strong>
                {{ auth()->user()->name ?? 'المستخدم' }}
            </strong>

            <span>
                {{ auth()->user()->email ?? '' }}
            </span>

        </div>

    </div>


    {{-- ==============================
         Navigation
    =============================== --}}
    <nav class="sidebar-nav">

        <a
            href="{{ route('dashboard.index') }}"
            class="sidebar-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}"
        >
            <span class="link-icon">
                <i class="fa-solid fa-chart-pie"></i>
            </span>

            <span class="link-text">
                الرئيسية
            </span>
        </a>


        <a
            href="{{ route('dashboard.projects') }}"
            class="sidebar-link {{ request()->routeIs('dashboard.projects') ? 'active' : '' }}"
        >
            <span class="link-icon">
                <i class="fa-solid fa-folder-open"></i>
            </span>

            <span class="link-text">
                المشاريع
            </span>
        </a>


        <a
            href="{{ route('dashboard.services') }}"
            class="sidebar-link {{ request()->routeIs('dashboard.services') ? 'active' : '' }}"
        >
            <span class="link-icon">
                <i class="fa-solid fa-layer-group"></i>
            </span>

            <span class="link-text">
                الخدمات
            </span>
        </a>


        <a
            href="{{ route('dashboard.poems') }}"
            class="sidebar-link {{ request()->routeIs('dashboard.poems') ? 'active' : '' }}"
        >
            <span class="link-icon">
                <i class="fa-solid fa-feather-pointed"></i>
            </span>

            <span class="link-text">
                القصائد
            </span>
        </a>


        <a
            href="{{ route('dashboard.contacts') }}"
            class="sidebar-link {{ request()->routeIs('dashboard.contacts') ? 'active' : '' }}"
        >
            <span class="link-icon">
                <i class="fa-solid fa-envelope"></i>
            </span>

            <span class="link-text">
                الرسائل
            </span>
        </a>

    </nav>


    {{-- ==============================
         Logout
    =============================== --}}
    <div class="sidebar-footer">

        <form
            method="POST"
            action="{{ route('logout') }}"
        >
            @csrf

            <button
                type="submit"
                class="logout-button"
            >

                <span class="link-icon">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </span>

                <span class="link-text">
                    تسجيل الخروج
                </span>

            </button>

        </form>

    </div>

</aside>


{{-- ==============================
     Mobile Button
=============================== --}}
<button
    type="button"
    id="mobileSidebarToggle"
    class="mobile-sidebar-toggle"
    aria-label="فتح القائمة"
>
    <i class="fa-solid fa-bars"></i>
</button>


{{-- ==============================
     Overlay
=============================== --}}
<div
    id="sidebarOverlay"
    class="sidebar-overlay"
></div>


{{-- ==============================
     Desktop Open Button
     نفس زر الهاتف تماماً
=============================== --}}
<button
    type="button"
    id="desktopSidebarOpen"
    class="desktop-sidebar-open"
    aria-label="فتح القائمة"
>
    <i class="fa-solid fa-bars"></i>
</button>


<style>

/* =========================================================
   VARIABLES
========================================================= */

:root {

    --sidebar-width: 285px;
    --sidebar-gap: 16px;
    --sidebar-space: 317px;

    --sidebar-blue: #2563eb;
    --sidebar-blue-dark: #1d4ed8;

    --sidebar-bg: #ffffff;
    --sidebar-text: #172033;
    --sidebar-muted: #7b8497;

    --sidebar-border: #edf0f5;

    --sidebar-transition:
        0.35s cubic-bezier(0.4, 0, 0.2, 1);
}


/* =========================================================
   SIDEBAR
========================================================= */

.sidebar {

    position: fixed;

    top: 16px;
    right: 16px;
    bottom: 16px;

    width: var(--sidebar-width);

    background: var(--sidebar-bg);

    border: 1px solid var(--sidebar-border);

    border-radius: 24px;

    box-shadow:
        0 15px 45px rgba(15, 23, 42, 0.08);

    z-index: 1000;

    display: flex;
    flex-direction: column;

    overflow: hidden;

    transform: translateX(0);

    opacity: 1;

    transition:
        transform var(--sidebar-transition),
        opacity var(--sidebar-transition);
}


/* =========================================================
   SIDEBAR COLLAPSED
========================================================= */

.sidebar.collapsed {

    transform:
        translateX(
            calc(100% + 40px)
        );

    opacity: 0;

    pointer-events: none;
}


/* =========================================================
   HEADER
========================================================= */

.sidebar-header {

    display: flex;

    align-items: center;

    justify-content: space-between;

    padding: 22px 18px 18px;

    border-bottom:
        1px solid var(--sidebar-border);
}


.brand {

    display: flex;

    align-items: center;

    gap: 12px;

    min-width: 0;
}


.brand-icon {

    width: 44px;
    height: 44px;

    flex-shrink: 0;

    border-radius: 14px;

    display: flex;

    align-items: center;
    justify-content: center;

    background:
        linear-gradient(
            135deg,
            var(--sidebar-blue),
            var(--sidebar-blue-dark)
        );

    color: white;

    font-size: 18px;
}


.brand-text {

    display: flex;

    flex-direction: column;

    min-width: 0;
}


.brand-text span {

    color: var(--sidebar-text);

    font-size: 16px;

    font-weight: 800;

    white-space: nowrap;
}


.brand-text small {

    margin-top: 3px;

    color: var(--sidebar-muted);

    font-size: 11px;

    white-space: nowrap;
}


/* =========================================================
   SIDEBAR TOGGLE
========================================================= */

.sidebar-toggle {

    width: 38px;
    height: 38px;

    border: 0;

    border-radius: 12px;

    background: #f5f7fb;

    color: #596579;

    display: flex;

    align-items: center;
    justify-content: center;

    cursor: pointer;

    transition: 0.25s ease;
}


.sidebar-toggle:hover {

    background: var(--sidebar-blue);

    color: white;
}


/* =========================================================
   PROFILE
========================================================= */

.sidebar-profile {

    display: flex;

    align-items: center;

    gap: 12px;

    margin: 18px;

    padding: 14px;

    background: #f8faff;

    border: 1px solid #edf2fb;

    border-radius: 17px;
}


.profile-avatar {

    width: 45px;
    height: 45px;

    flex-shrink: 0;

    border-radius: 14px;

    display: flex;

    align-items: center;
    justify-content: center;

    background: #e8f0ff;

    color: var(--sidebar-blue);
}


.profile-info {

    min-width: 0;

    display: flex;

    flex-direction: column;
}


.profile-info strong {

    color: var(--sidebar-text);

    font-size: 13px;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;
}


.profile-info span {

    margin-top: 4px;

    color: var(--sidebar-muted);

    font-size: 10px;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;
}


/* =========================================================
   NAVIGATION
========================================================= */

.sidebar-nav {

    flex: 1;

    padding: 4px 14px;

    overflow-y: auto;
}


.sidebar-link {

    position: relative;

    display: flex;

    align-items: center;

    gap: 13px;

    width: 100%;

    min-height: 52px;

    margin-bottom: 6px;

    padding: 0 13px;

    border-radius: 15px;

    text-decoration: none;

    color: var(--sidebar-muted);

    transition: 0.25s ease;
}


.sidebar-link:hover {

    background: #f5f8ff;

    color: var(--sidebar-blue);

    transform: translateX(-2px);
}


.sidebar-link.active {

    background: #eef4ff;

    color: var(--sidebar-blue);

    font-weight: 700;
}


.sidebar-link.active::before {

    content: "";

    position: absolute;

    right: 0;

    top: 10px;
    bottom: 10px;

    width: 3px;

    border-radius: 5px;

    background: var(--sidebar-blue);
}


.link-icon {

    width: 22px;

    display: flex;

    align-items: center;
    justify-content: center;

    flex-shrink: 0;
}


.link-text {

    font-size: 13px;

    white-space: nowrap;
}


/* =========================================================
   FOOTER
========================================================= */

.sidebar-footer {

    padding: 14px;

    border-top:
        1px solid var(--sidebar-border);
}


.sidebar-footer form {

    margin: 0;
}


.logout-button {

    width: 100%;

    min-height: 50px;

    padding: 0 13px;

    border: 0;

    border-radius: 15px;

    background: transparent;

    color: #ef4444;

    cursor: pointer;

    display: flex;

    align-items: center;

    gap: 13px;

    font-family: inherit;
}


.logout-button:hover {

    background: #fff1f2;
}


/* =========================================================
   DESKTOP OPEN BUTTON
   نفس تصميم زر الهاتف
========================================================= */

.desktop-sidebar-open {

    position: fixed;

    top: 18px;
    right: 18px;

    width: 46px;
    height: 46px;

    border: 0;

    border-radius: 14px;

    background: var(--sidebar-blue);

    color: white;

    display: none;

    align-items: center;
    justify-content: center;

    cursor: pointer;

    z-index: 1100;

    box-shadow:
        0 10px 25px rgba(37, 99, 235, 0.25);

    font-size: 16px;

    transition: 0.25s ease;
}


.desktop-sidebar-open:hover {

    background: var(--sidebar-blue-dark);

    transform: translateY(-1px);
}


/* =========================================================
   MOBILE BUTTON
========================================================= */

.mobile-sidebar-toggle {

    display: none;

    position: fixed;

    top: 18px;
    right: 18px;

    width: 46px;
    height: 46px;

    border: 0;

    border-radius: 14px;

    background: var(--sidebar-blue);

    color: white;

    z-index: 1100;

    cursor: pointer;

    font-size: 16px;

    box-shadow:
        0 10px 25px rgba(37, 99, 235, 0.25);

    transition: 0.25s ease;
}


.mobile-sidebar-toggle:hover {

    background: var(--sidebar-blue-dark);

    transform: translateY(-1px);
}


/* =========================================================
   OVERLAY
========================================================= */

.sidebar-overlay {

    position: fixed;

    inset: 0;

    background:
        rgba(15, 23, 42, 0.35);

    backdrop-filter: blur(3px);

    z-index: 900;

    opacity: 0;

    visibility: hidden;

    pointer-events: none;

    transition:
        opacity 0.3s ease,
        visibility 0.3s ease;
}


.sidebar-overlay.active {

    opacity: 1;

    visibility: visible;

    pointer-events: auto;
}


/* =========================================================
   CONTENT
========================================================= */

.main-content {

    width:
        calc(
            100% - var(--sidebar-space)
        );

    margin-right:
        var(--sidebar-space);

    min-height: 100vh;

    box-sizing: border-box;

    transition:
        width var(--sidebar-transition),
        margin-right var(--sidebar-transition);
}


/* =========================================================
   SIDEBAR CLOSED
========================================================= */

body.sidebar-collapsed .main-content {

    width: 100%;

    margin-right: 0;
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 800px) {

    .sidebar {

        top: 0;
        right: 0;
        bottom: 0;

        width: 285px;

        border-radius:
            0 0 0 22px;

        transform:
            translateX(105%);
    }


    .sidebar.mobile-open {

        transform:
            translateX(0);

        opacity: 1;

        pointer-events: auto;
    }


    .sidebar.collapsed {

        transform:
            translateX(105%);
    }


    /* إخفاء زر سطح المكتب */

    .desktop-sidebar-open {

        display: none !important;
    }


    /* زر الهاتف */

    .mobile-sidebar-toggle {

        display: flex;

        align-items: center;
        justify-content: center;
    }


    .main-content {

        width: 100% !important;

        margin-right: 0 !important;

        padding-top: 75px;
    }

}


/* =========================================================
   SMALL SCREENS
========================================================= */

@media (max-width: 480px) {

    .sidebar {

        width: 92vw;
    }

}

</style>


<script>

(function () {

    /*
    ============================================================
    مهم:
    هذا السكربت هو الوحيد المسؤول عن السايدبار.
    ============================================================
    */

    const sidebar =
        document.getElementById('sidebar');

    const dashboardWrapper =
        document.getElementById('dashboardWrapper');

    const sidebarToggle =
        document.getElementById('sidebarToggle');

    const desktopSidebarOpen =
        document.getElementById('desktopSidebarOpen');

    const mobileSidebarToggle =
        document.getElementById('mobileSidebarToggle');

    const sidebarOverlay =
        document.getElementById('sidebarOverlay');


    if (
        !sidebar ||
        !dashboardWrapper ||
        !sidebarToggle ||
        !desktopSidebarOpen ||
        !mobileSidebarToggle ||
        !sidebarOverlay
    ) {
        return;
    }


    const STORAGE_KEY =
        'dashboard_sidebar_collapsed';


    function isMobile() {

        return window.innerWidth <= 800;

    }


    /* ========================================================
       DESKTOP OPEN
    ======================================================== */

    function openDesktop() {

        sidebar.classList.remove(
            'collapsed'
        );

        dashboardWrapper.classList.remove(
            'sidebar-collapsed'
        );

        desktopSidebarOpen.style.display =
            'none';

        localStorage.setItem(
            STORAGE_KEY,
            'false'
        );

    }


    /* ========================================================
       DESKTOP CLOSE
    ======================================================== */

    function closeDesktop() {

        sidebar.classList.add(
            'collapsed'
        );

        dashboardWrapper.classList.add(
            'sidebar-collapsed'
        );

        /*
         * إظهار زر ☰ نفسه المستخدم في الهاتف
         */

        desktopSidebarOpen.style.display =
            'flex';

        localStorage.setItem(
            STORAGE_KEY,
            'true'
        );

    }


    /* ========================================================
       MOBILE OPEN
    ======================================================== */

    function openMobile() {

        sidebar.classList.remove(
            'collapsed'
        );

        dashboardWrapper.classList.remove(
            'sidebar-collapsed'
        );

        sidebar.classList.add(
            'mobile-open'
        );

        sidebarOverlay.classList.add(
            'active'
        );

        document.body.style.overflow =
            'hidden';

    }


    /* ========================================================
       MOBILE CLOSE
    ======================================================== */

    function closeMobile() {

        sidebar.classList.remove(
            'mobile-open'
        );

        sidebarOverlay.classList.remove(
            'active'
        );

        document.body.style.overflow =
            '';

    }


    /* ========================================================
       SIDEBAR TOGGLE
    ======================================================== */

    sidebarToggle.onclick = function () {

        if (isMobile()) {

            closeMobile();

            return;
        }


        if (
            sidebar.classList.contains(
                'collapsed'
            )
        ) {

            openDesktop();

        } else {

            closeDesktop();

        }

    };


    /* ========================================================
       DESKTOP OPEN BUTTON
    ======================================================== */

    desktopSidebarOpen.onclick = function () {

        openDesktop();

    };


    /* ========================================================
       MOBILE BUTTON
    ======================================================== */

    mobileSidebarToggle.onclick = function () {

        openMobile();

    };


    /* ========================================================
       OVERLAY
    ======================================================== */

    sidebarOverlay.onclick = function () {

        closeMobile();

    };


    /* ========================================================
       ESC
    ======================================================== */

    document.onkeydown = function (event) {

        if (event.key !== 'Escape') {
            return;
        }


        if (isMobile()) {

            closeMobile();

        }

    };


    /* ========================================================
       RESIZE
    ======================================================== */

    window.onresize = function () {

        if (isMobile()) {

            desktopSidebarOpen.style.display =
                'none';

            sidebar.classList.remove(
                'collapsed'
            );

            dashboardWrapper.classList.remove(
                'sidebar-collapsed'
            );

        } else {

            closeMobile();


            const saved =
                localStorage.getItem(
                    STORAGE_KEY
                );


            if (saved === 'true') {

                closeDesktop();

            } else {

                openDesktop();

            }

        }

    };


    /* ========================================================
       INITIAL STATE
    ======================================================== */

    if (isMobile()) {

        sidebar.classList.remove(
            'collapsed'
        );

        sidebar.classList.remove(
            'mobile-open'
        );

        dashboardWrapper.classList.remove(
            'sidebar-collapsed'
        );

        desktopSidebarOpen.style.display =
            'none';

    } else {

        const saved =
            localStorage.getItem(
                STORAGE_KEY
            );


        if (saved === 'true') {

            closeDesktop();

        } else {

            openDesktop();

        }

    }

})();

</script>
