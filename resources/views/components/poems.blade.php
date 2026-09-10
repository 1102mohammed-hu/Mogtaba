{{-- =========================================================
     CINEMATIC POETRY GALLERY
     PREMIUM RESPONSIVE VERSION
     ========================================================= --}}

<section class="cinematic-poetry" id="poetryGallery">

    {{-- =====================================================
         HEADER
         ===================================================== --}}

    <div class="poetry-header">

        <div class="header-meta">
            <span class="meta-line"></span>
            <span>قصائد من القلب</span>
        </div>

        <div class="header-main">

            <h2>
                مختارات
                <span>شعرية</span>
            </h2>

            <p>
                نصوص تعبر من الذاكرة إلى الورق،
                ومن الورق إلى القارئ.
            </p>

        </div>

        <div class="poetry-counter">

            <strong id="currentNumber">
                01
            </strong>

            <span>/</span>

            <span id="totalNumber">
                {{ str_pad(count($poems), 2, '0', STR_PAD_LEFT) }}
            </span>

        </div>

    </div>


    @if($poems->count())


        {{-- =================================================
             VIEW ALL BUTTON
             ================================================= --}}

        <div class="all-poems-action">

            <button
                type="button"
                id="openAllPoems"
                class="all-poems-button"
            >

                <span class="all-poems-icon">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>

                <span>
                    عرض جميع القصائد
                </span>

                <b>↗</b>

            </button>

        </div>


        {{-- =================================================
             MAIN GALLERY
             ================================================= --}}

        <div class="poetry-gallery-wrapper">

            <div
                class="gallery-track"
                id="poetryTrack"
            >

                @foreach($poems as $index => $poem)

                    @php

                        $image = $poem->image
                            ? asset('storage/' . $poem->image)
                            : asset('images/profile.png');

                    @endphp


                    <article
                        class="poem-slide {{ $index === 0 ? 'active' : '' }}"

                        data-index="{{ $index }}"

                        data-title="{{ e($poem->poem_title) }}"

                        data-content="{{ e($poem->poem_content) }}"

                        data-image="{{ $image }}"

                        data-link="{{ e($poem->poem_link ?? '') }}"
                    >

                        {{-- رقم القصيدة --}}

                        <div class="slide-number">

                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}

                        </div>


                        {{-- الصورة --}}

                        <div class="slide-image">

                            <img
                                src="{{ $image }}"
                                alt="{{ $poem->poem_title }}"
                                loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
                            >

                            <div class="image-overlay"></div>

                            <span class="image-label">
                                قصيدة
                            </span>

                        </div>


                        {{-- العنوان --}}

                        <div class="slide-title">

                            {{ $poem->poem_title }}

                        </div>

                    </article>

                @endforeach

            </div>

        </div>


        {{-- =================================================
             NAVIGATION
             ================================================= --}}

        <div class="gallery-navigation">

            <button
                type="button"
                class="gallery-btn"
                id="prevPoem"
                aria-label="القصيدة السابقة"
            >

                <span>←</span>

                السابقة

            </button>


            <div class="progress-container">

                <div class="progress-track">

                    <div
                        class="progress-bar"
                        id="poetryProgress"
                    ></div>

                </div>

            </div>


            <button
                type="button"
                class="gallery-btn"
                id="nextPoem"
                aria-label="القصيدة التالية"
            >

                التالية

                <span>→</span>

            </button>

        </div>


        {{-- =================================================
             SELECTED POEM
             ================================================= --}}

        <div
            class="selected-poem"
            id="selectedPoem"
        >

            <div class="selected-index">

                <span>
                    النص
                </span>

                <strong id="detailNumber">
                    01
                </strong>

            </div>


            <div class="selected-content">

                <div class="selected-heading">

                    <span class="eyebrow">
                        من دفتر القصائد
                    </span>

                    <h1 id="poemTitle">
                        {{ $poems->first()->poem_title }}
                    </h1>

                </div>


                <div class="poem-divider">

                    <span></span>

                    <i></i>

                    <span></span>

                </div>


                <div
                    class="poem-text"
                    id="poemContent"
                >
                    {!! nl2br(e($poems->first()->poem_content)) !!}
                </div>


                <div class="selected-footer">

                    <a
                        href="{{ $poems->first()->poem_link ?? '#' }}"
                        id="poemLink"
                        class="read-button"

                        style="{{ empty($poems->first()->poem_link) ? 'display:none;' : '' }}"
                    >

                        <span>
                            رابط القصيدة
                        </span>

                        <b>
                            ↗
                        </b>

                    </a>

                </div>

            </div>

        </div>


    @else


        {{-- =================================================
             EMPTY STATE
             ================================================= --}}

        <div class="poetry-empty">

            <div class="empty-number">
                00
            </div>

            <h3>
                لا توجد قصائد حالياً
            </h3>

            <p>
                ستظهر القصائد هنا عند إضافتها.
            </p>

        </div>


    @endif


    {{-- =====================================================
         ALL POEMS MODAL
         ===================================================== --}}

    @if($poems->count())

        <div
            class="poems-modal"
            id="allPoemsModal"
            aria-hidden="true"
        >

            <div class="modal-backdrop"></div>


            <div class="modal-window">

                {{-- -----------------------------------------
                     MODAL HEADER
                     ----------------------------------------- --}}

                <div class="modal-header">

                    <div class="modal-heading">

                        <span>
                            ARCHIVE
                        </span>

                        <h2>
                            جميع القصائد
                        </h2>

                        <p>
                            أرشيف النصوص والقصائد
                        </p>

                    </div>


                    <button
                        type="button"
                        class="modal-close"
                        id="closeAllPoems"
                        aria-label="إغلاق"
                    >

                        <span></span>
                        <span></span>

                    </button>

                </div>


                {{-- -----------------------------------------
                     MODAL COUNT
                     ----------------------------------------- --}}

                <div class="modal-count">

                    <strong>
                        {{ str_pad(count($poems), 2, '0', STR_PAD_LEFT) }}
                    </strong>

                    <span>
                        قصيدة
                    </span>

                </div>


                {{-- -----------------------------------------
                     ALL POEMS GRID
                     ----------------------------------------- --}}

                <div class="all-poems-grid">

                    @foreach($poems as $index => $poem)

                        @php

                            $modalImage = $poem->image
                                ? asset('storage/' . $poem->image)
                                : asset('images/profile.png');

                        @endphp


                        <article class="archive-poem">

                            {{-- الصورة --}}

                            <div class="archive-image">

                                <img
                                    src="{{ $modalImage }}"
                                    alt="{{ $poem->poem_title }}"
                                    loading="lazy"
                                >

                                <div class="archive-image-number">

                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}

                                </div>

                            </div>


                            {{-- المعلومات --}}

                            <div class="archive-body">

                                <div class="archive-label">
                                    قصيدة رقم
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </div>


                                <h3>
                                    {{ $poem->poem_title }}
                                </h3>


                                <div class="archive-divider"></div>


                                <div class="archive-content">

                                    {!! nl2br(e($poem->poem_content)) !!}

                                </div>


                                @if(!empty($poem->poem_link))

                                    <a
                                        href="{{ $poem->poem_link }}"
                                        class="archive-link"
                                    >

                                        <span>
                                            رابط القصيدة
                                        </span>

                                        <b>
                                            ↗
                                        </b>

                                    </a>

                                @endif

                            </div>

                        </article>

                    @endforeach

                </div>

            </div>

        </div>

    @endif

