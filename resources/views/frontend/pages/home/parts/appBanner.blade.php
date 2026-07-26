<div class="container">
    <section class="app-download-section">

        <div class="row align-items-center">

            {{-- Phones --}}
            <div class="col-lg-6 order-lg-2">

                <div class="phones-wrapper">

                    <img
                        src="{{asset('frontend/img/mobile-app.webp')}}"
                        class="phone-img main-phone"
                        alt="تطبيق إيجاز"
                        loading="lazy">

                    <img
                        src="{{asset('frontend/img/mobile-app2.webp')}}"
                        class="phone-img second-phone"
                        alt="تطبيق إيجاز"
                        loading="lazy">

                </div>

            </div>


            {{-- Content --}}
            <div class="col-lg-6 order-lg-1">

                <div class="download-content">

                    <span class="app-download-label">
                        تطبيق إيجاز
                    </span>

                    <h2>
                        حمّل تطبيق شركة إيجاز
                    </h2>

                    <p>
                        ابحث، قارن واحجز خدمات الاستقدام بسهولة مع أفضل الحلول
                        المتاحة، وقدّم طلبك وتابع خطواته أولاً بأول من جوالك.
                    </p>


                    {{-- Download Area --}}
                    <div class="app-download-actions">


                        {{-- QR --}}
                        <div class="app-qr-card">

                            <div class="app-qr-image">

                                <img
                                    src="{{asset('frontend/img/ejaz-app-qr_full.png')}}"
                                    alt="رمز QR لتحميل تطبيق إيجاز"
                                    loading="lazy"
                                    decoding="async">

                            </div>

                            <div class="app-qr-info">

                                <strong>
                                    امسح رمز QR
                                </strong>

                                <span>
                                    لتحميل تطبيق إيجاز
                                </span>

                            </div>

                        </div>


                        {{-- Stores --}}
                        <div class="store-buttons">

                            <a
                                href="https://apps.apple.com/eg/app/ejaz-%D8%A7%D9%8A%D8%AC%D8%A7%D8%B2/id6761459722"
                                class="store-btn"
                                target="_blank"
                                rel="noopener noreferrer">

                                <div class="store-btn-text">
                                    <small>حمّل من</small>
                                    <strong>App Store</strong>
                                </div>

                                <img
                                    src="https://cdn-icons-png.flaticon.com/512/888/888841.png"
                                    alt="App Store"
                                    loading="lazy">

                            </a>


                            <a
                                href="https://play.google.com/store/apps/details?id=com.app.ejaz"
                                class="store-btn"
                                target="_blank"
                                rel="noopener noreferrer">

                                <div class="store-btn-text">
                                    <small>حمّل من</small>
                                    <strong>Google Play</strong>
                                </div>

                                <img
                                    src="https://cdn-icons-png.flaticon.com/512/888/888857.png"
                                    alt="Google Play"
                                    loading="lazy">

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
</div>

<style>
/* =========================================================
   EJAZ APP DOWNLOAD SECTION
========================================================= */

.app-download-section {
    position: relative;

    margin: 30px 0;

    padding: 35px 55px;

    background:
        linear-gradient(
            135deg,
            rgba(216, 152, 53, 0.16),
            rgba(216, 152, 53, 0.06)
        );

    border: 1px solid rgba(216, 152, 53, 0.18);

    border-radius: 28px;

    overflow: hidden;
}


/* Decorative glow */

.app-download-section::before {
    content: "";

    position: absolute;

    width: 360px;
    height: 360px;

    top: -180px;
    left: -150px;

    background: rgba(216, 152, 53, 0.16);

    border-radius: 50%;

    filter: blur(45px);

    pointer-events: none;
}


/* =========================================================
   CONTENT
========================================================= */

.download-content {
    position: relative;

    z-index: 2;

    text-align: right;

    padding: 25px 0;
}


.app-download-label {
    display: inline-flex;

    align-items: center;

    gap: 7px;

    margin-bottom: 10px;

    color: #d89835;

    font-size: 13px;

    font-weight: 800;
}


