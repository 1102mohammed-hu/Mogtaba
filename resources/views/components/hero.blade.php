@extends('layouts.app')

@section('title','Mohammed Hameed | Portfolio')

@section('content')

<style>

/* =========================================================
   PREMIUM PORTFOLIO HERO
   ========================================================= */

@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap');

:root {
    --hero-bg: #02040a;

    --hero-indigo: #6366f1;
    --hero-blue: #38bdf8;
    --hero-violet: #8b5cf6;

    --hero-white: #f8fafc;
    --hero-text: #cbd5e1;
    --hero-muted: #94a3b8;

    --hero-border: rgba(255,255,255,.09);

    --hero-glass:
        rgba(15, 18, 30, .62);

    --hero-radius: 24px;
}


/* =========================================================
   HERO
   ========================================================= */

.hero {

    direction: rtl;

    position: relative;

    width: 100%;

    min-height: 100vh;

    padding:
        100px
        24px
        80px;

    display: flex;

    align-items: center;

    justify-content: center;

    overflow: hidden;

    background:

        radial-gradient(
            circle at 85% 20%,
            rgba(99,102,241,.18),
            transparent 32%
        ),

        radial-gradient(
            circle at 15% 80%,
            rgba(14,165,233,.13),
            transparent 32%
        ),

        linear-gradient(
            135deg,
            #02040a 0%,
            #050817 50%,
            #02040a 100%
        );

    color: var(--hero-white);

    font-family:
        'Plus Jakarta Sans',
        system-ui,
        sans-serif;

    box-sizing: border-box;
}


/* =========================================================
   RESET INSIDE HERO
   ========================================================= */

.hero *,
.hero *::before,
.hero *::after {

    box-sizing: border-box;

}


/* =========================================================
   BACKGROUND ORBS
   ========================================================= */

.hero .circle {

    position: absolute;

    border-radius: 50%;

    pointer-events: none;

    filter: blur(120px);

    opacity: .25;

    z-index: 0;

}


.hero .circle.one {

    width: 520px;

    height: 520px;

    top: -180px;

    right: -160px;

    background:
        radial-gradient(
            circle,
            rgba(99,102,241,.8),
            transparent 70%
        );

}


.hero .circle.two {

    width: 500px;

    height: 500px;

    bottom: -180px;

    left: -150px;

    background:
        radial-gradient(
            circle,
            rgba(14,165,233,.7),
            transparent 70%
        );

}


/* =========================================================
   HERO CONTAINER
   ========================================================= */

.container-hero {

    width: 100%;

    max-width: 1280px;

    margin: 0 auto;

    position: relative;

    z-index: 2;

}


/* =========================================================
   MAIN GRID
   ========================================================= */

.hero-grid {

    width: 100%;

    display: grid;

    grid-template-columns:
        minmax(0, 1fr)
        minmax(0, 1fr);

    gap: 70px;

    align-items: center;

}


/* =========================================================
   CONTENT
   ========================================================= */

.hero-content {

    min-width: 0;

    display: flex;

    flex-direction: column;

    align-items: flex-start;

    animation:
        heroContentIn
        .9s
        cubic-bezier(.16,1,.3,1)
        both;

}


@keyframes heroContentIn {

    from {

        opacity: 0;

        transform:
            translateX(45px);

    }

    to {

        opacity: 1;

        transform:
            translateX(0);

    }

}


/* =========================================================
   BADGE
   ========================================================= */

.hero-content .badge {

    display: inline-flex;

    align-items: center;

    gap: 9px;

    padding:
        9px
        18px;

    margin-bottom: 25px;

    border-radius: 999px;

    border:
        1px solid
        rgba(99,102,241,.25);

    background:
        rgba(99,102,241,.08);

    color:
        #a5b4fc;

    font-size: .85rem;

    font-weight: 700;

    backdrop-filter:
        blur(15px);

    -webkit-backdrop-filter:
        blur(15px);

}


/* =========================================================
   SMALL DOT INSIDE BADGE
   ========================================================= */

.hero-content .badge::before {

    content: '';

    width: 8px;

    height: 8px;

    border-radius: 50%;

    background:
        var(--hero-blue);

    box-shadow:
        0 0 15px
        var(--hero-blue);

    animation:
        badgePulse
        2s
        infinite;

}


@keyframes badgePulse {

    0%,
    100% {

        opacity: .5;

        transform: scale(.8);

    }

    50% {

        opacity: 1;

        transform: scale(1.2);

    }

}


/* =========================================================
   TITLE
   ========================================================= */