</section>



<style>

/* =========================================================
   CINEMATIC POETRY
   ========================================================= */

.cinematic-poetry {

    --black: #101010;

    --paper: #f5f1e9;

    --paper-dark: #e8e1d5;

    --text: #171717;

    --muted: #777168;

    --accent: #9d7650;

    position: relative;

    width: 100%;

    margin: 0 auto;

    padding: 70px 5vw 90px;

    background: var(--paper);

    color: var(--text);

    overflow: hidden;

    direction: rtl;

    font-family:
        "Cairo",
        "Noto Sans Arabic",
        Arial,
        sans-serif;

}


/* =========================================================
   HEADER
   ========================================================= */

.poetry-header {

    width: 100%;

    max-width: 1450px;

    margin: 0 auto 35px;

    display: grid;

    grid-template-columns: 1fr 2fr auto;

    align-items: end;

    gap: 40px;

}


.header-meta {

    display: flex;

    align-items: center;

    gap: 12px;

    color: #111;

    font-size: 19px;

    font-weight: 900;

    white-space: nowrap;

}


.meta-line {

    width: 45px;

    height: 2px;

    background: var(--accent);

}


.header-main h2 {

    margin: 0;

    font-size: clamp(45px, 6vw, 92px);

    line-height: .95;

    letter-spacing: -3px;

    font-weight: 900;

}


.header-main h2 span {

    color: var(--accent);

    display: inline-block;

}


.header-main p {

    margin: 22px 0 0;

    max-width: 650px;

    color: #101010;

    font-size: 18px;

    line-height: 1.9;

    font-weight: 900;

}