.app-download-label::before {
    content: "";

    width: 7px;
    height: 7px;

    background: #d89835;

    border-radius: 50%;
}


.download-content h2 {
    margin: 0 0 18px;

    color: #222;

    font-size: 42px;

    line-height: 1.25;

    font-weight: 800;
}


.download-content p {
    max-width: 600px;

    margin: 0;

    color: #555;

    font-size: 17px;

    line-height: 1.9;
}


/* =========================================================
   DOWNLOAD ACTIONS
========================================================= */

.app-download-actions {

    display: flex;

    align-items: center;

    gap: 22px;

    margin-top: 32px;
}


/* =========================================================
   QR CARD
========================================================= */

.app-qr-card {

    display: flex;

    align-items: center;

    gap: 13px;

    padding: 9px 13px;

    min-height: 112px;

    background: rgba(255, 255, 255, 0.92);

    border: 1px solid rgba(216, 152, 53, 0.18);

    border-radius: 17px;

    box-shadow:
        0 10px 30px rgba(0, 0, 0, 0.07);

    transition:
        transform .25s ease,
        box-shadow .25s ease;
}


.app-qr-card:hover {

    transform: translateY(-4px);

    box-shadow:
        0 16px 35px rgba(0, 0, 0, 0.10);
}


/* QR image container */

.app-qr-image {

    width: 92px;
    height: 92px;

    flex: 0 0 92px;

    padding: 5px;

    background: #fff;

    border-radius: 10px;

    display: flex;

    align-items: center;

    justify-content: center;
}


.app-qr-image img {

    width: 100%;
    height: 100%;

    display: block;

    object-fit: contain;
}


/* QR text */

.app-qr-info {

    display: flex;

    flex-direction: column;

    text-align: right;

    min-width: 100px;
}


.app-qr-info strong {

    color: #222;

    font-size: 14px;

    font-weight: 800;

    line-height: 1.6;
}


.app-qr-info span {

    color: #777;

    font-size: 10px;

    line-height: 1.6;

    margin-top: 2px;
}


/* =========================================================
   STORE BUTTONS
========================================================= */

.store-buttons {

    display: flex;

    flex-direction: column;

    gap: 10px;

    margin: 0;
}


.store-btn {

    width: 185px;
    height: 51px;

    padding: 7px 13px;

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 10px;

    background: #fff;

    border: 1px solid rgba(0, 0, 0, 0.06);

    border-radius: 11px;

    text-decoration: none;

    box-shadow:
        0 8px 20px rgba(0, 0, 0, 0.06);

    transition:
        transform .25s ease,
        box-shadow .25s ease;
}


.store-btn:hover {

    transform: translateY(-3px);

    box-shadow:
        0 12px 25px rgba(0, 0, 0, 0.10);
}


.store-btn-text {

    display: flex;

    flex-direction: column;

    text-align: right;

    flex: 1;
}


.store-btn-text small {

    color: #888;

    font-size: 8px;

    line-height: 1.3;
}


.store-btn-text strong {

    color: #222;

    font-size: 14px;

    font-weight: 800;

    line-height: 1.4;
}


.store-btn img {

    width: 27px;
    height: 27px;

    object-fit: contain;
}


/* =========================================================
   PHONES
========================================================= */

.phones-wrapper {

    position: relative;

    min-height: 450px;

    z-index: 2;
}


.phone-img {

    max-width: 245px;

    border-radius: 32px;

    box-shadow:
        0 25px 50px rgba(0, 0, 0, 0.17);
}


.main-phone {

    position: absolute;

    left: 30px;

    top: 15px;

    z-index: 2;
}


.second-phone {

    position: absolute;

    left: 205px;

    top: 65px;

    z-index: 1;
}


/* =========================================================
   TABLET
========================================================= */