.hero-title {

    margin: 0;

    max-width: 700px;

    color:
        #ffffff;

    font-size:
        clamp(
            2.7rem,
            5vw,
            4.6rem
        );

    line-height:
        1.12;

    font-weight:
        900;

    letter-spacing:
        -2px;

}


.hero-title span {

    background:

        linear-gradient(
            135deg,
            #c7d2fe 0%,
            #818cf8 45%,
            #38bdf8 100%
        );

    -webkit-background-clip:
        text;

    background-clip:
        text;

    -webkit-text-fill-color:
        transparent;

}


/* =========================================================
   BIO
   ========================================================= */

.hero-desc {

    margin:
        28px
        0
        0;

    max-width:
        600px;

    min-height:
        70px;

    color:
        var(--hero-muted);

    font-size:
        1.08rem;

    line-height:
        2;

    font-weight:
        400;

}


/* =========================================================
   TYPEWRITER CURSOR
   ========================================================= */

.hero-desc::after {

    content:
        '|';

    margin-right:
        5px;

    color:
        var(--hero-blue);

    animation:
        cursorBlink
        .8s
        infinite;

}


@keyframes cursorBlink {

    0%,
    45% {

        opacity: 1;

    }

    46%,
    100% {

        opacity: 0;

    }

}


/* =========================================================
   BUTTONS
   ========================================================= */

.buttons {

    display:
        flex;

    align-items:
        center;

    gap:
        14px;

    flex-wrap:
        wrap;

    margin-top:
        34px;

}


.btn-primary,
.btn-secondary {

    min-height:
        52px;

    padding:
        0
        28px;

    display:
        inline-flex;

    align-items:
        center;

    justify-content:
        center;

    border-radius:
        999px;

    text-decoration:
        none;

    font-size:
        .95rem;

    font-weight:
        700;

    transition:
        .3s
        ease;

}


/* PRIMARY */

.btn-primary {

    color:
        #ffffff;

    background:

        linear-gradient(
            135deg,
            var(--hero-indigo),
            var(--hero-violet)
        );

    box-shadow:
        0 12px 30px
        rgba(99,102,241,.28);

}


.btn-primary:hover {

    transform:
        translateY(-4px);

    box-shadow:
        0 18px 40px
        rgba(99,102,241,.42);

}


/* SECONDARY */

.btn-secondary {

    color:
        #e2e8f0;

    border:
        1px solid
        var(--hero-border);

    background:
        rgba(255,255,255,.04);

    backdrop-filter:
        blur(15px);

}


.btn-secondary:hover {

    background:
        rgba(255,255,255,.09);

    border-color:
        rgba(255,255,255,.18);

    transform:
        translateY(-4px);

}


/* =========================================================
   IMAGE SIDE
   ========================================================= */

.hero-image {

    min-width: 0;

    display:
        flex;

    flex-direction:
        column;

    align-items:
        center;

    justify-content:
        center;

    animation:
        heroImageIn
        1s
        cubic-bezier(.16,1,.3,1)
        both;

}


@keyframes heroImageIn {

    from {

        opacity: 0;

        transform:
            translateX(-45px)
            scale(.95);

    }

    to {

        opacity: 1;

        transform:
            translateX(0)
            scale(1);

    }

}


/* =========================================================
   IMAGE WRAPPER
   ========================================================= */

.profile-wrapper {

    width:
        min(
            440px,
            80vw
        );

    aspect-ratio:
        1 / 1;

    position:
        relative;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

}


/* =========================================================
   GLOW
   ========================================================= */

.image-glow {

    position:
        absolute;

    inset:
        5%;

    border-radius:
        50%;

    background:

        radial-gradient(
            circle,
            rgba(99,102,241,.7),
            rgba(56,189,248,.3),
            transparent 68%
        );

    filter:
        blur(35px);

    opacity:
        .7;

    animation:
        imageGlowPulse
        5s
        ease-in-out
        infinite;

}


@keyframes imageGlowPulse {

    0%,
    100% {

        transform:
            scale(.92);

        opacity:
            .45;

    }

    50% {

        transform:
            scale(1.08);

        opacity:
            .75;

    }

}


/* =========================================================
   ROTATING RING
   ========================================================= */

.image-ring {

    position:
        absolute;

    inset:
        0;

    border-radius:
        50%;

    padding:
        2px;

    background:

        conic-gradient(
            from 0deg,
            #6366f1,
            #38bdf8,
            #8b5cf6,
            #6366f1
        );

    animation:
        rotateHeroRing
        18s
        linear
        infinite;

}


