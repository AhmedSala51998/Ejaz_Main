<link rel="stylesheet" href="{{asset('frontend/css/our_services_style.css')}}" />
@if (count($ourServices)>0)
<section class="recruitment-services py-5" id="popular_service" style="background-color: #FAFAFA;">
    <div class="container">

        <div class="text-center mb-5" data-aos="fade-up">
            <h1 class="section-title">خدمات الاستقدام</h1>
            <p class="section-subtitle">تعرف على الخدمات التي نقدمها للمجتمع</p>
        </div>

        <div class="row gy-4">
            @foreach($ourServices as $service)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="{{ route('all-workers') }}" class="text-decoration-none">
                    <div class="service-card h-100 text-center p-4 rounded-4 bg-white shadow-sm">
                        <div class="mb-3">

                             <img src="{{ get_file($service->image) }}" alt="{{ $service->title }}" class="img-fluid" loading="lazy" width="60" height="60" style="height: 60px;">


                        </div>
                        <h6 class="fw-bold mb-2">{{ $service->title }}</h6>
                        <p class="text-muted">{{ $service->desc }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@else
<section class="recruitment-services py-5" id="popular_service" style="background-color: #FAFAFA;">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 class="section-title">خدمات الاستقدام</h1>
            <p class="section-subtitle">تعرف على الخدمات التي نقدمها للمجتمع</p>
        </div>
        <div class="row gy-4">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="service-card h-100 text-center p-4 rounded-4 bg-white shadow-sm">
                    <img src="{{asset('frontend/img/icons/icon1.svg')}}" style="height: 60px;" alt="">
                    <h6 class="fw-bold mt-3">طلب استقدام</h6>
                    <p class="text-muted">دفع رسوم الاستقدام عبر التعاقد في برنامج مساند</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="service-card h-100 text-center p-4 rounded-4 bg-white shadow-sm">
                    <img src="{{asset('frontend/img/icons/icon2.svg')}}" style="height: 60px;" alt="">
                    <h6 class="fw-bold mt-3">اختيار العمالة</h6>
                    <p class="text-muted">اختيار السيرة الذاتية للعمالة المنزلية عبر مساند</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="service-card h-100 text-center p-4 rounded-4 bg-white shadow-sm">
                    <img src="{{asset('frontend/img/icons/icon3.svg')}}" style="height: 60px;" alt="">
                    <h6 class="fw-bold mt-3">رعاية الأطفال والمسنين</h6>
                    <p class="text-muted">توفير جليسات الأطفال ورعاية كبار السن</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="service-card h-100 text-center p-4 rounded-4 bg-white shadow-sm">
                    <img src="{{asset('frontend/img/icons/icon4.svg')}}" style="height: 60px;" alt="">
                    <h6 class="fw-bold mt-3">خدمات الضيافة</h6>
                    <p class="text-muted">توفير موظفين لخدمة الضيوف في المناسبات</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
