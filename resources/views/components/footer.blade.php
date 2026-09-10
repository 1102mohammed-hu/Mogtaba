 
<footer class="premium-footer">

    <!-- الخلفية المضيئة -->
    <div class="footer-glow"></div>

    <div class="footer-container">

        <!-- =====================================================
             BRAND
        ====================================================== -->

        <div class="footer-brand">

            <h2>
                {{ Str::before($userData->name, ' ') }}

                <span>
                    {{ Str::after($userData->name, ' ') }}
                </span>
            </h2>

            <p>
                {{ $userData->profile->bio }}
            </p>

        </div>


        <!-- =====================================================
             LINKS
        ====================================================== -->

        <div class="footer-column">

            <h3>
                استكشف
            </h3>

            <div class="footer-links">

                <a href="/">
                    <span>الرئيسية</span>
                </a>

                <a href="{{ route('projects.show') }}">
                    <span>المشاريع</span>
                </a>

                <a href="{{ route('poem.show') }}">
                    <span>القصائد</span>
                </a>

                <a href="{{ route('services.show') }}">
                    <span>الخدمات</span>
                </a>

            </div>

        </div>


        <!-- =====================================================
             SOCIAL
        ====================================================== -->

        <div class="footer-column">

            <h3>
                تواصل معي
            </h3>

            <div class="footer-social">

                <!-- FACEBOOK -->

                @if(!empty($userData->profile->social_links))

                    <a
                        href="{{ $userData->profile->social_links }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="social-btn facebook"
                        title="Facebook"
                    >

                        <span class="social-icon">

                            <svg viewBox="0 0 24 24">

                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>

                            </svg>

                        </span>

                        <span>
                            فيسبوك
                        </span>

                    </a>

                @endif


                <!-- WHATSAPP -->

                @if(!empty($userData->profile->social_links2))

                    <a
                        href="{{ $userData->profile->social_links2 }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="social-btn whatsapp"
                        title="WhatsApp"
                    >

                        <span class="social-icon">

                            <svg viewBox="0 0 24 24">

                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>

                            </svg>

                        </span>

                        <span>
                            واتساب
                        </span>

                    </a>

                @endif

            </div>

        </div>

    </div>


    <!-- =====================================================
         FOOTER BOTTOM
    ====================================================== -->

    <div class="footer-bottom">

        <div class="footer-line"></div>

        <p>
            جميع الحقوق محفوظة
            <span>© {{ date('Y') }}</span>
            <strong>مجتبى</strong>
        </p>

    </div>


    <!-- =====================================================
         ADMIN / LOGIN
    ====================================================== -->

    <div class="footer-admin">

        <a href="{{ route('login') }}">

            <span>
                All Rights Reserved
            </span>

            <span class="admin-symbol">
                @
            </span>

        </a>

    </div>

</footer>


<style>

/* ================================================================
   PREMIUM FOOTER
================================================================ */

.premium-footer {

    position: relative;

    width: 100%;

    background:

        radial-gradient(
            circle at 50% 0%,
            rgba(99,102,241,.20),
            transparent 38%
        ),

        radial-gradient(
            circle at 15% 80%,
            rgba(79,70,229,.08),
            transparent 30%
        ),

        #020617;

    padding:
        70px
        25px
        20px;

    overflow: hidden;

    border-top:
        1px solid rgba(255,255,255,.10);

    color: #cbd5e1;

    direction: rtl;

    box-sizing: border-box;
}


/* ================================================================
   GLOW
================================================================ */

.footer-glow {

    position: absolute;

    width: 320px;
    height: 320px;

    background: #6366f1;

    filter: blur(150px);

    opacity: .18;

    top: -170px;

    left: 50%;

    transform: translateX(-50%);

    pointer-events: none;

    animation:
        footerGlow 7s
        ease-in-out
        infinite;
}


@keyframes footerGlow {

    0%,
    100% {

        transform:
            translateX(-50%)
            scale(1);

    }

    50% {

        transform:
            translateX(-50%)
            scale(1.2);

    }

}


/* ================================================================
   CONTAINER
================================================================ */

.footer-container {

    width: 100%;

    max-width: 1200px;

    margin: 0 auto;

    display: grid;

    grid-template-columns:
        1.5fr
        1fr
        1fr;

    gap: 60px;

    position: relative;

    z-index: 2;

    animation:
        footerShow
        .8s
        ease
        both;
}


@keyframes footerShow {

    from {

        opacity: 0;

        transform:
            translateY(25px);

    }

    to {

        opacity: 1;

        transform:
            translateY(0);

    }

}


/* ================================================================
   BRAND
================================================================ */

.footer-brand {

    min-width: 0;
}