.image-ring::before {

    content:
        '';

    position:
        absolute;

    inset:
        3px;

    border-radius:
        50%;

    background:
        #02040a;

}


@keyframes rotateHeroRing {

    from {

        transform:
            rotate(0deg);

    }

    to {

        transform:
            rotate(360deg);

    }

}


/* =========================================================
   PROFILE CONTAINER
   ========================================================= */

.profile-container {

    position:
        relative;

    width:
        91%;

    height:
        91%;

    overflow:
        hidden;

    border-radius:
        50%;

    z-index:
        3;

    border:
        5px solid
        rgba(255,255,255,.12);

    background:
        #080b14;

    box-shadow:

        0 30px 80px
        rgba(0,0,0,.7),

        0 0 70px
        rgba(99,102,241,.25);

    animation:
        profileFloat
        6s
        ease-in-out
        infinite;

}


@keyframes profileFloat {

    0%,
    100% {

        transform:
            translateY(0);

    }

    50% {

        transform:
            translateY(-10px);

    }

}


/* =========================================================
   PROFILE IMAGE
   ========================================================= */

.profile {

    width:
        100%;

    height:
        100%;

    display:
        block;

    object-fit:
        cover;

    border-radius:
        50%;

    transition:
        transform
        .6s
        ease;

}


.profile-container:hover .profile {

    transform:
        scale(1.05);

}


/* =========================================================
   FLOATING ORBITS
   ========================================================= */

.orbit {

    position:
        absolute;

    width:
        48px;

    height:
        48px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    border-radius:
        50%;

    color:
        #ffffff;

    background:
        rgba(13,16,27,.75);

    border:
        1px solid
        rgba(255,255,255,.1);

    backdrop-filter:
        blur(15px);

    box-shadow:
        0 12px 30px
        rgba(0,0,0,.45);

    z-index:
        6;

    animation:
        orbitFloat
        5s
        ease-in-out
        infinite
        alternate;

}


.orbit.one {

    top:
        7%;

    right:
        2%;

}


.orbit.two {

    bottom:
        9%;

    left:
        2%;

    animation-delay:
        -2s;

}


.orbit.three {

    top:
        48%;

    left:
        -3%;

    animation-delay:
        -4s;

}


@keyframes orbitFloat {

    from {

        transform:
            translateY(0);

    }

    to {

        transform:
            translateY(-12px);

    }

}


/* =========================================================
   SOCIAL + CV
   ========================================================= */

.profile-actions-wrapper {

    margin-top:
        28px;

    max-width:
        100%;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    gap:
        10px;

    flex-wrap:
        wrap;

    padding:
        9px
        12px;

    border-radius:
        999px;

    background:
        rgba(13,16,27,.65);

    border:
        1px solid
        var(--hero-border);

    backdrop-filter:
        blur(20px);

    box-shadow:
        0 15px 35px
        rgba(0,0,0,.4);

}


/* =========================================================
   SOCIAL BUTTON
   ========================================================= */

.social-btn {

    width:
        44px;

    height:
        44px;

    flex:
        0 0 44px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    border-radius:
        50%;

    color:
        #ffffff;

    background:
        rgba(255,255,255,.05);

    border:
        1px solid
        rgba(255,255,255,.08);

    text-decoration:
        none;

    transition:
        .3s
        ease;

}


.social-btn:hover {

    transform:
        translateY(-4px);

}


.social-btn.whatsapp:hover {

    background:
        #25d366;

    box-shadow:
        0 0 25px
        rgba(37,211,102,.4);

}


.social-btn.facebook:hover {

    background:
        #1877f2;

    box-shadow:
        0 0 25px
        rgba(24,119,242,.4);

}


.social-btn svg {

    width:
        20px;

    height:
        20px;

    fill:
        currentColor;

}


/* =========================================================
   CV BUTTON
   ========================================================= */

.cv-download-btn {

    min-height:
        44px;

    padding:
        0
        18px;

    display:
        inline-flex;

    align-items:
        center;

    justify-content:
        center;

    gap:
        8px;

    border-radius:
        999px;

    color:
        var(--hero-blue);

    background:
        rgba(56,189,248,.07);

    border:
        1px solid
        rgba(56,189,248,.25);

    text-decoration:
        none;

    font-size:
        .85rem;

    font-weight:
        700;

    transition:
        .3s
        ease;

}


