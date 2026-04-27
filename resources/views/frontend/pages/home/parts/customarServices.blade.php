<link rel="stylesheet" href="{{asset('frontend/css/customer_services_style.css')}}" />
@if (count($admins) > 0)
<section class="customer-service-section py-5" id="Countries">
    <div class="container">

        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">خدمة العملاء</h2>
            <p class="section-subtitle">لخدمة عملاء متميزة على مدار الساعة</p>
        </div>

        <div id="servicesCarousel" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">

                @foreach($admins->chunk(4) as $chunk)
                <div class="carousel-item @if($loop->first) active @endif">

                    <div class="row justify-content-center align-items-stretch g-4">

                        @foreach($chunk as $admin)
                            <div class="col-lg-3 col-md-6 col-sm-10">

                                <div class="service-card shadow-sm">

                                    <div class="icon-container">
                                        <img src="{{ asset('frontend/img/customer-service.png') }}" loading="lazy" width="48" height="48">
                                    </div>

                                    <h3>{{ $admin->name }}</h3>

                                    <p>نخدمكم على مدار <strong>24/7</strong></p>

                                    <div class="d-grid gap-2">
                                        <a href="https://api.whatsapp.com/send?phone={{ $admin->phone }}" target="_blank" class="btn btn-whatsapp">
                                            واتساب
                                        </a>

                                        <a href="tel:{{ $admin->phone }}" class="btn btn-call">
                                            اتصال
                                        </a>
                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>
                @endforeach

            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#servicesCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#servicesCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>

        </div>

    </div>
</section>
@else

@endif
