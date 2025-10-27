<style>
/* General Typography & Core Colors */
/* General Typography & Core Colors */
body {
    font-family: 'Rubik', sans-serif;
    color: #333;
    line-height: 1.6;
}

/* Section Titles - Enhanced */
.section-title {
    font-size: 3.2rem; /* Slightly larger */
    color: #2c3e50; /* Darker, more professional grey */
    font-weight: 800; /* Bolder */
    position: relative;
    padding-bottom: 15px; /* Space for underline effect */
}

.section-title::after {
    content: '';
    position: absolute;
    left: 50%;
    bottom: 0;
    transform: translateX(-50%);
    width: 80px; /* Short underline */
    height: 4px; /* Thicker underline */
    background: linear-gradient(to right, #D89835, #F2B544); /* Gradient underline */
    border-radius: 2px;
}

.section-subtitle {
    color: #7f8c8d; /* Muted grey for subtitle */
    font-size: 1.2rem; /* Slightly larger */
    margin-top: 10px;
}

/* Customer Service Section - Enhanced Background */
.customer-service-section {
    /* More dynamic and subtle gradient */
    background: linear-gradient(135deg, #FFF8EE 0%, #FDFBF8 50%, #FFF8EE 100%);
    background-size: 300% 300%; /* Larger for smoother animation */
    animation: bg-move 15s ease infinite; /* Slower, smoother animation */
    padding: 80px 0; /* More padding top/bottom */
    position: relative;
    overflow: hidden; /* Hide overflow from any floating elements */
    z-index: 1;
}

/* Optional: Subtle background pattern/texture */
.customer-service-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="%23d89835" opacity="0.1"/><circle cx="80" cy="80" r="2" fill="%23f2b544" opacity="0.1"/></svg>');
    background-size: 40px 40px;
    opacity: 0.1;
    z-index: -1; /* Behind content */
}


@keyframes bg-move {
    0% {background-position: 0% 50%;}
    50% {background-position: 100% 50%;}
    100% {background-position: 0% 50%;}
}

/* Service Card - Significantly Enhanced */
.service-card {
    background: rgba(255, 255, 255, 0.8); /* More opaque for better readability */
    border-radius: 15px; /* More rounded corners */
    border: 1px solid rgba(255, 255, 255, 0.5); /* Stronger border */
    /* NEW: Professional shadow with slight orange tint */
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08), 0 0 0 2px rgba(242, 181, 68, 0.1); /* Soft shadow + subtle inner glow like border */
    backdrop-filter: blur(10px); /* Slightly less blur */
    -webkit-backdrop-filter: blur(10px);
    transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1); /* Smoother transition */
    text-align: center;
    padding: 40px 25px 30px; /* Adjusted padding */
    position: relative; /* For the top strip */
    overflow: hidden; /* Hide anything outside border-radius */
}

.service-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 8px; /* Top strip */
    background: linear-gradient(to right, #D89835, #F2B544); /* Gradient top strip */
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    /* Optional: Subtle animation for the strip itself on hover */
    transform: translateY(-100%); /* Initially hidden */
    transition: transform 0.4s ease-out;
}

.service-card:hover::before {
    transform: translateY(0); /* Reveal on hover */
}


.service-card:hover {
    transform: translateY(-8px) scale(1.02); /* More pronounced lift and slight scale */
    box-shadow: 0 18px 40px rgba(0, 0, 0, 0.15), 0 0 0 3px rgba(242, 181, 68, 0.3); /* Stronger shadow on hover */
}