.poetry-counter {

    font-size: xxx-large;

    direction: ltr;

    display: flex;

    align-items: baseline;

    gap: 8px;

    font-family: Arial, sans-serif;

    color: var(--muted);

}


.poetry-counter strong {

    color: var(--black);

    font-size: 55px;

    line-height: 1;

    font-weight: 900;

}


/* =========================================================
   ALL POEMS BUTTON
   ========================================================= */

.all-poems-action {

    width: 100%;

    max-width: 1450px;

    margin: 0 auto 30px;

    display: flex;

    justify-content: flex-start;

}


.all-poems-button {

    appearance: none;

    border: 1px solid #1a1a1a;

    background: #101010;

    color: #fff;

    min-height: 58px;

    padding: 0 22px;

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 14px;

    cursor: pointer;

    font-family: inherit;

    font-size: 18px;

    font-weight: 900;

    transition:
        background .25s ease,
        color .25s ease,
        transform .25s ease,
        box-shadow .25s ease;

}


.all-poems-button:hover {

    background: var(--accent);

    border-color: var(--accent);

    transform: translateY(-2px);

    box-shadow:
        0 12px 25px rgba(0,0,0,.12);

}


.all-poems-button b {

    font-family: Arial, sans-serif;

    font-size: 22px;

    font-weight: 400;

}


.all-poems-icon {

    width: 22px;

    height: 22px;

    display: flex;

    flex-direction: column;

    justify-content: center;

    gap: 4px;

}


.all-poems-icon i {

    display: block;

    width: 18px;

    height: 2px;

    background: #fff;

}


.all-poems-icon i:nth-child(2) {

    width: 13px;

}


.all-poems-icon i:nth-child(3) {

    width: 8px;

}


/* =========================================================
   GALLERY
   ========================================================= */

.poetry-gallery-wrapper {

    width: 100%;

    max-width: 1500px;

    margin: auto;

    overflow: hidden;

}


.gallery-track {

    display: flex;

    gap: 24px;

    overflow-x: auto;

    padding: 10px 5px 35px;

    scroll-behavior: smooth;

    scroll-snap-type: x mandatory;

    scrollbar-width: none;

}


.gallery-track::-webkit-scrollbar {

    display: none;

}


.poem-slide {

    position: relative;

    flex: 0 0 260px;

    height: 370px;

    scroll-snap-align: center;

    cursor: pointer;

    overflow: hidden;

    background: #222;

    transition:
        flex-basis .45s ease,
        transform .45s ease;

}


.poem-slide.active {

    flex-basis: 430px;

}


.slide-image {

    position: absolute;

    inset: 0;

    overflow: hidden;

}


.slide-image img {

    width: 100%;

    height: 100%;

    object-fit: cover;

    display: block;

    filter: grayscale(35%);

    transition:
        transform .7s ease,
        filter .7s ease;

}


.poem-slide:hover .slide-image img,
.poem-slide.active .slide-image img {

    transform: scale(1.045);

    filter: grayscale(0);

}


.image-overlay {

    position: absolute;

    inset: 0;

    background:
        linear-gradient(
            to top,
            rgba(0,0,0,.88),
            rgba(0,0,0,.05) 70%
        );

}


.image-label {

    position: absolute;

    top: 20px;

    right: 20px;

    padding: 7px 13px;

    background: rgba(255,255,255,.92);

    color: #111;

    font-size: 12px;

    font-weight: 800;

}


.slide-number {

    position: absolute;

    z-index: 3;

    top: 18px;

    left: 20px;

    color: white;

    font-family: Arial, sans-serif;

    font-size: 18px;

    font-weight: 800;

}


.slide-title {

    position: absolute;

    z-index: 3;

    right: 25px;

    left: 25px;

    bottom: 25px;

    color: white;

    font-family:
        "Amiri",
        "Noto Serif Arabic",
        serif;

    font-size: 28px;

    line-height: 1.35;

    font-weight: 700;

}


/* =========================================================
   NAVIGATION
   ========================================================= */

.gallery-navigation {

    width: 100%;

    max-width: 1450px;

    margin: 25px auto 70px;

    display: flex;

    align-items: center;

    gap: 30px;

}


.gallery-btn {

    border: 0;

    background: transparent;

    color: var(--text);

    cursor: pointer;

    min-height: 52px;

    padding: 10px 4px;

    font-size: 52px;

    font-weight: 800;

    display: flex;

    align-items: center;

    gap: 10px;

    transition: color .2s ease;

}


.gallery-btn:hover {

    color: var(--accent);

}


.gallery-btn span {

    font-family: Arial, sans-serif;

    font-size: 22px;

}


.progress-container {

    flex: 1;

}