.cv-download-btn:hover {

    color:
        #ffffff;

    background:

        linear-gradient(
            135deg,
            var(--hero-blue),
            var(--hero-indigo)
        );

    transform:
        translateY(-3px);

    box-shadow:
        0 10px 25px
        rgba(56,189,248,.25);

}


.cv-download-btn svg {

    width:
        18px;

    height:
        18px;

}


/* =========================================================
   TABLET
   ========================================================= */

@media (max-width: 992px) {

    .hero {

        padding:
            100px
            22px
            70px;

    }


    .hero-grid {

        grid-template-columns:
            1fr;

        gap:
            50px;

    }


    /*
       الصورة أولاً
    */

    .hero-image {

        order:
            1;

    }


    /*
       المعلومات بعدها
    */

    .hero-content {

        order:
            2;

        align-items:
            center;

        text-align:
            center;

    }


    .hero-title {

        max-width:
            800px;

    }


    .hero-desc {

        max-width:
            700px;

    }


    .buttons {

        justify-content:
            center;

    }


    .profile-wrapper {

        width:
            min(
                400px,
                72vw
            );

    }

}


/* =========================================================
   MOBILE
   ========================================================= */

@media (max-width: 600px) {

    .hero {

        min-height:
            auto;

        padding:
            95px
            15px
            55px;

    }


    .container-hero {

        width:
            100%;

    }


    .hero-grid {

        gap:
            25px;

    }


    /* =========================================
       IMAGE
       ========================================= */

    .hero-image {

        width:
            100%;

    }


    .profile-wrapper {

        width:
            min(
                315px,
                82vw
            );

    }


    .profile-container {

        border-width:
            4px;

    }


    .image-ring {

        inset:
            0;

    }


    /* =========================================
       FLOATING ICONS
       ========================================= */

    .orbit {

        width:
            40px;

        height:
            40px;

        font-size:
            .9rem;

    }


    .orbit.one {

        top:
            5%;

        right:
            1%;

    }


    .orbit.two {

        bottom:
            5%;

        left:
            2%;

    }


    .orbit.three {

        top:
            45%;

        left:
            -2%;

    }


    /* =========================================
       SOCIALS
       ========================================= */

    .profile-actions-wrapper {

        margin-top:
            20px;

        padding:
            8px;

        gap:
            7px;

    }


    .social-btn {

        width:
            40px;

        height:
            40px;

        flex-basis:
            40px;

    }


    .cv-download-btn {

        min-height:
            40px;

        padding:
            0
            14px;

        font-size:
            .78rem;

    }


    /* =========================================
       CONTENT
       ========================================= */

    .hero-content {

        width:
            100%;

    }


    .hero-content .badge {

        margin-bottom:
            18px;

        padding:
            8px
            15px;

        font-size:
            .75rem;

    }


    .hero-title {

        width:
            100%;

        font-size:
            clamp(
                2rem,
                10vw,
                2.8rem
            );

        line-height:
            1.2;

        letter-spacing:
            -1px;

    }


    .hero-desc {

        width:
            100%;

        min-height:
            0;

        margin-top:
            20px;

        font-size:
            .96rem;

        line-height:
            1.9;

        color:
            #94a3b8;

    }


    /* =========================================
       BUTTONS
       ========================================= */

    .buttons {

        width:
            100%;

        margin-top:
            25px;

        display:
            grid;

        grid-template-columns:
            1fr 1fr;

        gap:
            10px;

    }


    .btn-primary,
    .btn-secondary {

        width:
            100%;

        min-height:
            48px;

        padding:
            0
            10px;

        font-size:
            .85rem;

    }


    /* =========================================
       BACKGROUND
       ========================================= */

    .hero .circle.one {

        width:
            300px;

        height:
            300px;

    }


    .hero .circle.two {

        width:
            280px;

        height:
            280px;

    }

}


/* =========================================================
   VERY SMALL PHONES
   ========================================================= */

@media (max-width: 380px) {

    .hero {

        padding-left:
            12px;

        padding-right:
            12px;

    }


    .profile-wrapper {

        width:
            260px;

    }


    .hero-title {

        font-size:
            1.85rem;

    }


    .hero-desc {

        font-size:
            .9rem;

    }


    .buttons {

        grid-template-columns:
            1fr;

    }


    .btn-primary,
    .btn-secondary {

        min-height:
            46px;

    }

}


/* =========================================================
   REDUCE MOTION
   ========================================================= */

@media (prefers-reduced-motion: reduce) {

    .hero *,
    .hero *::before,
    .hero *::after {

        animation-duration:
            .01ms !important;

        animation-iteration-count:
            1 !important;

        transition-duration:
            .01ms !important;

    }

}

