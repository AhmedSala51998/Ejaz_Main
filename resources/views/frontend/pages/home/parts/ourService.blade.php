<style>
    :root {
        --orange-main: #D89835;
        --gray-dark: #5F5F5F;
        --text-main: #212121;
    }

    .service-card {
        border: 1px solid #eee;
        transition: all 0.3s ease;
        position: relative;
    }

    .service-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background-color: var(--orange-main);
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
    }

    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.07);
        border-color: var(--orange-main);
    }

    .section-title {
        font-size: 2.2rem;
        font-weight: bold;
        color: var(--text-main);
    }

    .section-subtitle {
        font-size: 1rem;
        color: var(--gray-dark);
    }

    .service-card h6 {
        color: var(--orange-main);
    }

    .service-card p {
        color: var(--gray-dark);
    }
</style>

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

                             <img src="{{ get_file($service->image) }}" alt="{{ $service->title }}" class="img-fluid" style="height: 60px;">


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
