
<link rel="stylesheet" href="{{asset('frontend/css/worker_component_style.css')}}" />
<div class="cv-card">


    <div class="cv-slider">
        <div class="swiper workerCvSlider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a data-fancybox="users{{$cv->id}}-CV" href="{{ get_file($cv->cv_file) }}">
                        <div class="cv-image-wrapper">

                                <img src="{{ get_file($cv->cv_file) }}" width="500" height="400" fetchpriority="high" loading="lazy" decoding="async" alt="CV Image">

                        </div>
                    </a>
                </div>
                @foreach($cv->images as $image)
                <div class="swiper-slide">
                    <a data-fancybox="users{{$cv->id}}-CV" href="{{ get_file($image->image) }}">
                        <div class="cv-image-wrapper">

                                <img src="{{ get_file($image->image) }}" width="500" height="400" loading="lazy" decoding="async" alt="CV Image">

                        </div>
                    </a>
                </div>

                @endforeach
            </div>
        </div>
    </div>


    <div class="cv-info">

        <div class="cv-warning">
            <p style="text-align:center !important;color:#FFF !important">لضمان حقك، لايتم سداد الرسوم بعد الحجز الا عن طريق منصة مساند</p>
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


<script defer src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    Fancybox.bind("[data-fancybox]", {
        Thumbs: false,
        Toolbar: true,
    });
});
</script>
<script>
window.addEventListener("load", () => {
  document.querySelectorAll(".cv-card").forEach(el => {
    el.classList.add("loaded");
  });
});
</script>
