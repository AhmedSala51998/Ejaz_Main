
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />

<style>
/* ===============================
   CV CARD – CLEAN VERSION
================================ */

.cv-card {
    display: flex;
    flex-direction: row;
    gap: 20px;
    padding: 20px;
    margin-bottom: 30px;

    background: linear-gradient(135deg, rgba(244,168,53,.1), rgba(255,241,219,.05));
    border-radius: 24px;
    box-shadow: 0 8px 30px rgba(0,0,0,.08);
    overflow: hidden;

    transition: transform .3s ease;
}

.cv-card:hover {
    transform: translateY(-5px);
}

/* ===============================
   SLIDER
================================ */

.cv-slider {
    width: 40%;
    background: #fff;
    border-radius: 22px;
    overflow: hidden;
    position: relative;
}

/* ===============================
   IMAGE WRAPPER
================================ */

.cv-image-wrapper {
    width: 100%;
    height: 620px;
    position: relative;

    background: #fff;
    border-radius: 22px;
    overflow: hidden;
    border: 2px solid rgba(244,168,53,.25);
}

/* subtle overlay */
.cv-image-wrapper::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to bottom,
        rgba(0,0,0,.02),
        rgba(0,0,0,.08)
    );
    pointer-events: none;
}

/* IMAGE */
.cv-image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    object-position: top center;
    display: block;

    border-radius: 22px;
    transition: transform .5s ease;
}

.cv-image-wrapper:hover img {
    transform: scale(1.05);
}

/* ===============================
   SWIPER CONTROLS
================================ */

.swiper-slide {
    width: 100% !important;
    flex-shrink: 0;
}

.swiper-button-next,
.swiper-button-prev {
    color: #fff !important;
    background: rgba(0,0,0,.35);
    width: 42px;
    height: 42px;
    border-radius: 50%;
    backdrop-filter: blur(6px);
    transition: .3s;
}

.swiper-button-next:hover,
.swiper-button-prev:hover {
    background: rgba(0,0,0,.55);
}

/* ===============================
   INFO SECTION
================================ */

.cv-info {
    width: 60%;
    display: flex;
    flex-direction: column;
}

.cv-warning {
    background: #f4a835;
    color: #fff;
    border-radius: 12px;
    padding: 12px;
    margin-bottom: 20px;
    text-align: center;
    font-weight: bold;
    font-size: 15px;
}

.cv-info ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.cv-info li {
    display: flex;
    justify-content: space-between;
    padding-bottom: 6px;
    margin-bottom: 10px;
    border-bottom: 1px dashed #ddd;
}

.cv-info h6 {
    margin: 0;
    font-size: 15px;
    font-weight: bold;
    color: #333;
}

.cv-info p {
    margin: 0;
    font-size: 15px;
    font-weight: bold;
    color: #666;
    text-align: left;
}

/* ===============================
   ACTION
================================ */

.cv-action {
    margin-top: auto;
    text-align: right;
}

.cv-action a {
    background: #f4a835;
    color: #fff;
    padding: 10px 22px;
    border-radius: 10px;
    font-size: 15px;
    font-weight: bold;

    display: inline-flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;

    transition: .3s;
}

.cv-action a:hover {
    background: #d28a25;
}

/* ===============================
   RESPONSIVE
================================ */

@media (max-width: 768px) {
    .cv-card {
        flex-direction: column;
        padding: 15px;
    }

    .cv-slider,
    .cv-info {
        width: 100%;
    }

    .cv-image-wrapper {
        height: 360px;
        border-radius: 18px;
    }

    .cv-image-wrapper img {
        border-radius: 18px;
    }

    .cv-action {
        text-align: center;
        margin-top: 20px;
    }
}
</style>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />

