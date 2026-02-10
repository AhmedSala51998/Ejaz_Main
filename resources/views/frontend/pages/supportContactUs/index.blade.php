@extends('frontend.layouts.layout')

@section('title')
تواصل معنا
@endsection

@section('meta_description')
تواصل مع فريق خدمة عملاء شركة إيجاز للاستقدام على مدار الساعة للرد على استفساراتكم ومساعدتكم في طلبات الاستقدام داخل المملكة العربية السعودية.
@endsection

@section('styles')
<style>
    body {
        background-color: #FFF !important;
        font-family: 'Tajawal', sans-serif;
        line-height: 1.7;
        color: #333;
        overflow-x: hidden;
    }

    .banner {
        background: linear-gradient(135deg, #f4a835, #fff1db);
        padding: 60px 20px;
        text-align: center;
        border-radius: 0 0 50px 50px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
        color: #333;
    }

    .banner::before {
        content: '';
        position: absolute;
        top: -100px;
        left: -100px;
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        z-index: 0;
    }

    .banner h1 {
        font-size: 3rem;
        font-weight: bold;
        position: relative;
        z-index: 1;
    }

    .banner ul {
        list-style: none;
        padding: 0;
        margin-top: 15px;
        display: flex;
        justify-content: center;
        gap: 20px;
        position: relative;
        z-index: 1;
    }

    .banner ul li a {
        color: #333;
        font-weight: 600;
        text-decoration: none;
        transition: 0.3s;
    }

    .banner ul li a.active,
    .banner ul li a:hover {
        color: #fff;
        background: #f4a835;
        padding: 6px 14px;
        border-radius: 12px;
    }

    .mapEarth,
    .contactForm {
        padding: 60px 0;
        background: #FFF;
    }

    .title span {
        font-size: 24px;
        font-weight: 700;
        color: #f4a835;
        display: inline-block;
    }

    .companyInfo ul {
        list-style: none;
        padding: 0;
    }

    .companyInfo li {
        display: flex;
        align-items: flex-start;
        margin-bottom: 20px;
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(244, 168, 53, 0.8);
        padding: 20px;
        border-radius: 15px;
        backdrop-filter: blur(10px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    .companyInfo li span {
        border: 1px solid rgba(244, 168, 53, 0.8) !important;
        width: 42px;
        height: 40px;
        min-width: 42px; /* Ensure icon container doesn't shrink */
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }

    .companyInfo li i {
        font-size: 24px;
        color: #f4a835;
        /* margin-right: 15px; */
        /* margin-left: 13px; Removed specific margins, flexbox will handle spacing */
    }
    .companyInfo li p {
        margin-right: 15px; /* Adjust spacing for RTL */
        margin-bottom: 0; /* Remove default paragraph margin */
    }

    .companyInfo li p a {
        display: block; /* Make links stack */
        color: #333;
        text-decoration: none;
        word-break: break-word; /* Ensure long addresses break correctly */
    }


    /* Custom Contact Form Styles (Enhanced for Mobile) */
    .custom-contact-form {
        background: rgba(255, 255, 255, 0.15);
        border-radius: 20px;
        padding: 40px 30px;
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        box-shadow: 0 8px 30px rgba(0,0,0,0.05);
        border: 1px solid rgba(255,255,255,0.25);
    }

    .custom-contact-form .form-group {
        position: relative;
        margin-bottom: 30px;
    }

    .custom-contact-form input,
    .custom-contact-form textarea {
        width: 100%;
        background: #fff;
        border-radius: 14px;
        border: 1px solid #ccc;
        padding: 12px 18px;
        transition: all 0.3s ease;
        font-size: 15px;
        color: #333;
    }

    .custom-contact-form input:focus,
    .custom-contact-form textarea:focus {
        border-color: #f4a835;
        box-shadow: 0 0 12px rgba(244, 168, 53, 0.3);
        background-color: #fffefc;
        outline: none;
    }

    .custom-contact-form label {
        font-weight: bold;
        color: #333;
        margin-bottom: 6px;
        display: inline-block;
        /* Reset positioning for better stacking on mobile */
        position: static;
        transform: none;
        font-size: 15px;
        gap: 6px;
    }

    .custom-contact-form label i {
        color: #f4a835;
        margin-left: 5px;
        margin-right: 5px;
    }

    /* Remove placeholder-shown logic as labels are always visible above inputs */
    .custom-contact-form input::placeholder,
    .custom-contact-form textarea::placeholder {
        color: #888; /* Make placeholder visible for clarity */
    }

    .submit-button {
        background: #f4a835;
        color: #fff;
        padding: 12px 40px;
        font-size: 16px;
        font-weight: 600;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%; /* Full width on mobile */
    }

    .submit-button:hover {
        background: #d89215;
        transform: scale(1.05);
    }

    .submit-button i {
        margin-right: 6px;
        transition: transform 0.3s ease;
    }

    .submit-button:hover i {
        transform: translateX(-4px);
    }

    .error-message {
        color: #d92d20;
        font-size: 14px;
        margin-top: 4px;
        display: block;
    }

    .is-invalid {
        border-color: #d92d20 !important;
        box-shadow: 0 0 6px rgba(217, 45, 32, 0.2);
    }

    .d-none {
        display: none !important;
    }

    /* Globe Animation and Styling */
    .earth {
        width: 100%;
        height: 400px;
        background: radial-gradient(circle at 40% 40%, #ffffff, #f2f2f2);
        border-radius: 50%;
        box-shadow: inset 0 0 40px rgba(0,0,0,0.08), 0 0 30px rgba(244, 168, 53, 0.2);
        position: relative;
        animation: rotateGlobe 35s linear infinite;
        transition: all 0.3s ease-in-out;
    }

    @keyframes rotateGlobe {
        0% { transform: rotateY(0deg); }
        100% { transform: rotateY(360deg); }
    }

    .worldMap {
        position: relative;
        z-index: 1;
        background: radial-gradient(circle at center, rgba(255, 242, 210, 0.2), transparent);
        border-radius: 50%;
        padding: 30px;
        margin-bottom: 30px; /* Add space below the map on small screens */
    }

    #orbic_dots use {
        animation: moveDot 4s ease-in-out infinite;
    }
    @keyframes moveDot {
        0% { transform: translateY(0px); opacity: 0.4; }
        50% { transform: translateY(-6px); opacity: 1; }
        100% { transform: translateY(0px); opacity: 0.4; }
    }

    #orbic_users image {
        transition: 0.3s ease-in-out;
        cursor: pointer;
    }
    #orbic_users image:hover {
        transform: scale(1.08);
        filter: drop-shadow(0 0 10px #f4a835);
    }

    .user-bubble {
        position: absolute;
        background-color: #fff;
        color: #333;
        padding: 10px 16px;
        border-radius: 25px;
        font-size: 14px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        z-index: 100;
        display: none;
        opacity: 0;
        transform: scale(0.5);
        transition: all 0.6s ease;
        pointer-events: none; /* Make bubbles not interfere with clicks */
    }

    .user-bubble.show {
        display: block;
        opacity: 1;
        transform: scale(1);
    }

    .user-bubble::after {
        content: "";
        position: absolute;
        bottom: -8px;
        left: 50%;
        transform: translateX(-50%);
        border-width: 8px 8px 0 8px;
        border-style: solid;
        border-color: #fff transparent transparent transparent;
    }

    @keyframes fadeInBubble {
        0% { opacity: 0; transform: translateY(20px) scale(0.95); }
        100% { opacity: 1; transform: translateY(0) scale(1); }
    }


    /* References Section */
    .references {
        background: linear-gradient(145deg, #fffdfa, #fff9f3 50%, #f5f1ec);
        box-shadow: inset 0 10px 60px rgba(255 168 0 / 0.15);
        padding-bottom: 80px;
    }

    .sectionTitle h2 {
        font-weight: 900;
        font-size: 3rem;
        color: #222;
        letter-spacing: 1.2px;
        margin-bottom: 8px;
        text-shadow: 0 2px 8px rgba(255 153 0 / 0.25);
    }

    .sectionTitle p {
        font-size: 1.3rem;
        color: #555;
        max-width: 600px;
        margin: 0 auto;
        font-weight: 600;
        letter-spacing: 0.3px;
    }

    .referenceLogo {
        position: relative;
        height: 240px;
        background: rgba(255 255 255 / 0.12);
        border-radius: 30px;
        border: 2px solid rgba(255 168 0 / 0.4);
        backdrop-filter: blur(22px);
        -webkit-backdrop-filter: blur(22px);
        box-shadow:
            0 15px 30px rgba(255 168 0 / 0.22),
            inset 0 0 40px rgba(255 255 255 / 0.35);
        overflow: hidden;
        cursor: pointer;
        transition: transform 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55), box-shadow 0.6s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .referenceLogo .shine {
        position: absolute;
        top: -70%;
        left: -70%;
        width: 200%;
        height: 200%;
        background: linear-gradient(120deg, rgba(255 255 255 / 0.35) 0%, transparent 60%);
        transform: rotate(25deg);
        pointer-events: none;
        animation: shineMove 3s linear infinite;
        opacity: 0.7;
    }

    @keyframes shineMove {
        0% {
            transform: translateX(-100%) rotate(25deg);
        }
        100% {
            transform: translateX(100%) rotate(25deg);
        }
    }

    .referenceLogo:hover {
        transform: perspective(600px) translateY(-20px) scale(1.12) rotateX(8deg) rotateZ(-3deg);
        box-shadow:
            0 0 40px rgba(255 168 0 / 0.7),
            0 25px 60px rgba(255 168 0 / 0.45);
        border-color: rgba(255 168 0 / 0.9);
        background: rgba(255 255 255 / 0.25);
    }

    .referenceLogo img {
        max-height: 140px;
        max-width: 100%;
        object-fit: contain;
        filter: drop-shadow(0 0 3px rgba(255 168 0, 0.5));
        transition: transform 0.6s ease, filter 0.6s ease;
        position: relative;
        z-index: 3;
    }

    .referenceLogo:hover img {
        transform: scale(1.18);
        filter: drop-shadow(0 0 12px rgba(255 168 0, 0.85));
    }

    .swiper-pagination-bullet {
        background: #ffb700;
        width: 14px;
        height: 14px;
        margin: -40px 8px !important;
        border-radius: 50%;
        opacity: 0.8;
        box-shadow: 0 0 10px rgba(255 183 0, 0.4);
        transition: all 0.35s ease;
    }

    .swiper-pagination-bullet-active {
        background: #cc8b00;
        width: 18px;
        height: 18px;
        opacity: 1;
        box-shadow: 0 0 20px rgba(204 139 0, 0.9);
        transform-origin: center;
        animation: pulse 1.6s infinite;
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
            opacity: 1;
        }
        50% {
            transform: scale(1.2);
            opacity: 0.7;
        }
    }

    /* Animations for form elements */
    @keyframes fadeSlideIn {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-group {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeSlideIn 0.8s ease forwards;
        position: relative;
        margin-bottom: 25px;
    }

    /* Animation delays */
    .form-group:nth-child(1) { animation-delay: 0.1s; }
    .form-group:nth-child(2) { animation-delay: 0.2s; }
    .form-group:nth-child(3) { animation-delay: 0.3s; }
    .form-group:nth-child(4) { animation-delay: 0.4s; }

    .submit-button {
        animation: fadeSlideIn 1s ease forwards;
        animation-delay: 0.6s;
        opacity: 0;
        transform: translateY(30px);
    }

    /* Responsive adjustments */
    @media (max-width: 991.98px) {
        .banner h1 {
            font-size: 2.5rem; /* Slightly smaller on tablets */
        }
        .mapEarth .col-lg-6,
        .contactForm .col-md-6 {
            flex: 0 0 100%; /* Make columns full width */
            max-width: 100%;
            padding: 10px; /* Adjust padding for smaller screens */
        }
        .companyInfo li {
            flex-direction: column; /* Stack icon and text */
            align-items: center; /* Center items when stacked */
            text-align: center;
        }
        .companyInfo li span {
            margin-bottom: 10px; /* Space between icon and text */
        }
        .companyInfo li i {
            margin-right: 0;
            margin-left: 0;
        }
        .companyInfo li p {
            margin-right: 0; /* Remove specific margin for p */
        }
        .contactForm {
            padding: 30px 0; /* Adjust section padding */
        }
        .custom-contact-form {
            padding: 25px 20px; /* Adjust form padding */
        }
        .submit-button {
            width: 100%; /* Full width button */
        }
        .googleMap iframe {
            min-height: 300px; /* Smaller map height on mobile */
        }
        .worldMap {
            height: auto; /* Allow map height to adjust */
            padding: 15px; /* Adjust map padding */
        }
        .earth {
            height: 300px; /* Smaller globe on mobile */
        }
        .user-bubble {
            font-size: 12px;
            padding: 6px 10px;
        }
        .referenceLogo {
            height: 180px; /* Adjust height of reference logos */
        }
        .referenceLogo img {
            max-height: 100px;
        }
        .sectionTitle h2 {
            font-size: 2rem;
        }
        .sectionTitle p {
            font-size: 1rem;
        }
        .swiper-pagination-bullet {
            margin: -25px 6px !important; /* Adjust pagination bullet position */
        }
    }

    @media (max-width: 767.98px) {
        .banner h1 {
            font-size: 2rem;
        }
        .banner ul {
            flex-wrap: wrap; /* Allow navigation links to wrap */
            gap: 10px;
        }
        .companyInfo li p {
            font-size: 0.9rem; /* Smaller text for contact info */
        }
        .googleMap {
            margin-top: 30px; /* Add margin above map when stacked */
        }
    }

    @media (max-width: 575.98px) {
        .banner {
            padding: 40px 15px;
            border-radius: 0 0 30px 30px;
        }
        .banner h1 {
            font-size: 1.8rem;
        }
        .mapEarth, .contactForm {
            padding: 30px 0;
        }
        .companyInfo li {
            padding: 15px;
            margin-bottom: 15px;
        }
        .custom-contact-form {
            padding: 20px 15px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .submit-button {
            padding: 10px 20px;
            font-size: 15px;
        }
        .earth {
            height: 250px; /* Even smaller globe */
        }
        .worldMap {
            padding: 10px;
        }
        .referenceLogo {
            height: 150px;
        }
        .referenceLogo img {
            max-height: 80px;
        }
        .sectionTitle h2 {
            font-size: 1.8rem;
        }
        .sectionTitle p {
            font-size: 0.9rem;
        }
    }
    .map-responsive {
    overflow: hidden;
    padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
    position: relative;
    height: 0;
}
.map-responsive iframe {
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    position: absolute;
}
.ultra-glass-popup {
    border-radius: 30px !important;
    padding: 35px 30px !important;
    background: rgba(255, 255, 255, 0.08) !important;
    backdrop-filter: blur(20px);
    box-shadow: 0 16px 40px rgba(0, 0, 0, 0.15) !important;
    font-family: 'Tajawal', sans-serif;
    animation: fadeInUp 0.6s ease;
}

.ultra-btn {
    background: linear-gradient(135deg, #f4a835, #ffb23c);
    color: white;
    padding: 12px 28px;
    border-radius: 14px;
    font-weight: bold;
    font-size: 16px;
    box-shadow: 0 8px 18px rgba(244, 168, 53, 0.35);
    transition: all 0.3s ease-in-out;
    letter-spacing: 0.3px;
}

.ultra-btn:hover {
    background: linear-gradient(135deg, #e5941f, #f4a835);
    transform: scale(1.06);
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
@endsection


@section('content')

    <content>
        <div class="banner">
            <h1> تواصل معنا </h1>
            <ul>
                <li> <a href="{{route('home')}}">الرئيسية </a> </li>
                <li> <a href="#!" class="active"> تواصل معنا </a> </li>
            </ul>
        </div>
        <section class="mapEarth">
            <div class="container">
                <div class="row align-items-center flex-column-reverse flex-lg-row"> {{-- Added flex-column-reverse for mobile, map will appear above contact info --}}
                    <div class="col-lg-6">
                        <div class="worldMap">
                            <div class="earth"></div>
                            <div class="orbic">
                                <svg viewBox="0 0 500 500" width="0" height="0">
                                    <g id="orbic_path">
                                        <ellipse cx="250" cy="250" rx="240" ry="100" transform="rotate(-10,250,250)"></ellipse>
                                        <path d="M230,192Q300,25 375,146"></path>
                                        <path d="M375,146Q450,175 410,301"></path>
                                        <path d="M40,234Q300,125 410,301"></path>
                                        <path d="M410,301Q260,165 125,354"></path>
                                        <path d="M125,354Q150,220 230,192"></path>
                                        <path d="M40,234Q130,200 125,354"></path>
                                    </g>
                                    <g id="orbic_dots">
                                        <defs>
                                            <circle id="orbic_dot" cx="0" cy="0" r="6"></circle>
                                        </defs>
                                        <use id="orbic_dot1" xlink:href="#orbic_dot"></use>
                                        <use id="orbic_dot2" xlink:href="#orbic_dot"></use>
                                        <use id="orbic_dot3" xlink:href="#orbic_dot"></use>
                                        <use id="orbic_dot4" xlink:href="#orbic_dot"></use>
                                        <use id="orbic_dot5" xlink:href="#orbic_dot"></use>
                                    </g>
                                    <g id="orbic_users">
                                        <image id="orbic_user1" xlink:href="{{asset('frontend')}}/img/user1.webp" width="20%" height="20%"></image>
                                        <image id="orbic_user2" xlink:href="{{asset('frontend')}}/img/user2.webp" width="20%" height="20%"></image>
                                        <image id="orbic_user3" xlink:href="{{asset('frontend')}}/img/user3.webp" width="20%" height="20%"></image>
                                        <image id="orbic_user4" xlink:href="{{asset('frontend')}}/img/user4.webp" width="20%" height="20%"></image>
                                        <image id="orbic_user5" xlink:href="{{asset('frontend')}}/img/user5.webp" width="20%" height="20%"></image>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 pt-lg-5">
                        <h4 class="title"> <span> كن علي اتصال </span> </h4>
                        <div class="companyInfo ">
                            <ul>
                                <li class="" data-aos="fade-up">
                                    <span><i style="color: #ff9800 !important;" class="fa-solid fa-map-location"></i></span>
                                    @if(Cookie::get('branch') == 'yanbu')
                                      <p class="ms-3">
                                            فروعنا :
                                        <a target="_blank" href="https://maps.app.goo.gl/cAvHub78qk2jcy9DA" > {{ $settings->address1 ?? "السعودية - الرياض - شارع الوحدة" }}</a> <br>
                                        <ul>
                                          <li><a target="_blank" href="https://maps.app.goo.gl/QaPjsmrTQ3jgcq6u8" > الأمير فيصل، حي الخالدية، جدة 23423</a></li>
                                          <li><a target="_blank" href="https://maps.app.goo.gl/WEv3MkTyMmLBdeWE9" > 3032 الرياض، حي الملك فيصل، شارع أم المؤمنين سودة بنت زمعه</a></li>
                                        </ul>
                                      </p>
                                    @elseif(Cookie::get('branch') == 'jeddah')
                                        <p class="ms-3">
                                            فروعنا :
                                        <a target="_blank" href="https://maps.app.goo.gl/QaPjsmrTQ3jgcq6u8" > الأمير فيصل، حي الخالدية، جدة 23423</a> <br>
                                        <ul>
                                          <li><a target="_blank" href="https://maps.app.goo.gl/cAvHub78qk2jcy9DA" > {{ $settings->address1 ?? "السعودية - الرياض - شارع الوحدة" }}</a></li>
                                          <li><a target="_blank" href="https://maps.app.goo.gl/WEv3MkTyMmLBdeWE9" > 3032 الرياض، حي الملك فيصل، شارع أم المؤمنين سودة بنت زمعه</a></li>
                                        </ul>
                                       </p>
                                        @elseif(Cookie::get('branch') == 'riyadh')
                                        <p class="ms-3">
                                            فروعنا :
                                        <a target="_blank" href="https://maps.app.goo.gl/WEv3MkTyMmLBdeWE9" > 3032 الرياض، حي الملك فيصل، شارع أم المؤمنين سودة بنت زمعه</a> <br>
                                        <ul>
                                          <li><a target="_blank" href="https://maps.app.goo.gl/cAvHub78qk2jcy9DA" > {{ $settings->address1 ?? "السعودية - الرياض - شارع الوحدة" }}</a></li>
                                          <li><a target="_blank" href="https://maps.app.goo.gl/QaPjsmrTQ3jgcq6u8" > الأمير فيصل، حي الخالدية، جدة 23423</a></li>
                                        </ul>
                                       </p>
                                       @else
                                       <p class="ms-3">
                                            فروعنا :
                                        <a target="_blank" href="https://maps.app.goo.gl/cAvHub78qk2jcy9DA" > {{ $settings->address1 ?? "السعودية - الرياض - شارع الوحدة" }}</a> <br>
                                        <ul>
                                          <li><a target="_blank" href="https://maps.app.goo.gl/QaPjsmrTQ3jgcq6u8" > الأمير فيصل، حي الخالدية، جدة 23423</a></li>
                                          <li><a target="_blank" href="https://maps.app.goo.gl/WEv3MkTyMmLBdeWE9" > 3032 الرياض، حي الملك فيصل، شارع أم المؤمنين سودة بنت زمعه</a></li>
                                        </ul>
                                      </p>
                                      @endif
                                </li>
                                <li class="" data-aos="fade-up">
                                    <span><i style="color: #ff9800 !important;" class="fa-solid fa-phone"></i></span>
                                    <p class="ms-3">
                                        المبيعات :
                                        <a href="tel:{{$settings->callNumber ?? '+966 0123456789'}}"> {{$settings->callNumber ?? '+966 0123456789'}} </a>
                                        <a href="tel:{{$settings->whatsappNumber ?? '+966 0123456789'}}"> {{$settings->whatsappNumber ?? '+966 0123456789'}} </a>
                                        <a href="tel:{{$settings->phone1 ?? '+966 0123456789'}}"> {{$settings->phone1 ?? '+966 0123456789'}} </a>
                                        <a href="tel:{{$settings->phone2 ?? '+966 0123456789'}}"> {{$settings->phone2 ?? '+966 0123456789'}} </a>
                                        <a href="tel:{{$settings->phone3 ?? '+966 0123456789'}}"> {{$settings->phone3 ?? '+966 0123456789'}} </a>
                                        <a href="tel:{{$settings->phone4 ?? '+966 0123456789'}}"> {{$settings->phone4 ?? '+966 0123456789'}} </a>
                                    </p>
                                </li>
                                <li class="" data-aos="fade-up">
                                    <span><i style="color: #ff9800 !important;" class="fas fa-question"></i></span>
                                    <p class="ms-3">
                                        الشكاوي والاقتراحات :
                                        <a href="tel:{{$settings->phone1}}">{{$settings->phone1}}</a>
                                    </p>
                                </li>
                                <li class="" data-aos="fade-up">
                                    <span><i style="color: #ff9800 !important;" class="fas fa-envelope"></i></span>
                                    <p class="ms-3">
                                        البريد الالكتروني :
                                        <a href="mailto:{{$settings->email1}}">{{$settings->email1}}</a>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="contactForm">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 p-2 mb-5 mb-md-0 " data-aos=" fade-up">
                        <div class="headTitle text-start ">
                            <h2> تواصل معنا </h2>
                            <p> اطلب عاملتك الان وسيقوم فريق خدمة العملاء لدينا بالتواصل معك بأسرع وقت ... </p>
                        </div>
                        <form id="Form" class="needs-validation custom-contact-form" action="{{route('front.contact_us_action')}}" method="post" novalidate>
                            @csrf

                            <div class="form-group">
                                <label for="nameInput"><i class="fas fa-user"></i> الاسم كامل *</label>
                                <input type="text" name="name" id="nameInput" required placeholder="الاسم كامل">
                                <small class="error-message"></small>
                            </div>

                            <div class="form-group">
                                <label for="phoneInput"><i class="fas fa-phone-alt"></i> رقم الجوال *</label>
                                <input type="text" name="phone" id="phoneInput" required onkeypress="return isNumber(event)" placeholder="رقم الجوال">
                                <small class="error-message"></small>
                            </div>

                            <div class="form-group">
                                <label for="subjectInput"><i class="fas fa-comment-dots"></i> الموضوع</label>
                                <input type="text" name="subject" id="subjectInput" placeholder="الموضوع">
                                <small class="error-message"></small>
                            </div>

                            <div class="form-group">
                                <label for="messageTextarea"><i class="fas fa-feather-alt"></i> رسالتك *</label>
                                <textarea name="message" id="messageTextarea" rows="4" required placeholder="رسالتك"></textarea>
                                <small class="error-message"></small>
                            </div>

                            <div class="text-center pt-3">
                                <button type="submit" class="submit-button" id="submit_button">
                                    <i class="fas fa-paper-plane ms-2"></i> إرسال
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 p-2 " data-aos=" fade-up">
                        <div class="googleMap wow fadeInUp "> {{-- Wrapped iframe in a div for better control --}}
                        <div class="map-responsive">
                            @if(Cookie::get('branch') == 'yanbu')
                              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14568.708601963628!2d38.0609721!3d24.0952649!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15b9072220f00e2f%3A0xc45245d46a507938!2z2LTYsdmD2Kkg2KfZitis2KfYsiDZhNmE2KfYs9iq2YLYr9in2YU!5e0!3m2!1sen!2ssa!4v1711472449580!5m2!1sen!2ssa" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            @elseif(Cookie::get('branch') == 'jeddah')
                              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d399192.549344057!2d39.00448971889578!3d21.63386608525768!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x147e5180a6ce7bd%3A0xa97ff9e14a988412!2z2LTYsdmD2Kkg2KfZitis2KfYsiDZhNmE2KfYs9iq2YLYr9in2YU!5e0!3m2!1sen!2ssa!4v1759667574597!5m2!1sen!2ssa" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            @elseif(Cookie::get('branch') == 'riyadh')
                              <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1280.9175596126404!2d46.768513254663944!3d24.76180731424474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjTCsDQ1JzQyLjAiTiA0NsKwNDYnMTAuMyJF!5e0!3m2!1sen!2ssa!4v1759666548668!5m2!1sen!2ssa" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            @else
                              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14568.708601963628!2d38.0609721!3d24.0952649!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15b9072220f00e2f%3A0xc45245d46a507938!2z2LTYsdmD2Kkg2KfZitis2KfYsiDZhNmE2KfYs9iq2YLYr9in2YU!5e0!3m2!1sen!2ssa!4v1711472449580!5m2!1sen!2ssa" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            @endif
                        </div>
                </div>
            </div>
        </section>
        <section class="references py-6">
        <div class="container">
            <div class="sectionTitle text-center mb-5" data-aos="fade-up">
            <h2>الجهات المرجعية</h2>
            <p>نفخر بالتعاون مع أبرز الجهات الحكومية والرسمية</p>
            </div>

            <div class="swiper referencesSlider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                <div class="referenceLogo glass-card">
                    <img src="{{asset('frontend')}}/img/Ministry-of-Foreign-Affairs-01.svg" alt="وزارة الخارجية" loading="lazy" />
                    <div class="shine"></div>
                </div>
                </div>
                <div class="swiper-slide">
                <div class="referenceLogo glass-card">
                    <img src="{{asset('frontend')}}/img/Ministry-of-Interior-01.svg" alt="وزارة الداخلية" loading="lazy" />
                    <div class="shine"></div>
                </div>
                </div>
                <div class="swiper-slide">
                <div class="referenceLogo glass-card">
                    <img src="{{asset('frontend')}}/img/Ministry-of-Labor-and-Social-Development.svg" alt="وزارة الموارد البشرية" loading="lazy" />
                    <div class="shine"></div>
                </div>
                </div>
                <div class="swiper-slide">
                <div class="referenceLogo glass-card">
                    <img src="{{asset('frontend')}}/img/musand.svg" alt="مساند" loading="lazy" />
                    <div class="shine"></div>
                </div>
                </div>
            </div>
            <div class="swiper-pagination mt-5"></div>
            </div>
        </div>
        </section>
    </content>
@endsection
@section('js')
<script>
    $(document).on('submit', 'form#Form', function (e) {
        e.preventDefault();

        let myForm = $("#Form")[0];
        let formData = new FormData(myForm);
        let url = $(this).attr('action');
        let submitBtn = $('#submit_button');

        // Reset errors
        $(myForm).find('.is-invalid').removeClass('is-invalid');
        $(myForm).find('.invalid-feedback').text('');

           const phoneInput = $('#phoneInput');
            const phoneValue = phoneInput.val().trim();
            const phoneRegex = /^(00966|966|\+966)?5[0-9]{8}$/;

            if (!phoneRegex.test(phoneValue)) {
                phoneInput.addClass('is-invalid');
                phoneInput.next('.error-message').text("يرجى إدخال رقم جوال سعودي صحيح يبدأ بـ 5 بدون صفر");
                return;
            } else {
                phoneInput.removeClass('is-invalid');
                phoneInput.next('.invalid-feedback').text('');
            }

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            cache: false,

            beforeSend: function () {
                submitBtn.attr('disabled', true);
                submitBtn.html(`<i class='fa fa-spinner fa-spin'></i> جاري الإرسال...`);
            },

            success: function (response) {

                Swal.fire({
                    title: '🎉 {{ __("frontend.Message Successfully Sent") }}',
                    html: `
                        <div style="display:flex;flex-direction:column;align-items:center;gap:20px">
                            <div id="lottie-success" style="width:140px;height:140px;"></div>
                            <div style="font-size: 16px; font-weight: 500; color: #333;">
                                {{ __("frontend.Thanks ,We will contact you as soon as possible.") }}
                            </div>
                        </div>
                    `,
                    showConfirmButton: true,
                    confirmButtonText: '{{ __("frontend.confirm") }} 🚀',
                    customClass: {
                        popup: 'ultra-glass-popup',
                        confirmButton: 'ultra-btn'
                    },
                    buttonsStyling: false,
                    timer: 6000,
                    timerProgressBar: true,
                    didOpen: () => {
                        lottie.loadAnimation({
                            container: document.getElementById('lottie-success'),
                            renderer: 'svg',
                            loop: false,
                            autoplay: true,
                            path: 'https://assets6.lottiefiles.com/packages/lf20_jbrw3hcz.json' // ✅ Success Lottie
                        });
                    }
                });

                $('#Form')[0].reset();
            },

            error: function (xhr) {
                if (xhr.status === 422 && xhr.responseJSON?.errors) {
                    const errors = xhr.responseJSON.errors;

                    for (const field in errors) {
                        const input = $(`[name="${field}"]`);
                        input.addClass('is-invalid');
                        input.next('.invalid-feedback').text(errors[field][0]);
                    }

                    cuteAlert({
                        title: "خطأ في البيانات",
                        message: "يرجى تصحيح الحقول المطلوبة.",
                        type: "error",
                        buttonText: "حسناً"
                    });
                } else {
                    cuteAlert({
                        title: "خطأ",
                        message: "حدث خطأ غير متوقع، حاول مرة أخرى لاحقاً.",
                        type: "error",
                        buttonText: "حسناً"
                    });
                    console.error("خطأ:", xhr.responseText);
                }
            },

            complete: function () {
                submitBtn.removeAttr('disabled');
                submitBtn.html(`{{__('frontend.Send Message')}} <i class="fas fa-paper-plane ms-2"></i>`);
            }
        });
    });

    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        const charCode = (evt.which) ? evt.which : evt.keyCode;
        return !(charCode > 31 && (charCode < 48 || charCode > 57));
    }
</script>

<script>

    if (typeof Swiper !== 'undefined') {
        new Swiper('.referencesSlider', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 20,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 50,
                },
            },
        });
    }
</script>
@endsection