.progress-track {

    width: 100%;

    height: 3px;

    background: #d5cec3;

    overflow: hidden;

}


.progress-bar {

    width: 0;

    height: 100%;

    background: var(--black);

    transition: width .4s ease;

}


/* =========================================================
   SELECTED POEM
   ========================================================= */

.selected-poem {

    max-width: 1450px;

    margin: auto;

    display: grid;

    grid-template-columns: 150px 1fr;

    gap: 65px;

    border-top: 1px solid #d5cec3;

    padding-top: 55px;

}


.selected-index {

    display: flex;

    flex-direction: column;

    gap: 10px;

    color: var(--muted);

}


.selected-index span {

    font-size: 54px;

    font-weight: 800;

}


.selected-index strong {

    font-family: Arial, sans-serif;

    font-size: 65px;

    line-height: 1;

    color: var(--accent);

}


.selected-content {

    max-width: 1050px;

}


.eyebrow {

    display: block;

    margin-bottom: 15px;

    color: var(--accent);

    font-size: 2pc;

    font-weight: 900;

}


.selected-heading h1 {

    margin: 0;

    font-family:
        "Amiri",
        "Noto Serif Arabic",
        serif;

    font-size: clamp(40px, 5vw, 78px);

    line-height: 1.15;

    font-weight: 700;

}


.poem-divider {

    display: flex;

    align-items: center;

    gap: 9px;

    margin: 35px 0;

}


.poem-divider span {

    width: 45px;

    height: 1px;

    background: #bdb4a7;

}


.poem-divider i {

    width: 8px;

    height: 8px;

    background: var(--accent);

    transform: rotate(45deg);

}


.poem-text {

    max-width: 902px;

    color: #37332e;

    font-family:
        "Amiri",
        "Noto Serif Arabic",
        serif;

    font-size: clamp(36px, 3.5vw, 75px);

    line-height: 2.15;

    white-space: normal;

    font-weight: 900;

}


.selected-footer {

    margin-top: 55px;

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 30px;

    border-top: 1px solid #d5cec3;

    padding-top: 25px;

}


.read-button {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 15px;

    min-height: 56px;

    padding: 0 25px;

    background: var(--black);

    color: white;

    text-decoration: none;

    font-size: 22px;

    font-weight: 800;

    transition:
        transform .25s ease,
        background .25s ease;

}


.read-button:hover {

    transform: translateY(-3px);

    background: var(--accent);

}


.read-button b {

    font-size: 21px;

    font-family: Arial, sans-serif;

}


/* =========================================================
   EMPTY
   ========================================================= */

.poetry-empty {

    min-height: 400px;

    display: flex;

    align-items: center;

    justify-content: center;

    flex-direction: column;

    text-align: center;

}


.empty-number {

    font-family: Arial, sans-serif;

    font-size: 100px;

    font-weight: 900;

    color: #ddd5ca;

}


.poetry-empty h3 {

    margin: 10px 0;

    font-size: 28px;

}


.poetry-empty p {

    color: var(--muted);

    font-size: 16px;

}


/* =========================================================
   =========================================================
   ALL POEMS MODAL
   =========================================================
   ========================================================= */

.poems-modal {

    position: fixed;

    inset: 0;

    z-index: 99999;

    display: flex;

    align-items: center;

    justify-content: center;

    padding: 25px;

    visibility: hidden;

    opacity: 0;

    pointer-events: none;

    transition:
        opacity .3s ease,
        visibility .3s ease;

}


.poems-modal.open {

    visibility: visible;

    opacity: 1;

    pointer-events: auto;

}


.modal-backdrop {

    position: absolute;

    inset: 0;

    background:
        rgba(12,12,12,.78);

    backdrop-filter:
        blur(8px);

    -webkit-backdrop-filter:
        blur(8px);

}


.modal-window {

    position: relative;

    z-index: 2;

    width: min(1450px, 100%);

    max-height: 92vh;

    overflow-y: auto;

    background: #f7f3ec;

    border: 1px solid rgba(255,255,255,.2);

    box-shadow:
        0 35px 90px rgba(0,0,0,.4);

    padding: 45px;

    direction: rtl;

    scrollbar-width: thin;

    scrollbar-color:
        var(--accent)
        #ddd5ca;

    transform:
        translateY(20px)
        scale(.98);

    transition:
        transform .35s ease;

}


.poems-modal.open .modal-window {

    transform:
        translateY(0)
        scale(1);

}


/* =========================================================
   MODAL HEADER
   ========================================================= */

.modal-header {

    display: flex;

    align-items: flex-start;

    justify-content: space-between;

    gap: 30px;

    border-bottom: 1px solid #d7d0c6;

    padding-bottom: 30px;

}