<div class="cv-card">


    <div class="cv-slider">
        <div class="swiper workerCvSlider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a data-fancybox="users{{$cv->id}}-CV" href="{{ get_file($cv->cv_file) }}">
                        <div class="cv-image-wrapper">

                                <img src="{{ get_file($cv->cv_file) }}" alt="CV Image">

                        </div>
                    </a>
                </div>
                @foreach($cv->images as $image)
                <div class="swiper-slide">
                    <a data-fancybox="users{{$cv->id}}-CV" href="{{ get_file($image->image) }}">
                        <div class="cv-image-wrapper">

                                <img src="{{ get_file($image->image) }}" alt="CV Image">

                        </div>
                    </a>
                </div>

                @endforeach
            </div>
            <div class="swiper-button-next workerCvSliderNext"></div>
            <div class="swiper-button-prev workerCvSliderPrev"></div>
        </div>
    </div>


    <div class="cv-info">

        <div class="cv-warning">
            <p style="text-align:center !important">لضمان حقك، لايتم سداد الرسوم بعد الحجز الا عن طريق منصة مساند</p>
        </div>
        <ul>
            <li><h6>الاسم:</h6><p>{{$cv->cv_name}}</p></li>
            <li><h6>الجنسية:</h6><p>{{$cv->nationalitie->title ?? '-'}}</p></li>
            <li><h6>المهنة:</h6><p>{{$cv->job->title ?? '-'}}</p></li>
            <li><h6>الديانة:</h6><p>{{$cv->religion->title ?? '-'}}</p></li>
            <li><h6>رقم الجواز:</h6><p>{{$cv->passport_number ?? '-'}}</p></li>
            <li><h6>العمر:</h6><p>{{$cv->age ?? '-'}}</p></li>
            <li><h6>الحالة الاجتماعية:</h6><p>{{$cv->social_type->title ?? '-'}}</p></li>

             @if(!isset($rental))
                <li><h6>الراتب:</h6><p>{{$cv->salary ?? '-'}} ريال</p></li>
            @endif

            @if(isset($rental))
                <li><h6>تكلفة الإيجار:</h6><p>{{$cv->rentalprice ?? '-'}} ريال</p></li>
            @elseif(isset($transfer))
                <li><h6>سبب النقل:</h6><p>{{$cv->reasonService ?? '-'}}</p></li>
                <li><h6>مدة العمل عند الكفيل السابق:</h6><p>{{$cv->periodService ?? '-'}}</p></li>
                <li><h6>سعر نقل الخدمات:</h6><p>{{$cv->transferprice ?? '-'}} ريال</p></li>
            @else
                <li><h6>تكلفة الاستقدام:</h6><p>{{$cv->nationalitie->price ?? '-'}} ريال</p></li>
                <li><h6>الخبرة العملية:</h6>
                    <p>
                        @if($cv->type_of_experience=='new')
                            قادم جديد
                        @elseif($cv->type_of_experience=='with_experience')
                            لديه خبرة سابقة
                        @else
                            -
                        @endif
                    </p>
                </li>
            @endif
        </ul>

        <div class="cv-action">
            @php
                $type = $cv->type;
            @endphp

            @if($type == 'transport')
                <a href="https://api.whatsapp.com/send?phone={{ $settings->whatsappNumber }}">
                    <i class="fa-brands fa-whatsapp"></i>
                    ارسال طلب نقل
                </a>
            @elseif($type == 'rental')
                <a href="https://api.whatsapp.com/send?phone={{ $settings->whatsappNumber }}">
                    <i class="fa-brands fa-whatsapp"></i>
                    ارسال طلب تأجير
                </a>
            @else
                @auth
                    <a href="{{ route('frontend.show.worker', $cv->id) }}">
                        <i class="fa-solid fa-file-circle-check"></i>
                        حجز السيرة الذاتية
                    </a>
                @else
                    <a href="{{ route('register', $cv->id) }}">
                        <i class="fa-solid fa-file-circle-check"></i>
                        حجز السيرة الذاتية
                    </a>
                @endauth
            @endif
        </div>
    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>

<script>
    var workerCvSlider = new Swiper(".workerCvSlider", {
        spaceBetween: 0,
        centeredSlides: true,
        speed: 1000,
        navigation: {
            nextEl: ".workerCvSliderNext",
            prevEl: ".workerCvSliderPrev",
        },
    });
</script>