.footer-brand h2 {

    margin: 0;

    font-size: 36px;

    line-height: 1.3;

    font-weight: 900;

    color: #ffffff;

    letter-spacing: -1px;
}


.footer-brand h2 span {

    color: #818cf8;

    text-shadow:
        0 0 20px
        rgba(99,102,241,.65);
}


.footer-brand p {

    max-width: 430px;

    margin:
        17px
        0
        0;

    color: #94a3b8;

    font-size: 14px;

    line-height: 2;

}


/* ================================================================
   COLUMN TITLE
================================================================ */

.footer-column {

    min-width: 0;
}


.footer-column h3 {

    margin:
        0
        0
        22px;

    color: #ffffff;

    font-size: 16px;

    font-weight: 700;

    position: relative;

    display: inline-block;
}


.footer-column h3::after {

    content: '';

    position: absolute;

    right: 0;

    bottom: -8px;

    width: 25px;

    height: 2px;

    background: #6366f1;

    border-radius: 10px;

    box-shadow:
        0 0 10px
        rgba(99,102,241,.7);
}


/* ================================================================
   LINKS
================================================================ */

.footer-links {

    display: flex;

    flex-direction: column;

    gap: 12px;
}


.footer-links a {

    display: flex;

    align-items: center;

    width: fit-content;

    color: #94a3b8;

    text-decoration: none;

    font-size: 14px;

    font-weight: 600;

    transition:
        color .3s ease,
        transform .3s ease;
}


.footer-links a::before {

    content: '←';

    margin-left: 8px;

    color: #6366f1;

    opacity: 0;

    transform:
        translateX(6px);

    transition:
        opacity .3s ease,
        transform .3s ease;
}


.footer-links a:hover {

    color: #ffffff;

    transform:
        translateX(-5px);
}


.footer-links a:hover::before {

    opacity: 1;

    transform:
        translateX(0);
}


/* ================================================================
   SOCIAL
================================================================ */

.footer-social {

    display: flex;

    flex-direction: column;

    gap: 11px;
}


.footer-social a {

    display: flex;

    align-items: center;

    gap: 11px;

    width: fit-content;

    min-width: 125px;

    padding:
        9px
        12px;

    border-radius: 11px;

    color: #cbd5e1;

    text-decoration: none;

    font-size: 13px;

    font-weight: 600;

    background:
        rgba(255,255,255,.035);

    border:
        1px solid
        rgba(255,255,255,.07);

    transition:
        transform .3s ease,
        background .3s ease,
        border-color .3s ease,
        color .3s ease;
}


.social-icon {

    width: 30px;
    height: 30px;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 9px;

    background:
        rgba(255,255,255,.06);
}


.social-icon svg {

    width: 16px;
    height: 16px;

    fill: currentColor;
}


.footer-social a:hover {

    transform:
        translateX(-5px);

    color: #ffffff;

    background:
        rgba(255,255,255,.07);

    border-color:
        rgba(255,255,255,.16);
}


/* FACEBOOK */

.footer-social .facebook .social-icon {

    color: #60a5fa;
}


/* WHATSAPP */

.footer-social .whatsapp .social-icon {

    color: #4ade80;
}


/* ================================================================
   BOTTOM
================================================================ */

.footer-bottom {

    width: 100%;

    max-width: 1200px;

    margin:
        55px
        auto
        0;

    position: relative;

    z-index: 2;
}


.footer-line {

    width: 100%;

    height: 1px;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,.12),
            transparent
        );

    margin-bottom: 20px;
}


.footer-bottom p {

    margin: 0;

    text-align: center;

    color: #64748b;

    font-size: 12px;

    line-height: 2;
}


.footer-bottom span {

    margin:
        0
        4px;

    color: #818cf8;
}


.footer-bottom strong {

    color: #94a3b8;

    font-weight: 700;
}


/* ================================================================
   ADMIN LINK
================================================================ */

.footer-admin {

    position: relative;

    z-index: 2;

    margin-top: 13px;

    text-align: center;
}


.footer-admin a {

    display: inline-flex;

    align-items: center;

    gap: 5px;

    color: #334155;

    text-decoration: none;

    font-size: 10px;

    transition:
        color .3s ease;
}


.footer-admin a:hover {

    color: #64748b;
}


.admin-symbol {

    color: #475569;

    font-weight: 700;
}


/* ================================================================
   TABLET
================================================================ */

@media (max-width: 900px) {

    .premium-footer {

        padding:
            55px
            20px
            18px;
    }


    .footer-container {

        grid-template-columns:
            1.3fr
            1fr
            1fr;

        gap: 30px;
    }


    .footer-brand h2 {

        font-size: 30px;
    }


    .footer-brand p {

        font-size: 13px;
    }

}


/* ================================================================
   MOBILE
================================================================ */