@media (max-width: 1199.98px) {

    .app-download-section {

        padding: 35px 30px;
    }


    .download-content h2 {

        font-size: 35px;
    }


    .download-content p {

        font-size: 15px;
    }


    .app-download-actions {

        gap: 14px;
    }


    .app-qr-card {

        padding: 8px;

        gap: 8px;
    }


    .app-qr-image {

        width: 78px;
        height: 78px;

        flex-basis: 78px;
    }


    .app-qr-info {

        min-width: 80px;
    }


    .store-btn {

        width: 165px;
    }


    .phone-img {

        max-width: 210px;
    }


    .second-phone {

        left: 170px;
    }

}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 991.98px) {

    .app-download-section {

        padding: 35px 20px 30px;

        margin: 20px 0;

        border-radius: 22px;
    }


    /* phones */

    .phones-wrapper {

        min-height: 300px;

        width: 100%;

        margin-bottom: 15px;
    }


    .phone-img {

        max-width: 165px;

        border-radius: 25px;
    }


    .main-phone {

        left: 50%;

        top: 0;

        transform: translateX(-75%);
    }


    .second-phone {

        left: 50%;

        top: 35px;

        transform: translateX(5%);
    }


    /* content */

    .download-content {

        text-align: center;

        padding: 10px 0 15px;
    }


    .app-download-label {

        justify-content: center;

        font-size: 12px;
    }


    .download-content h2 {

        font-size: 30px;

        line-height: 1.4;

        margin-bottom: 12px;
    }


    .download-content p {

        max-width: 600px;

        margin: auto;

        font-size: 14px;

        line-height: 1.9;
    }


    /* actions */

    .app-download-actions {

        flex-direction: column;

        align-items: center;

        gap: 18px;

        width: 100%;

        margin-top: 25px;
    }


    /* QR */

    .app-qr-card {

        width: 100%;

        max-width: 340px;

        justify-content: center;

        padding: 10px 14px;
    }


    .app-qr-image {

        width: 90px;
        height: 90px;

        flex-basis: 90px;
    }


    .app-qr-info {

        min-width: 120px;

        text-align: right;
    }


    /* stores */

    .store-buttons {

        width: 100%;

        max-width: 340px;

        flex-direction: row;

        justify-content: center;

        gap: 8px;
    }


    .store-btn {

        width: calc(50% - 4px);

        height: 52px;

        padding: 7px 10px;
    }


    .store-btn-text small {

        font-size: 7px;
    }


    .store-btn-text strong {

        font-size: 12px;
    }


    .store-btn img {

        width: 24px;
        height: 24px;
    }

}


/* =========================================================
   SMALL MOBILE
========================================================= */

@media (max-width: 575.98px) {

    .app-download-section {

        padding: 25px 14px;

        border-radius: 18px;
    }


    .phones-wrapper {

        min-height: 260px;
    }


    .phone-img {

        max-width: 145px;

        border-radius: 22px;
    }


    .main-phone {

        transform: translateX(-72%);
    }


    .second-phone {

        transform: translateX(0);
    }


    .download-content h2 {

        font-size: 24px;
    }


    .download-content p {

        font-size: 12px;

        line-height: 1.8;
    }


    .app-download-actions {

        margin-top: 22px;
    }


    /* QR becomes a premium horizontal card */

    .app-qr-card {

        max-width: 100%;

        min-height: 105px;

        padding: 8px 10px;

        border-radius: 14px;
    }


    .app-qr-image {

        width: 84px;
        height: 84px;

        flex-basis: 84px;

        padding: 4px;
    }


    .app-qr-info strong {

        font-size: 13px;
    }


    .app-qr-info span {

        font-size: 9px;
    }


    /* stores stack */

    .store-buttons {

        flex-direction: column;

        max-width: 280px;

        gap: 8px;
    }


    .store-btn {

        width: 100%;

        height: 50px;
    }


    .store-btn-text {

        text-align: center;
    }


    .store-btn-text strong {

        font-size: 13px;
    }

}
</style>