.modal-heading span {

    display: block;

    direction: ltr;

    font-family: Arial, sans-serif;

    color: var(--accent);

    font-size: 13px;

    letter-spacing: 4px;

    font-weight: 900;

}


.modal-heading h2 {

    margin: 8px 0 0;

    font-size: clamp(38px, 5vw, 65px);

    line-height: 1.1;

    font-weight: 900;

    color: #111;

}


.modal-heading p {

    margin-top: 10px;

    color: #716b63;

    font-size: 18px;

    font-weight: 700;

}


/* =========================================================
   CLOSE
   ========================================================= */

.modal-close {

    position: relative;

    flex: 0 0 auto;

    width: 58px;

    height: 58px;

    border: 1px solid #bdb5aa;

    background: transparent;

    cursor: pointer;

    transition:
        background .25s ease,
        border-color .25s ease;

}


.modal-close:hover {

    background: #111;

    border-color: #111;

}


.modal-close span {

    position: absolute;

    top: 50%;

    left: 50%;

    width: 25px;

    height: 2px;

    background: #111;

    transition: background .25s ease;

}


.modal-close:hover span {

    background: white;

}


.modal-close span:first-child {

    transform:
        translate(-50%, -50%)
        rotate(45deg);

}


.modal-close span:last-child {

    transform:
        translate(-50%, -50%)
        rotate(-45deg);

}


/* =========================================================
   MODAL COUNT
   ========================================================= */

.modal-count {

    display: flex;

    align-items: baseline;

    gap: 10px;

    margin: 25px 0;

}


.modal-count strong {

    font-family: Arial, sans-serif;

    color: var(--accent);

    font-size: 35px;

    font-weight: 900;

}


.modal-count span {

    color: #686158;

    font-size: 17px;

    font-weight: 800;

}


/* =========================================================
   ARCHIVE GRID
   ========================================================= */

.all-poems-grid {

    display: grid;

    grid-template-columns:
        repeat(3, minmax(0, 1fr));

    gap: 25px;

}


.archive-poem {

    background: #fff;

    border: 1px solid #ded7cc;

    overflow: hidden;

    display: flex;

    flex-direction: column;

    transition:
        transform .3s ease,
        box-shadow .3s ease,
        border-color .3s ease;

}


.archive-poem:hover {

    transform: translateY(-6px);

    border-color: #c7b49f;

    box-shadow:
        0 18px 45px rgba(0,0,0,.10);

}


/* =========================================================
   ARCHIVE IMAGE
   ========================================================= */

.archive-image {

    position: relative;

    width: 100%;

    height: 270px;

    overflow: hidden;

    background: #ddd;

}


.archive-image img {

    width: 100%;

    height: 100%;

    object-fit: cover;

    display: block;

    transition:
        transform .5s ease;

}


.archive-poem:hover .archive-image img {

    transform: scale(1.035);

}


.archive-image-number {

    position: absolute;

    top: 15px;

    left: 15px;

    width: 48px;

    height: 48px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: rgba(255,255,255,.94);

    color: #111;

    font-family: Arial, sans-serif;

    font-size: 15px;

    font-weight: 900;

}


/* =========================================================
   ARCHIVE BODY
   ========================================================= */

.archive-body {

    padding: 28px;

}


.archive-label {

    color: var(--accent);

    font-size: 14px;

    font-weight: 900;

    margin-bottom: 12px;

}


.archive-body h3 {

    margin: 0;

    color: #111;

    font-family:
        "Amiri",
        "Noto Serif Arabic",
        serif;

    font-size: 32px;

    line-height: 1.3;

    font-weight: 700;

}


.archive-divider {

    width: 55px;

    height: 2px;

    background: var(--accent);

    margin: 22px 0;

}


.archive-content {

    color: #3e3933;

    font-family:
        "Amiri",
        "Noto Serif Arabic",
        serif;

    font-size: 19px;

    line-height: 2;

    font-weight: 600;

    max-height: 390px;

    overflow-y: auto;

    padding-left: 8px;

    scrollbar-width: thin;

    scrollbar-color:
        #c5b39f
        transparent;

}


.archive-content::-webkit-scrollbar {

    width: 4px;

}


.archive-content::-webkit-scrollbar-thumb {

    background: #c5b39f;

}


/* =========================================================
   ARCHIVE LINK
   ========================================================= */

.archive-link {

    margin-top: 25px;

    padding-top: 18px;

    border-top: 1px solid #e3ddd4;

    display: flex;

    align-items: center;

    justify-content: space-between;

    color: #111;

    text-decoration: none;

    font-size: 16px;

    font-weight: 900;

    transition: color .2s ease;

}