@media (max-width: 700px) {

    .premium-footer {

        padding:
            45px
            16px
            16px;

        text-align: center;
    }


    /* ------------------------------------------------------------
       CONTAINER
    ------------------------------------------------------------ */

    .footer-container {

        display: flex;

        flex-direction: column;

        align-items: center;

        gap: 32px;

        width: 100%;
    }


    /* ------------------------------------------------------------
       BRAND
    ------------------------------------------------------------ */

    .footer-brand {

        width: 100%;

        max-width: 420px;
    }


    .footer-brand h2 {

        font-size: 29px;

        line-height: 1.35;
    }


    .footer-brand p {

        max-width: 100%;

        margin:
            12px
            auto
            0;

        padding:
            0
            8px;

        font-size: 13px;

        line-height: 1.9;

        color: #94a3b8;
    }


    /* ------------------------------------------------------------
       COLUMNS
    ------------------------------------------------------------ */

    .footer-column {

        width: 100%;

        display: flex;

        flex-direction: column;

        align-items: center;
    }


    .footer-column h3 {

        margin-bottom: 20px;

        font-size: 15px;
    }


    /* ------------------------------------------------------------
       LINKS
    ------------------------------------------------------------ */

    .footer-links {

        width: 100%;

        max-width: 280px;

        align-items: center;

        gap: 9px;
    }


    .footer-links a {

        width: 100%;

        min-height: 40px;

        justify-content: center;

        padding:
            8px
            12px;

        border-radius: 10px;

        background:
            rgba(255,255,255,.025);

        border:
            1px solid
            rgba(255,255,255,.045);

        font-size: 13px;

        transition:
            background .3s ease,
            color .3s ease;
    }


    .footer-links a::before {

        display: none;
    }


    .footer-links a:hover {

        transform: none;

        background:
            rgba(99,102,241,.09);
    }


    /* ------------------------------------------------------------
       SOCIAL
    ------------------------------------------------------------ */

    .footer-social {

        width: 100%;

        max-width: 280px;

        align-items: center;

        gap: 9px;
    }


    .footer-social a {

        width: 100%;

        min-width: 0;

        min-height: 46px;

        justify-content: center;

        padding:
            7px
            12px;

        border-radius: 11px;

        font-size: 13px;
    }


    .footer-social a:hover {

        transform: none;
    }


    .social-icon {

        width: 30px;
        height: 30px;
    }


    /* ------------------------------------------------------------
       BOTTOM
    ------------------------------------------------------------ */

    .footer-bottom {

        margin-top: 38px;
    }


    .footer-bottom p {

        font-size: 11px;

        padding:
            0
            5px;
    }


    .footer-admin {

        margin-top: 11px;
    }

}


/* ================================================================
   SMALL PHONES
================================================================ */

@media (max-width: 430px) {

    .premium-footer {

        padding:
            38px
            12px
            14px;
    }


    .footer-container {

        gap: 27px;
    }


    .footer-brand h2 {

        font-size: 26px;
    }


    .footer-brand p {

        font-size: 12px;

        line-height: 1.85;

        padding:
            0
            5px;
    }


    .footer-column h3 {

        font-size: 14px;

        margin-bottom: 17px;
    }


    .footer-links,
    .footer-social {

        max-width: 245px;
    }


    .footer-links a {

        min-height: 38px;

        font-size: 12px;
    }


    .footer-social a {

        min-height: 43px;

        font-size: 12px;
    }


    .social-icon {

        width: 28px;
        height: 28px;
    }


    .social-icon svg {

        width: 15px;
        height: 15px;
    }


    .footer-bottom {

        margin-top: 32px;
    }


    .footer-bottom p {

        font-size: 10px;
    }

}


/* ================================================================
   VERY SMALL PHONES
================================================================ */

@media (max-width: 360px) {

    .premium-footer {

        padding:
            32px
            9px
            12px;
    }


    .footer-container {

        gap: 24px;
    }


    .footer-brand h2 {

        font-size: 23px;
    }


    .footer-brand p {

        font-size: 11px;

        line-height: 1.8;
    }


    .footer-links,
    .footer-social {

        max-width: 220px;
    }


    .footer-links a {

        min-height: 36px;

        font-size: 11px;
    }


    .footer-social a {

        min-height: 41px;

        font-size: 11px;
    }


    .footer-bottom p {

        font-size: 9px;
    }


    .footer-admin a {

        font-size: 9px;
    }

}


/* ================================================================
   REDUCE MOTION
================================================================ */

@media (prefers-reduced-motion: reduce) {

    .footer-glow,
    .footer-container {

        animation: none;
    }

    .footer-links a,
    .footer-social a,
    .footer-admin a {

        transition: none;
    }

}

</style>
