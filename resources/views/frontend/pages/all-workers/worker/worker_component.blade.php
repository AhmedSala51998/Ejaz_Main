
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />

<style>
/* ========== CV CARD ========== */
.cv-card{
    display:flex;
    flex-direction:row;
    gap:20px;
    padding:20px;
    margin-bottom:30px;
    background:linear-gradient(135deg, rgba(244,168,53,.1), rgba(255,241,219,.05));
    backdrop-filter:blur(14px);
    border-radius:24px;
    border:1px solid rgba(255,255,255,.12);
    box-shadow:0 8px 30px rgba(0,0,0,.08);
    transition:.3s ease;
}
.cv-card:hover{transform:translateY(-5px)}

/* ========== SLIDER ========== */
.cv-slider{
    width:40%;
    background:#fff;
    border-radius:22px;
    overflow:hidden;
}

.cv-image-wrapper{
    width:100%;
    aspect-ratio:3 / 4;
    background:#eee;
    border-radius:22px;
    overflow:hidden;
    border:1px solid rgba(244,168,53,.25);
    position:relative;
}

.cv-image-wrapper img{
    width:100%;
    height:100%;
    object-fit:contain;
    object-position:center;
    display:block;
    transition:transform .4s ease;
}
.cv-image-wrapper:hover img{transform:scale(1.04)}

/* ========== INFO ========== */
.cv-info{
    width:60%;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
}
.cv-warning{
    background:#f4a835;
    color:#fff;
    border-radius:12px;
    padding:12px;
    margin-bottom:20px;
    font-weight:bold;
    text-align:center;
}
.cv-info ul{list-style:none;padding:0;margin:0}
.cv-info li{
    display:flex;
    justify-content:space-between;
    padding-bottom:6px;
    margin-bottom:10px;
    border-bottom:1px dashed #ddd;
}
.cv-info h6{
    margin:0;
    font-size:15px;
    font-weight:bold;
    color:#333;
}
.cv-info p{
    margin:0;
    font-size:15px;
    font-weight:bold;
    color:#666;
    text-align:left;
}

/* ========== ACTION ========== */
.cv-action{
    text-align:right;
    margin-top:20px;
}
.cv-action a{
    display:inline-flex;
    align-items:center;
    gap:8px;
    background:#f4a835;
    color:#fff;
    padding:10px 22px;
    font-size:15px;
    border-radius:10px;
    font-weight:bold;
    text-decoration:none;
    transition:.3s;
}
.cv-action a:hover{background:#d28a25}

/* ========== SWIPER ========== */
.swiper,
.swiper-wrapper,
.swiper-slide{height:100%}

.swiper-button-next,
.swiper-button-prev{
    color:#fff!important;
    background:rgba(0,0,0,.35);
    width:42px;
    height:42px;
    border-radius:50%;
    backdrop-filter:blur(6px);
}

/* ========== MOBILE ========== */
@media(max-width:768px){
    .cv-card{flex-direction:column;padding:15px}
    .cv-slider,.cv-info{width:100%}
    .cv-action{text-align:center}
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
document.querySelectorAll('.workerCvSlider').forEach(slider => {
    const slides = slider.querySelectorAll('.swiper-slide');

    if (slides.length <= 1) {
        slider.classList.remove('swiper');
        slider.querySelectorAll('.swiper-wrapper,.swiper-button-next,.swiper-button-prev')
              .forEach(el => el && el.remove());
    } else {
        new Swiper(slider, {
            speed:1000,
            navigation:{
                nextEl:slider.querySelector('.workerCvSliderNext'),
                prevEl:slider.querySelector('.workerCvSliderPrev'),
            }
        });
    }
});
</script>
