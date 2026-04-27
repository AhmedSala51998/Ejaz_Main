<link rel="stylesheet" href="{{asset('frontend/css/customer_services_style.css')}}" />

@if (count($admins) > 0)

<section class="customer-service-section py-5" id="Countries">
    <div class="container">

        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">خدمة العملاء</h2>
            <p class="section-subtitle">لخدمة عملاء متميزة على مدار الساعة</p>
        </div>

        <div class="swiper servicesSwiper">
            <div class="swiper-wrapper">

                @foreach($admins as $admin)
                <div class="swiper-slide">

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

            <!-- arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

            <!-- pagination -->
            <div class="swiper-pagination mt-4"></div>

        </div>

    </div>
</section>

@endif

<script>
document.addEventListener("DOMContentLoaded", function () {

    new Swiper(".servicesSwiper", {
        loop: true,
        grabCursor: true,
        spaceBetween: 25,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },

        navigation: false,

        pagination: false,

        breakpoints: {
            0: {
                slidesPerView: 1
            },
            576: {
                slidesPerView: 2
            },
            992: {
                slidesPerView: 4
            }
        }
    });

});
</script>
<style>
.carousel-inner {
    overflow: visible;
}
.servicesSwiper .swiper-button-next,
.servicesSwiper .swiper-button-prev,
.servicesSwiper .swiper-pagination{
    display:none !important;
}

.servicesSwiper{
    overflow: visible !important;
    padding: 10px 0;
}

.servicesSwiper .swiper-wrapper{
    align-items: stretch;
}

.servicesSwiper .swiper-slide{
    height: auto;
}
</style>