.archive-link:hover {

    color: var(--accent);

}


.archive-link b {

    font-family: Arial, sans-serif;

    font-size: 21px;

}


/* =========================================================
   LAPTOP
   ========================================================= */

@media (min-width: 901px) and (max-width: 1250px) {

    .cinematic-poetry {

        padding-left: 35px;

        padding-right: 35px;

    }


    .poetry-header {

        grid-template-columns:
            180px
            minmax(0, 1fr)
            120px;

        gap: 25px;

    }


    .header-main h2 {

        font-size: 65px;

    }


    .header-main p {

        font-size: 18px;

    }


    .poem-slide {

        flex-basis: 220px;

        height: 340px;

    }


    .poem-slide.active {

        flex-basis: 360px;

    }


    .selected-poem {

        grid-template-columns: 120px minmax(0, 1fr);

        gap: 35px;

    }


    .selected-content {

        max-width: 900px;

    }


    .all-poems-grid {

        grid-template-columns:
            repeat(2, minmax(0, 1fr));

    }


    .modal-window {

        padding: 35px;

    }

}


/* =========================================================
   TABLET
   ========================================================= */

@media (max-width: 900px) {

    .cinematic-poetry {

        padding:
            55px 25px
            70px;

    }


    .poetry-header {

        grid-template-columns:
            1fr auto;

        gap: 25px;

    }


    .header-meta {

        grid-column:
            1 / -1;

    }


    .poetry-counter {

        align-self: center;

    }


    .poem-slide {

        flex-basis: 230px;

        height: 330px;

    }


    .poem-slide.active {

        flex-basis: 350px;

    }


    .selected-poem {

        grid-template-columns:
            100px 1fr;

        gap: 35px;

    }


    .all-poems-grid {

        grid-template-columns:
            repeat(2, minmax(0, 1fr));

    }


    .modal-window {

        padding: 30px;

    }

}


/* =========================================================
   MOBILE
   ========================================================= */

@media (max-width: 600px) {

    .cinematic-poetry {

        margin: 35px 0;

        padding:
            45px 15px
            55px;

    }


    /* HEADER */

    .poetry-header {

        display: block;

        margin-bottom: 25px;

    }


    .header-meta {

        margin-bottom: 25px;

        font-size: 19px;

    }


    .meta-line {

        width: 30px;

    }


    .header-main h2 {

        font-size:
            clamp(48px, 15vw, 70px);

        letter-spacing: -2px;

    }


    .header-main p {

        margin-top: 18px;

        font-size: 15px;

        line-height: 1.8;

    }


    .poetry-counter {

        margin-top: 25px;

        justify-content: flex-start;

    }


    .poetry-counter strong {

        font-size: 48px;

    }


    /* ALL BUTTON */

    .all-poems-action {

        margin-bottom: 25px;

    }


    .all-poems-button {

        width: 100%;

        min-height: 60px;

        font-size: 18px;

    }


    /* GALLERY */

    .gallery-track {

        gap: 14px;

        padding:
            5px 5px
            25px;

        margin-right: -5px;

    }


    .poem-slide,
    .poem-slide.active {

        flex:
            0 0 84vw;

        width: 84vw;

        height: 390px;

        scroll-snap-align: center;

    }


    .slide-number {

        top: 18px;

        left: 18px;

        font-size: 18px;

    }


    .image-label {

        top: 18px;

        right: 18px;

        padding:
            8px 12px;

        font-size: 12px;

    }


    .slide-title {

        right: 22px;

        left: 22px;

        bottom: 22px;

        font-size: 30px;

        line-height: 1.35;

    }


    /* NAVIGATION */

    .gallery-navigation {

        margin:
            5px auto
            45px;

        gap: 12px;

    }


    .gallery-btn {

        min-height: 54px;

        font-size: 13px;

        white-space: nowrap;

    }


    .gallery-btn span {

        font-size: 18px;

    }


    .progress-container {

        min-width: 50px;

    }


    /* SELECTED */

    .selected-poem {

        display: block;

        padding-top: 35px;

    }


    .selected-index {

        flex-direction: row;

        align-items: center;

        justify-content: space-between;

        margin-bottom: 25px;

    }


    .selected-index span {

        font-size: 14px;

    }


    .selected-index strong {

        font-size: 48px;

    }


    .eyebrow {

        font-size: 31px;

        margin-bottom: 12px;

    }


    .selected-heading h1 {

        font-size:
            clamp(38px, 12vw, 55px);

        line-height: 1.2;

    }


    .poem-divider {

        margin: 28px 0;

    }


    .poem-text {

        font-size: 23px;

        line-height: 2.05;

    }


    .selected-footer {

        margin-top: 40px;

        display: flex;

        flex-direction: column;

        align-items: stretch;

        gap: 22px;

    }


    .read-button {

        width: 100%;

        min-height: 60px;

        font-size: 16px;

    }


    /* =====================================================
       MODAL MOBILE
       ===================================================== */

    .poems-modal {

        padding: 8px;

    }


    .modal-window {

        width: 100%;

        max-height: 96vh;

        padding:
            25px 15px
            30px;

    }


    .modal-header {

        padding-bottom: 22px;

    }


    .modal-heading span {

        font-size: 11px;

        letter-spacing: 3px;

    }


    .modal-heading h2 {

        font-size: 42px;

    }


    .modal-heading p {

        font-size: 15px;

    }


    .modal-close {

        width: 48px;

        height: 48px;

    }


    .modal-count {

        margin: 20px 0;

    }


    .modal-count strong {

        font-size: 30px;

    }


    .modal-count span {

        font-size: 15px;

    }


    .all-poems-grid {

        grid-template-columns: 1fr;

        gap: 22px;

    }


    .archive-image {

        height: 280px;

    }


    .archive-body {

        padding: 24px 20px 28px;

    }


    .archive-label {

        font-size: 14px;

    }


    .archive-body h3 {

        font-size: 32px;

    }


    .archive-content {

        font-size: 21px;

        line-height: 2;

        max-height: 450px;

    }


    .archive-link {

        min-height: 50px;

        font-size: 17px;

    }

}