</style>


<section class="hero">

    <!-- BACKGROUND -->
    <div class="circle one"></div>
    <div class="circle two"></div>


    <div class="container-hero">

        <div class="hero-grid">


            <!-- =====================================================
                 IMAGE
            ====================================================== -->

            <div class="hero-image">

                <div class="profile-wrapper">

                    <!-- GLOW -->
                    <div class="image-glow"></div>


                    <!-- ROTATING RING -->
                    <div class="image-ring"></div>


                    <!-- PROFILE -->
                    <div class="profile-container">

                        <img
                            class="profile"
                            src="{{ $userData->profile?->profile_image
                                ? asset('storage/' . $userData->profile->profile_image)
                                : asset('images/profile.png') }}"
                            alt="{{ $userData->name ?? 'Mohammed Hameed' }}"
                        >

                    </div>


                    <!-- FLOATING ICONS -->

                    <div class="orbit one">
                        ✦
                    </div>

                    <div class="orbit two">
                        ◆
                    </div>

                    <div class="orbit three">
                        ✧
                    </div>

                </div>


                <!-- =================================================
                     SOCIAL LINKS + CV
                ================================================== -->

                <div class="profile-actions-wrapper">


                    <!-- WHATSAPP -->

                    @if(!empty($userData->profile->social_links2))

                        <a
                            href="{{ $userData->profile->social_links2 }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="social-btn whatsapp"
                            title="WhatsApp"
                        >

                            <svg viewBox="0 0 24 24">

                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>

                            </svg>

                        </a>

                    @endif


                    <!-- FACEBOOK -->

                    @if(!empty($userData->profile->social_links))

                        <a
                            href="{{ $userData->profile->social_links }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="social-btn facebook"
                            title="Facebook"
                        >

                            <svg viewBox="0 0 24 24">

                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>

                            </svg>

                        </a>

                    @endif


                    <!-- CV -->

                    @if(!empty($userData->profile->cv_url))

                        <a
                            href="{{ $userData->profile->cv_url }}"
                            target="_blank"
                            download
                            class="cv-download-btn"
                        >

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2.2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >

                                <path
                                    d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"
                                />

                                <polyline
                                    points="7 10 12 15 17 10"
                                />

                                <line
                                    x1="12"
                                    y1="15"
                                    x2="12"
                                    y2="3"
                                />

                            </svg>

                            <span>
                                Download CV
                            </span>

                        </a>

                    @endif

                </div>

            </div>


            <!-- =====================================================
                 CONTENT
            ====================================================== -->

            <div class="hero-content">


                <!-- BADGE -->

                <div class="badge">
                    Welcome To My Portfolio
                </div>


                <!-- NAME + TITLE -->

                <h1 class="hero-title">

                    <span>
                        {{ Str::before($userData->name ?? 'Mohammed Hameed', ' ') }}
                    </span>

                    {{ Str::after($userData->name ?? 'Mohammed Hameed', ' ') }}

                    <br>

                    <span>
                        {{ $userData->profile->borrow ?? '' }}
                    </span>

                </h1>


                <!-- BIO -->

                <p
                    class="hero-desc"
                    id="typewriter-desc"
                    data-text="{{ $userData?->profile?->bio ?? '' }}"
                ></p>


                <!-- BUTTONS -->

                <div class="buttons">

                    <a
                        href="{{ route('projects.show') }}"
                        class="btn-primary"
                    >
                        عرض المشاريع
                    </a>


                    <a
                        href="{{ route('services.show') }}"
                        class="btn-secondary"
                    >
                        الخدمات
                    </a>

                </div>


            </div>


        </div>

    </div>

</section>


<script>

/* =========================================================
   TYPEWRITER
   ========================================================= */

document.addEventListener(
    'DOMContentLoaded',
    function () {

        const descElement =
            document.getElementById(
                'typewriter-desc'
            );


        if (!descElement) {
            return;
        }


        const fullText =
            descElement
                .getAttribute('data-text')
                ?.trim() || '';


        if (!fullText) {
            return;
        }


        const words =
            fullText.split(/\s+/);


        let index = 0;


        const speed = 130;


        function typeWord() {

            if (index >= words.length) {
                return;
            }


            descElement.textContent +=
                (index === 0 ? '' : ' ')
                +
                words[index];


            index++;


            setTimeout(
                typeWord,
                speed
            );

        }


        typeWord();

    }
);

</script>


@endsection