/* Icon Container - Enhanced */
.service-card .icon-container {
    background: linear-gradient(160deg, #F2B544 0%, #D89835 100%); /* Adjusted gradient */
    width: 90px; /* Slightly larger icon container */
    height: 90px;
    margin: 0 auto 25px; /* More margin */
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 5px 15px rgba(242, 181, 68, 0.4); /* Shadow for icon container */
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease-out;
}

.service-card .icon-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, rgba(255,255,255,0) 70%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.service-card:hover .icon-container::before {
    opacity: 1; /* Subtle highlight on hover */
}

.service-card .icon-container img {
    width: 48px; /* Slightly larger icon */
    height: 48px;
    filter: drop-shadow(0 2px 5px rgba(0,0,0,0.2)); /* Shadow for the icon itself */
    transition: transform 0.3s ease;
}

.service-card:hover .icon-container img {
    transform: scale(1.1); /* Pop effect on icon hover */
}

.service-card h5 {
    font-weight: 700;
    color: #2c3e50; /* Matches section title for consistency */
    margin-bottom: 8px; /* More space */
    font-size: 1.5rem; /* Larger heading */
}

.service-card p {
    font-size: 1rem; /* Slightly larger body text */
    color: #666;
    margin-bottom: 25px; /* More space before buttons */
}

/* Buttons - Modernized */
.btn-whatsapp,
.btn-call {
    display: flex; /* Use flexbox for icon alignment */
    align-items: center;
    justify-content: center;
    border-radius: 30px; /* More rounded pills */
    font-weight: 600;
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    padding: 10px 25px; /* Larger touch area */
    font-size: 1rem; /* Standard font size */
    text-decoration: none;
    margin: 5px 0; /* Space between buttons */
}

/* NEW: WhatsApp button - Orange Gradient */
.btn-whatsapp {
    background: linear-gradient(45deg, #F2B544, #D89835); /* Orange gradient */
    color: white;
    box-shadow: 0 4px 15px rgba(242, 181, 68, 0.3); /* Orange shadow */
    border: none;
}

/* NEW: Call button - Gray Gradient */
.btn-call {
    background: linear-gradient(45deg, #6c757d, #495057); /* Gray gradient */
    color: white;
    box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3); /* Gray shadow */
    border: none;
}


.btn-whatsapp i,
.btn-call i {
    margin-right: 8px; /* Space between icon and text */
}

/* Hover effects for buttons - Adjusted gradients */
.btn-whatsapp:hover {
    background: linear-gradient(45deg, #D89835, #F2B544); /* Reverse gradient on hover */
    box-shadow: 0 8px 25px rgba(242, 181, 68, 0.5);
    transform: translateY(-2px);
}

.btn-call:hover {
    background: linear-gradient(45deg, #495057, #6c757d); /* Reverse gradient on hover */
    box-shadow: 0 8px 25px rgba(108, 117, 125, 0.5);
    transform: translateY(-2px);
}

/* Responsive adjustments */
@media (max-width: 767.98px) {
    .section-title {
        font-size: 2.2rem;
    }
    .section-subtitle {
        font-size: 1rem;
    }
    .service-card {
        padding: 30px 15px 20px;
    }
    .service-card .icon-container {
        width: 70px;
        height: 70px;
        margin-bottom: 20px;
    }
    .service-card .icon-container img {
        width: 38px;
        height: 38px;
    }
    .service-card h5 {
        font-size: 1.3rem;
    }
    .service-card p {
        font-size: 0.9rem;
    }
    .btn-whatsapp, .btn-call {
        padding: 10px 20px;
        font-size: 0.95rem;
    }
}

</style>

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
                        {{-- <div class="top-strip"></div> --}}
                        {{-- الشريط العلوي سيتم إنشاؤه الآن بواسطة :before pseudo-element في CSS --}}
                        <div class="icon-container">
                            <img src="{{ asset('frontend/img/customer-service.png') }}" alt="خدمة العملاء">
                        </div>
                        <h5>{{ $admin->name }}</h5>
                        <p>نخدمكم على مدار <strong>24/7</strong></p>
                        <div class="d-grid gap-2">
                            <a href="https://api.whatsapp.com/send?phone={{ $admin->phone }}" target="_blank" class="btn btn-whatsapp">
                                <i class="bi bi-whatsapp me-1"></i> واتساب
                            </a>
                            <a href="tel:{{ $admin->phone }}" class="btn btn-call">
                                <i class="bi bi-telephone me-1"></i> اتصال
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
@else
{{--    <section class="Countries-section" id="Countries">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="Countries-title">--}}
{{--                <div class="Countries-title-heading">--}}
{{--                    <h6>{{__('frontend.recruitmentCountries')}} </h6>--}}
{{--                </div>--}}
{{--                <h2> {{__('frontend.chooseRecruitmentCountry')}}</h2>--}}
{{--            </div>--}}
{{--            <div class="Countries-boxes">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-3 col-md-6">--}}
{{--                        <div class="Countries-block">--}}
{{--                            <div class="Countries-media">--}}
{{--                                <div> <img src="{{asset('frontend')}}/img/countries/1.png" alt=""/></div>--}}
{{--                            </div>--}}
{{--                            <div class="Countries-content">--}}
{{--                                <div class="count-content-title">{{__('frontend.uganda')}}</div>--}}
{{--                                <p>{{__('frontend.recruitmentPeriod')}}</p>--}}
{{--                                <a href="" class="defaultBtn"> {{__('frontend.demandNow')}} </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-3 col-md-6">--}}
{{--                        <div class="Countries-block">--}}
{{--                            <div class="Countries-media">--}}
{{--                                <div><img src="{{asset('frontend')}}/img/countries/2.png" alt=""/></div>--}}
{{--                            </div>--}}
{{--                            <div class="Countries-content">--}}
{{--                                <div class="count-content-title"> {{__('frontend.kenya')}} </div>--}}
{{--                                <p>{{__('frontend.recruitmentPeriod')}} </p>--}}
{{--                                <a href="" class="defaultBtn"> {{__('frontend.demandNow')}} </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-3 col-md-6">--}}
{{--                        <div class="Countries-block">--}}
{{--                            <div class="Countries-media">--}}
{{--                                <div><img src="{{asset('frontend')}}/img/countries/3.jpeg" alt=""/></div>--}}
{{--                            </div>--}}
{{--                            <div class="Countries-content">--}}
{{--                                <div class="count-content-title"> {{__('frontend.bangladesh')}} </div>--}}
{{--                                <p>{{__('frontend.recruitmentPeriod')}} </p>--}}
{{--                                <a href="" class="defaultBtn"> {{__('frontend.demandNow')}} </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-3 col-md-6">--}}
{{--                        <div class="Countries-block">--}}
{{--                            <div class="Countries-media">--}}
{{--                                <div><img src="{{asset('frontend')}}/img/countries/4.jpeg" alt=""/></div>--}}
{{--                            </div>--}}
{{--                            <div class="Countries-content">--}}
{{--                                <div class="count-content-title"> {{__('frontend.Philippine')}} </div>--}}
{{--                                <p>{{__('frontend.recruitmentPeriod')}} </p>--}}
{{--                                <a href="" class="defaultBtn"> {{__('frontend.demandNow')}} </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-2"></div>--}}
{{--                    <div class="col-lg-3 col-md-6">--}}
{{--                        <div class="Countries-block">--}}
{{--                            <div class="Countries-media">--}}
{{--                                <div><img src="{{asset('frontend')}}/img/countries/5.png" alt=""/></div>--}}
{{--                            </div>--}}
{{--                            <div class="Countries-content">--}}
{{--                                <div class="count-content-title"> {{__('frontend.india')}} </div>--}}
{{--                                <p>{{__('frontend.recruitmentPeriod')}}</p>--}}
{{--                                <a href="" class="defaultBtn"> {{__('frontend.demandNow')}} </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-3 col-md-6">--}}
{{--                        <div class="Countries-block">--}}
{{--                            <div class="Countries-media">--}}
{{--                                <div><img src="{{asset('frontend')}}/img/countries/6.png" alt=""/></div>--}}
{{--                            </div>--}}
{{--                            <div class="Countries-content">--}}
{{--                                <div class="count-content-title"> {{__('frontend.mauritania')}} </div>--}}
{{--                                <p>{{__('frontend.recruitmentPeriod')}} </p>--}}
{{--                                <a href="" class="defaultBtn">{{__('frontend.demandNow')}} </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-3 col-md-6">--}}
{{--                        <div class="Countries-block">--}}
{{--                            <div class="Countries-media">--}}
{{--                                <div><img src="{{asset('frontend')}}/img/countries/7.png" alt=""/></div>--}}
{{--                            </div>--}}
{{--                            <div class="Countries-content">--}}
{{--                                <div class="count-content-title"> {{__('frontend.Djibouti')}} </div>--}}
{{--                                <p>{{__('frontend.recruitmentPeriod')}} </p>--}}
{{--                                <a href="" class="defaultBtn"> {{__('frontend.demandNow')}} </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
@endif