/* =========================================================
   VERY SMALL PHONES
   ========================================================= */

@media (max-width: 380px) {

    .cinematic-poetry {

        padding-left: 12px;

        padding-right: 12px;

    }


    .poem-slide,
    .poem-slide.active {

        flex-basis: 88vw;

        width: 88vw;

        height: 360px;

    }


    .slide-title {

        font-size: 27px;

    }


    .poem-text {

        font-size: 21px;

        line-height: 2;

    }


    .modal-heading h2 {

        font-size: 36px;

    }


    .archive-image {

        height: 240px;

    }


    .archive-body h3 {

        font-size: 29px;

    }


    .archive-content {

        font-size: 20px;

    }

}


/* =========================================================
   PREVENT BODY SCROLL WHEN MODAL OPEN
   ========================================================= */

body.poems-modal-open {

    overflow: hidden;

}

</style>



<script>

document.addEventListener('DOMContentLoaded', function () {


    /* =====================================================
       MAIN POETRY GALLERY
       ===================================================== */

    const slides = Array.from(
        document.querySelectorAll('.poem-slide')
    );


    if (slides.length) {

        const track =
            document.getElementById('poetryTrack');

        const title =
            document.getElementById('poemTitle');

        const content =
            document.getElementById('poemContent');

        const link =
            document.getElementById('poemLink');

        const currentNumber =
            document.getElementById('currentNumber');

        const detailNumber =
            document.getElementById('detailNumber');

        const progress =
            document.getElementById('poetryProgress');

        const prevButton =
            document.getElementById('prevPoem');

        const nextButton =
            document.getElementById('nextPoem');


        let currentIndex = 0;


        function updatePoem(index, scroll = true) {


            if (index < 0) {

                index =
                    slides.length - 1;

            }


            if (index >= slides.length) {

                index = 0;

            }


            currentIndex = index;


            const slide =
                slides[index];


            slides.forEach(item => {

                item.classList.remove('active');

            });


            slide.classList.add('active');


            /* -----------------------------------------
               TITLE
               ----------------------------------------- */

            title.textContent =
                slide.dataset.title || '';


            /* -----------------------------------------
               CONTENT
               ----------------------------------------- */

            content.innerHTML =
                (slide.dataset.content || '')
                    .replace(/\n/g, '<br>');


            /* -----------------------------------------
               NUMBER
               ----------------------------------------- */

            const number =
                String(index + 1)
                    .padStart(2, '0');


            currentNumber.textContent =
                number;


            detailNumber.textContent =
                number;


            /* -----------------------------------------
               PROGRESS
               ----------------------------------------- */

            const percentage =
                ((index + 1) /
                    slides.length) * 100;


            progress.style.width =
                percentage + '%';


            /* -----------------------------------------
               LINK
               ----------------------------------------- */

            const poemLink =
                slide.dataset.link || '';


            if (poemLink.trim() !== '') {

                link.href =
                    poemLink;

                link.style.display =
                    'inline-flex';

            } else {

                link.style.display =
                    'none';

            }


            /* -----------------------------------------
               SCROLL
               ----------------------------------------- */

            if (scroll) {

                slide.scrollIntoView({

                    behavior: 'smooth',

                    block: 'nearest',

                    inline: 'center'

                });

            }

        }


        /* =================================================
           CLICK SLIDE
           ================================================= */

        slides.forEach(
            (slide, index) => {

                slide.addEventListener(
                    'click',
                    function () {

                        updatePoem(index);

                    }
                );

            }
        );


        /* =================================================
           PREVIOUS
           ================================================= */

        if (prevButton) {

            prevButton.addEventListener(
                'click',
                function () {

                    updatePoem(
                        currentIndex - 1
                    );

                }
            );

        }


        /* =================================================
           NEXT
           ================================================= */

        if (nextButton) {

            nextButton.addEventListener(
                'click',
                function () {

                    updatePoem(
                        currentIndex + 1
                    );

                }
            );

        }


        /* =================================================
           SWIPE / SCROLL
           ================================================= */

        let scrollTimer;


        track.addEventListener(
            'scroll',
            function () {

                clearTimeout(
                    scrollTimer
                );


                scrollTimer =
                    setTimeout(
                        function () {

                            const center =
                                track.scrollLeft +
                                (
                                    track.offsetWidth /
                                    2
                                );


                            let closestIndex =
                                0;


                            let closestDistance =
                                Infinity;


                            slides.forEach(
                                (slide, index) => {

                                    const slideCenter =
                                        slide.offsetLeft +
                                        (
                                            slide.offsetWidth /
                                            2
                                        );


                                    const distance =
                                        Math.abs(
                                            center -
                                            slideCenter
                                        );


                                    if (
                                        distance <
                                        closestDistance
                                    ) {

                                        closestDistance =
                                            distance;

                                        closestIndex =
                                            index;

                                    }

                                }
                            );


                            if (
                                closestIndex !==
                                currentIndex
                            ) {

                                updatePoem(
                                    closestIndex,
                                    false
                                );

                            }

                        },
                        120
                    );

            },
            {
                passive: true
            }
        );


        /* =================================================
           KEYBOARD
           ================================================= */

        document.addEventListener(
            'keydown',
            function (event) {


                if (
                    event.key ===
                    'ArrowLeft'
                ) {

                    updatePoem(
                        currentIndex + 1
                    );

                }


                if (
                    event.key ===
                    'ArrowRight'
                ) {

                    updatePoem(
                        currentIndex - 1
                    );

                }

            }
        );


        /* =================================================
           INITIAL
           ================================================= */

        updatePoem(
            0,
            false
        );

    }



    /* =====================================================
       ALL POEMS MODAL
       ===================================================== */

    const modal =
        document.getElementById(
            'allPoemsModal'
        );


    const openModal =
        document.getElementById(
            'openAllPoems'
        );


    const closeModal =
        document.getElementById(
            'closeAllPoems'
        );


    const backdrop =
        modal
            ? modal.querySelector(
                '.modal-backdrop'
            )
            : null;


    if (
        modal &&
        openModal &&
        closeModal
    ) {


        /* -----------------------------------------------
           OPEN
           ----------------------------------------------- */

        function openPoemsModal() {

            modal.classList.add(
                'open'
            );

            modal.setAttribute(
                'aria-hidden',
                'false'
            );

            document.body.classList.add(
                'poems-modal-open'
            );

        }


        /* -----------------------------------------------
           CLOSE
           ----------------------------------------------- */

        function closePoemsModal() {

            modal.classList.remove(
                'open'
            );

            modal.setAttribute(
                'aria-hidden',
                'true'
            );

            document.body.classList.remove(
                'poems-modal-open'
            );

        }


        /* -----------------------------------------------
           OPEN BUTTON
           ----------------------------------------------- */

        openModal.addEventListener(
            'click',
            openPoemsModal
        );


        /* -----------------------------------------------
           CLOSE BUTTON
           ----------------------------------------------- */

        closeModal.addEventListener(
            'click',
            closePoemsModal
        );


        /* -----------------------------------------------
           BACKDROP
           ----------------------------------------------- */

        if (backdrop) {

            backdrop.addEventListener(
                'click',
                closePoemsModal
            );

        }


        /* -----------------------------------------------
           ESC KEY
           ----------------------------------------------- */

        document.addEventListener(
            'keydown',
            function (event) {

                if (
                    event.key === 'Escape' &&
                    modal.classList.contains('open')
                ) {

                    closePoemsModal();

                }

            }
        );

    }

});

</script>