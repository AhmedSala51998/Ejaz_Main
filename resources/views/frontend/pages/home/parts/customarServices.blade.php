<link rel="stylesheet" href="{{asset('frontend/css/customer_services_style.css')}}" />
@if (count($admins) > 0)
<section class="customer-service-section py-5" id="Countries">
    <div class="container">

        <div class="text-center mb-5" data-aos="fade-up">
            <h1 class="section-title">خدمة العملاء</h1>
            <p class="section-subtitle">لخدمة عملاء متميزة على مدار الساعة</p>
        </div>

        <div class="row gy-4 justify-content-center"> {{-- Added justify-content-center for better alignment if cards are less than 4 --}}
            @foreach($admins as $admin)
                <div class="col-lg-3 col-md-6 col-sm-10"> {{-- Added col-sm-10 for better mobile spacing --}}
                    <div class="service-card shadow-sm h-100">
                        <div class="icon-container">
                            <img src="{{ asset('frontend/img/customer-service.png') }}"  loading="lazy" width="48" height="48" alt="خدمة العملاء">
                        </div>
                        <h5>{{ $admin->name }}</h5>
                        <p>نخدمكم على مدار <strong>24/7</strong></p>
                        <div class="d-grid gap-2">
                            <a href="https://api.whatsapp.com/send?phone={{ $admin->phone }}" target="_blank" class="btn btn-whatsapp">
                                <i class="fab fa-whatsapp me-1"></i> واتساب
                            </a>
                            <a href="tel:{{ $admin->phone }}" class="btn btn-call">
                                <i class="fa fa-phone me-1"></i> اتصال
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
@else

@endif
