
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />

<style>
.cv-card {
    background: linear-gradient(135deg, rgba(244, 168, 53, 0.1), rgba(255, 241, 219, 0.05));
    border-radius: 20px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    margin-bottom: 30px;
    transition: all 0.3s ease;
}

.cv-slider {
    width: 100%;
    background: linear-gradient(135deg, #fff, #fdf7f1);
    padding: 0;
    border-radius: 20px;
    overflow: hidden;
    margin-bottom: 15px;
}


.cv-image-wrapper {
    width: 100%;
    height: 620px;
    background: #fff;
    border: 2px solid rgba(245, 166, 35, 0.35);
    border-radius: 20px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    display: block;
}

.cv-image-wrapper img {

    width: 100%;
    height: 100%;
    object-fit: contain;
    object-position: top center;
    aspect-ratio: 3 / 4;
    border-radius: 20px;
    transition: transform 0.4s ease, box-shadow 0.4s ease;
}

.cv-image-wrapper img:hover {
    transform: scale(1.03);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
}

.swiper-button-next,
.swiper-button-prev {
    color: #f5a623 !important;
}

.swiper-slide {


    width: 100% !important;
    flex-shrink: 0;
}

.cv-info .cv-warning {
    background-color: #f4a835;
    border-radius: 14px;
    padding: 12px 18px;
    margin: 15px 10px;
    text-align: center !important;
}

.cv-warning p {
    color: #FFF !important;
    font-weight: bold;
    font-size: 15px;
    margin: 0;
    line-height: 1.7;
    text-align:center
}

.cv-info {
    padding: 20px;
}

.cv-info ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.cv-info li {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    border-bottom: 1px dashed #eee;
    padding-bottom: 8px;
}

.cv-info h6 {
    font-weight: bold;
    color: #6d6e71;
    margin: 0;
    font-size: 15px;
}

.cv-info p {
    margin: 0;
    color: #444;
    font-size: 15px;
    text-align: left;
    font-weight:bold
}

.cv-action {
    text-align: center;
    padding: 15px 20px;
    border-top: 1px solid #eee;
}

.cv-action a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    background: #f5a623;
    color: white;
    padding: 10px 22px;
    border-radius: 12px;
    font-weight: bold;
    font-size: 15px;
    transition: background 0.3s ease;
    text-decoration: none;
}

.cv-action a:hover {
    background: #d48b1c;
}

.cv-action a i {
    font-size: 16px;
}

@media (max-width: 768px) {
    .cv-image-wrapper {
        height: 320px;
    }
}

.cv-card {
    flex-direction: row;
    align-items: stretch;
    gap: 20px;
    width: 100% !important;
    max-width: 100% !important;
    padding: 0 !important;
    box-sizing: border-box !important;

}

.workers-list > .row,
.workers-list > [class*="col-"],
.workers-list > div {
    width: 100% !important;
    margin: 0 !important;
    padding: 0 !important;
}

.cv-slider {
    width: 45%;
    margin-bottom: 0;
}

.cv-info {
    width: 55%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.cv-warning {
    margin: 0 0 15px 0;
}

.cv-action {
    text-align: right;
    padding-top: 0;
    padding-bottom: 0;
    border-top: none;
    margin-top: auto;
}

@media (max-width: 768px) {

    .cv-slider, .cv-info {
        width: 100%;
    }

    .cv-warning {
        margin: 15px 0;
    }

    .cv-action {
        text-align: center;
        margin-top: 20px;
    }

    .cv-card {
        flex-direction: column;
        width: 100% !important;
        margin-left: 0 !important;
    }

    .cv-slider,
    .cv-info,
    .cv-action{
        width: 100%;
    }

}
.cv-card {
    display: flex;
    flex-direction: row;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(14px);
    border: 1px solid rgba(255, 255, 255, 0.12);
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
    margin-bottom: 30px;
    transition: transform 0.3s ease;
    gap: 20px;
    padding: 20px;
}

.cv-card:hover {
    transform: translateY(-5px);
}

.cv-slider {
    width: 40%;
    border-radius: 18px;
    overflow: hidden;
    background: #fff;
}

.cv-image-wrapper {
    height: 100%;
    background: #fff;
    border-radius: 18px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
    border: 2px solid #f4a83533;
}

.cv-image-wrapper img {
    width: 100%;
    height: auto;
    object-fit: contain;
    aspect-ratio: 3 / 4;
    border-radius: 12px;
    transition: 0.3s ease;
}

.cv-image-wrapper img:hover {
    transform: scale(1.02);
}

.cv-info {
    width: 60%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.cv-warning {
    background: #f4a835;
    color: white;
    border-radius: 12px;
    padding: 12px;
    margin-bottom: 20px;
    font-weight: bold;
    text-align: center;
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
    margin-bottom: 10px;
    padding-bottom: 6px;
    border-bottom: 1px dashed #ddd;
}

.cv-info h6 {
    font-size: 15px;
    font-weight: bold;
    color: #333;
    margin: 0;
}

.cv-info p {
    margin: 0;
    font-size: 15px;
    font-weight: bold;
    color: #666;
    text-align: left;
}

.cv-action {
    text-align: right;
    margin-top: 20px;
}

.cv-action a {
    background: #f4a835;
    color: white;
    padding: 10px 22px;
    font-size: 15px;
    border-radius: 10px;
    font-weight: bold;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
    transition: 0.3s ease;
}

.cv-action a:hover {
    background: #d28a25;
}

.cv-action i {
    font-size: 16px;
}


@media (max-width: 768px) {
    .cv-card {
        flex-direction: column;
        padding: 15px;
    }

    .cv-slider,
    .cv-info {
        width: 100%;
    }

    .cv-action {
        text-align: center;
        margin-top: 20px;
    }
}

/************** New Image Design *************/
/* ===== CV IMAGE – PREMIUM STYLE ===== */
.cv-slider {
    width: 40%;
    border-radius: 22px;
    overflow: hidden;
    background: #f9f9f9;
    position: relative;
}

.cv-image-wrapper {
    width: 100%;
    height: 620px;
    position: relative;
    overflow: hidden;
    border-radius: 22px;
    background: #eee;
}
.cv-image-wrapper::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to bottom,
        rgba(0,0,0,0.05),
        rgba(0,0,0,0.15)
    );
    z-index: 1;
    pointer-events: none;
}

.cv-image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: top center;
    transition: transform 0.6s ease;
    border-radius: 22px;
}
.cv-image-wrapper:hover img {
    transform: scale(1.06);
}
.swiper-button-next,
.swiper-button-prev {
    color: #fff !important;
    background: rgba(0,0,0,0.35);
    width: 42px;
    height: 42px;
    border-radius: 50%;
    backdrop-filter: blur(6px);
    transition: 0.3s ease;
}

.swiper-button-next:hover,
.swiper-button-prev:hover {
    background: rgba(0,0,0,0.55);
}
@media (max-width: 768px) {
    .cv-slider {
        width: 100%;
    }

    .cv-image-wrapper {
        height: 360px;
        border-radius: 18px;
    }

    .cv-image-wrapper img {
        border-radius: 18px;
    }
}

.cv-image-wrapper {
    width: 100%;
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid rgba(244, 168, 53, 0.25);
}

/*.cv-image-wrapper img {
    width: 100%;
    height: auto;
    display: block;
    object-fit: contain;
    object-position: center;
    transition: transform 0.35s ease;
}

.cv-image-wrapper img:hover {
    transform: scale(1.01);
}*/
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
