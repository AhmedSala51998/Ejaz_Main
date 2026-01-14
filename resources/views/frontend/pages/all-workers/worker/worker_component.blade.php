
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />

<style>
/* ===== CV CARD ===== */
.cv-card {
    display: flex;
    gap: 20px;
    background: #fff;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 8px 30px rgba(0,0,0,.08);
    margin-bottom: 30px;
}

/* ===== SLIDER ===== */
.cv-slider {
    width: 40%;
}

/* ===== IMAGE BOX ===== */
.cv-image-wrapper {
    width: 100%;
    height: 100%;
    aspect-ratio: 3 / 4;
    overflow: hidden;
    border-radius: 20px;
    border: 1px solid rgba(244,168,53,.25);
    background: #f5f5f5;
}

/* ===== IMAGE ===== */
.cv-image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    display: block;
}

/* ===== INFO ===== */
.cv-info {
    width: 60%;
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

/* ===== WARNING ===== */
.cv-warning {
    background: #f4a835;
    color: #fff;
    border-radius: 14px;
    padding: 12px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
}

/* ===== ACTION ===== */
.cv-action {
    text-align: right;
    margin-top: 20px;
}

.cv-action a {
    background: #f4a835;
    color: #fff;
    padding: 10px 22px;
    border-radius: 12px;
    font-weight: bold;
    display: inline-flex;
    gap: 8px;
    text-decoration: none;
}

/* ===== SWIPER ===== */
.swiper,
.swiper-wrapper,
.swiper-slide {
    height: 100%;
}

/* ===== MOBILE ===== */
@media (max-width:768px) {
    .cv-card {
        flex-direction: column;
    }

    .cv-slider,
    .cv-info {
        width: 100%;
    }
}
</style>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
@php
    $imagesCount = 1 + $cv->images->count();
@endphp
<div class="cv-card">


    <div class="cv-slider">

    @if($imagesCount > 1)

        <!-- Swiper -->
        <div class="swiper workerCvSlider">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <a data-fancybox="cv{{$cv->id}}" href="{{ get_file($cv->cv_file) }}">
                        <div class="cv-image-wrapper">
                            <img src="{{ get_file($cv->cv_file) }}">
                        </div>
                    </a>
                </div>

                @foreach($cv->images as $image)
                <div class="swiper-slide">
                    <a data-fancybox="cv{{$cv->id}}" href="{{ get_file($image->image) }}">
                        <div class="cv-image-wrapper">
                            <img src="{{ get_file($image->image) }}">
                        </div>
                    </a>
                </div>
                @endforeach

            </div>

            <div class="swiper-button-next workerCvSliderNext"></div>
            <div class="swiper-button-prev workerCvSliderPrev"></div>
        </div>

    @else

        <!-- Image Only (No Swiper) -->
        <a data-fancybox="cv{{$cv->id}}" href="{{ get_file($cv->cv_file) }}">
            <div class="cv-image-wrapper">
                <img src="{{ get_file($cv->cv_file) }}">
            </div>
        </a>

    @endif

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

@if($imagesCount > 1)
<script>
new Swiper(".workerCvSlider", {
    speed: 800,
    navigation: {
        nextEl: ".workerCvSliderNext",
        prevEl: ".workerCvSliderPrev",
    },
});
</script>
@endif

