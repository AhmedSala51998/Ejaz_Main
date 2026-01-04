<!doctype html>
<html>

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NTCLJLMES5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-NTCLJLMES5');
    </script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-DXNLF389JY"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-DXNLF389JY');
    </script>
    <!-- Hotjar Tracking Code for https://ejazrecruitment.sa/ -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:4969317,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
    // --- Helpers ---
    function setCookie(name, value) {
        const expires = new Date('2090-12-31T23:59:59Z').toUTCString();
        document.cookie = `${name}=${value}; path=/; expires=${expires}`;
    }

    function getCookie(name) {
        const v = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)') || [];
        return v[2] || null;
    }

    // --- اختيار المدينة ---
    /*function chooseCity(branch) {
        localStorage.setItem('branch', branch);
        setCookie('branch', branch);
        document.getElementById('cityModal').style.display = 'none';

        axios.post('{{ route("detect.location.ajax") }}', { branch }, {
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
        }).finally(() => {
            location.reload();
        });
    }*/
    function chooseCity(element, branch) {
        const cards = document.querySelectorAll('.card');
        cards.forEach(c => c.style.pointerEvents = 'none');

        const oldHTML = element.innerHTML;

        element.innerHTML = '';

        const loader = document.createElement('div');
        loader.className = 'loader-circle';
        element.appendChild(loader);

        element.style.opacity = '0.8';

        localStorage.setItem('branch', branch);
        setCookie('branch', branch);

        axios.post('{{ route("detect.location.ajax") }}', { branch }, {
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
        })
        .then(res => {
            console.log('✅ تم اختيار المدينة:', branch);
        })
        .catch(err => {
            console.error('❌ خطأ أثناء إرسال الطلب:', err);
        })
        .finally(() => {
            document.getElementById('cityModal').style.display = 'none';
            location.reload();
        });
    }

    function detectLocation() {
        const btn = document.querySelector('.location');
        const icon = btn.querySelector('i');
        const text = btn.querySelector('span');

        icon.style.display = 'none';
        text.textContent = 'جارٍ تحديد موقعك...';
        const loader = document.createElement('div');
        loader.className = 'loader-circle';
        btn.appendChild(loader);

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                pos => sendCoords(pos.coords.latitude, pos.coords.longitude, btn, loader, icon, text),
                err => fallbackLocation(btn, loader, icon, text),
                { enableHighAccuracy: true, timeout: 15000 }
            );
        } else fallbackLocation(btn, loader, icon, text);
    }

    function sendCoords(lat, lng, btn, loader, icon, text) {
        axios.post('{{ route("detect.location.ajax") }}', { lat, lng }, {
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
        }).then(res => {
            const closestCity = res.data.closestCity;
            localStorage.setItem('branch', closestCity);
            setCookie('branch', closestCity);
            document.getElementById('cityModal').style.display = 'none';
            location.reload();
        }).catch(() => fallbackLocation(btn, loader, icon, text));
    }

    function fallbackLocation(btn, loader, icon, text) {
        if (loader) loader.remove();
        icon.style.display = 'block';
        text.textContent = 'استكشف موقعي';
        chooseCity('yanbu');
    }

    /*document.addEventListener('DOMContentLoaded', () => {
        const branch = localStorage.getItem('branch') || getCookie('branch');
        if (!branch) {
            document.getElementById('cityModal').style.display = 'flex';
            document.body.style.pointerEvents = 'none';
            document.getElementById('cityModal').style.pointerEvents = 'auto';
        }
    });*/
    document.addEventListener('DOMContentLoaded', () => {
        const branch = localStorage.getItem('branch');
        const cookieBranch = getCookie('branch');

        if (!branch) {
            document.getElementById('cityModal').style.display = 'flex';
            document.body.style.pointerEvents = 'none';
            document.getElementById('cityModal').style.pointerEvents = 'auto';
        } else {

            if (branch !== cookieBranch) {
                localStorage.setItem('branch', cookieBranch);
            }
        }
    });

        document.addEventListener('DOMContentLoaded', () => {
        const branch = localStorage.getItem('branch') || getCookie('branch');
        if (!branch) {
            const cityModal = document.getElementById('cityModal');
            document.body.style.pointerEvents = 'none';
            cityModal.style.display = 'flex';
            cityModal.style.pointerEvents = 'auto';

            const chatSelectors = [
                '#zsiq_float',
                '#zsiq_widget',
                '.zsiq_flt_rel',
                '[id^="zsiq_"]'
            ];

            const allowPointerEventsForChat = () => {
                chatSelectors.forEach(sel => {
                    document.querySelectorAll(sel).forEach(el => {
                        el.style.pointerEvents = 'auto';
                    });
                });
            };

            const chatFixInterval = setInterval(() => {
                allowPointerEventsForChat();
                if (document.querySelector('#zsiq_float')) {
                    clearInterval(chatFixInterval);
                }
            }, 1000);
        }
    });

    </script>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>
        {{$settings->title??"ايجاز"}} - @yield('title')
    </title>

    {{--here we will add --}}
    <!-- icon -->
    @include('frontend.layouts.assets._css')
    <link rel="stylesheet" media="all" href="{{asset('frontend')}}/cute-alert-master/style.css"/>
    @yield('styles')

    <style>
        @keyframes placeHolderShimmer {
            0% {
                background-position: -468px 0
            }
            100% {
                background-position: 468px 0
            }
        }

        .linear-background {
            animation-duration: 1s;
            animation-fill-mode: forwards;
            animation-iteration-count: infinite;
            animation-name: placeHolderShimmer;
            animation-timing-function: linear;
            background: #f6f7f8;
            background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
            background-size: 1000px 104px;
            height: 338px;
            position: relative;
            overflow: hidden;
            border-radius: 16px;

        }


        .linear-background2 {
            animation-duration: 1s;
            animation-fill-mode: forwards;
            animation-iteration-count: infinite;
            animation-name: placeHolderShimmer;
            animation-timing-function: linear;
            background: #f6f7f8;
            background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
            background-size: 1000px 104px;
            height: 600px;
            position: relative;
            overflow: hidden;
            border-radius: 16px;

        }

        .linear-background3 {
            animation-duration: 1s;
            animation-fill-mode: forwards;
            animation-iteration-count: infinite;
            animation-name: placeHolderShimmer;
            animation-timing-function: linear;
            background: #f6f7f8;
            background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
            background-size: 1000px 104px;
            height: 600px;
            position: relative;
            overflow: hidden;
            border-radius: 16px;
        }

        /* Loader */
        .loader-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: #fffefc;
            z-index: 9999;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            gap: 10px;
        }

        /* مربعات اللوجو */
        .square {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #f4a835, #e67e22);
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(244, 168, 53, 0.7);
            animation: pulseMove 2.4s ease-in-out infinite;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-weight: 900;
            font-size: 48px;
            user-select: none;
            cursor: default;
        }

        /* تأخيرات متتابعة لكل مربع */
        .square:nth-child(1) { animation-delay: 0s; }
        .square:nth-child(2) { animation-delay: 0.3s; }
        .square:nth-child(3) { animation-delay: 0.6s; }
        .square:nth-child(4) { animation-delay: 0.9s; }
        .square:nth-child(5) { animation-delay: 1.2s; }

        /* حركة النبض والتباعد */
        @keyframes pulseMove {
            0%, 100% {
            transform: translateY(0) scale(1);
            box-shadow: 0 4px 12px rgba(244, 168, 53, 0.7);
            opacity: 1;
            }
            50% {
            transform: translateY(-15px) scale(1.15);
            box-shadow: 0 8px 25px rgba(244, 168, 53, 1);
            opacity: 0.85;
            }
        }

        .cute-alert .alert-container.success {
            background-color: #f4a835 !important; /* برتقالي */
            color: #fff !important;
        }

        .cute-alert .alert-title {
            color: #fff !important;
        }

        .cute-alert .alert-button {
            background-color: #fff !important;
            color: #f4a835 !important;
            border-radius: 10px;
        }

        /*********************/
        #cityModal {
            position: fixed;
            inset: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(0.5px);
            -webkit-backdrop-filter: blur(0.5px);
            z-index: 99999;
            animation: fadeInBg 0.6s ease forwards;
            }

            /* محتوى المودال */
            .city-modal-content {
            background: linear-gradient(145deg, #fff, #f8f8f8);
            border-radius: 30px;
            padding: 40px 30px;
            text-align: center;
            color: #333;
            width: 90%;
            max-width: 520px;
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 136, 0, 0.2);
            animation: modalSlideIn 0.7s ease forwards;
            position: relative;
            overflow: hidden;
            }

            /* تأثير خفيف من الأعلى */
            .city-modal-content::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at center, rgba(255,136,0,0.08), transparent 60%);
            transform: rotate(25deg);
            z-index: 0;
            }

            /* العنوان */
            .city-modal-content h2 {
            font-size: 1.4rem;
            margin-bottom: 30px;
            color: #222;
            line-height: 1.8;
            font-weight: 600;
            position: relative;
            z-index: 1;
            }
            .city-modal-content h2 span {
            color: #ff8800;
            font-weight: 700;
            }

            /* السهم المتحرك */
            .arrow-icon {
            color: #ff8800;
            font-size: 20px;
            margin-left: 8px;
            animation: arrowBounce 1.2s infinite;
            display: inline-block;
            }
            @keyframes arrowBounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
            }

            /* شبكة الكروت */
            .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 22px;
            justify-items: center;
            z-index: 1;
            position: relative;
            }

            /* تصميم الكرت */
            .card {
            width: 170px;
            height: 130px;
            background: linear-gradient(135deg, #ff9a00, #ffb347, #ff8c00);
            border-radius: 22px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-weight: 600;
            text-align: center;
            cursor: pointer;
            transition: all 0.4s ease;
            box-shadow: 0 8px 22px rgba(255,136,0,0.25);
            position: relative;
            overflow: hidden;
            }
            .card::after {
            content: "";
            position: absolute;
            top: 0;
            left: -75%;
            width: 50%;
            height: 100%;
            background: rgba(255,255,255,0.15);
            transform: skewX(-25deg);
            transition: left 0.5s ease;
            }
            .card:hover::after {
            left: 125%;
            }

            /* تأثير التحويم */
            .card:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 15px 35px rgba(255,136,0,0.4);
            }

            /* الأيقونات */
            .card i {
            font-size: 48px;
            margin-bottom: 10px;
            transition: transform 0.5s ease;
            }
            .card:hover i {
            transform: scale(1.15);
            }

            /* الموقع */
            .location-icon {
            animation: bounce 1.5s infinite;
            }
            @keyframes bounce {
            0%,100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
            }

            /* Responsive */
            @media (max-width: 600px) {
            .card {
                width: 150px;
                height: 115px;
            }
            .city-modal-content {
                padding: 25px 15px;
            }
            }

            /* أنيميشن الظهور */
            @keyframes fadeInBg {
            from { opacity: 0; }
            to { opacity: 1; }
            }
            @keyframes modalSlideIn {
            from { transform: translateY(40px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
            }
      /*.loader-circle {
        border: 4px solid rgba(255, 136, 0, 0.2);
        border-top: 4px solid #ff8800;
        border-radius: 50%;
        width: 36px;
        height: 36px;
        animation: spin 1s linear infinite;
        margin-top: 8px;
        }

        @keyframes spin {
        to { transform: rotate(360deg); }
        }*/

        /* شبكة الكروت الافتراضية */
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 22px;
            justify-items: center;
            z-index: 1;
            position: relative;
        }

        /* Responsive: على الشاشات الصغيرة بوكسين في الصف */
        @media (max-width: 600px) {
            .cards {
                grid-template-columns: repeat(2, 1fr); /* 2 كرت في الصف */
                gap: 15px;
            }
            .card {
                width: 100%; /* يملأ العمود */
                height: 115px;
            }
            .city-modal-content {
                padding: 25px 15px;
            }
        }
        .loader-circle {
            border: 4px solid rgba(255, 136, 0, 0.2);
            border-top: 4px solid #ff8800;
            border-radius: 50%;
            width: 38px;
            height: 38px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

            @keyframes spin {
            to { transform: rotate(360deg); }
        }




        /* ===== RAMADAN DECOR ===== */
        .ramadan-svg-decor{
        position: fixed;
        top: 85px;
        left: 0;
        width: 100%;
        height: 200px;
        pointer-events: none;
        z-index: 100000;
        }

        /* Lanterns */
        .lantern{
        position: absolute;
        top: 0;
        width: 85px;
        transform-origin: top center;
        animation: swing 4s ease-in-out infinite;
        filter: drop-shadow(0 10px 22px rgba(244,168,53,.45));
        }

        .lantern.left{ left: 25px; }
        .lantern.right{ right: 25px; animation-delay:2s; }

        @keyframes swing{
        0%,100%{ transform: rotate(3deg); }
        50%{ transform: rotate(-3deg); }
        }

        /* Moon */
        .moon{
        position: absolute;
        top: 40px;
        left: 50%;
        width: 80px;
        transform: translateX(-50%);
        animation: moonFloat 6s ease-in-out infinite;
        }

        @keyframes moonFloat{
        0%,100%{ transform: translate(-50%,0); }
        50%{ transform: translate(-50%,-10px); }
        }

        /* Stars */
        .star {
        position: absolute;
        width: 8px;
        height: 8px;
        transform-origin: center;
        opacity: 0;
        animation: fall 6s linear infinite, twinkle 1.6s ease-in-out infinite;
        }

        @keyframes fall {
        0% {
            transform: translateY(-60px) scale(0.5);
            opacity: 0;
        }
        15% {
            opacity: 1;
        }
        70% {
            opacity: 1;
        }
        100% {
            transform: translateY(180px) scale(0.3);
            opacity: 0;
        }
        }

        @keyframes twinkle {
        0%, 100% {
            opacity: 0.4;
            transform: scale(0.9);
        }
        50% {
            opacity: 1;
            transform: scale(1.8);
        }
        }

        /* Responsive */
        @media(max-width:768px){
        .lantern{ width:60px; }
        .moon{ width:55px; }
        }

    </style>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11543933560">
    </script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'AW-11543933560');
    </script>

</head>

<body>
<!-- RAMADAN DECOR -->
<div class="ramadan-svg-decor">

  <div class="stars"></div>

  <svg class="lantern left" viewBox="0 0 160 260" xmlns="http://www.w3.org/2000/svg">
    <line x1="80" y1="0" x2="80" y2="35" stroke="#9c6a1a" stroke-width="4"/>
    <path d="M55 35 L105 35 L120 60 H40 Z" fill="#e0a83a" stroke="#b17819" stroke-width="3"/>
    <path d="M35 60 Q80 35 125 60 V165 Q80 195 35 165 Z"
          fill="#f4a835" stroke="#b17819" stroke-width="4"/>
    <path d="M55 75 Q80 60 105 75 V150 Q80 165 55 150 Z"
          fill="#fff1c1" opacity=".9"/>
    <path d="M35 80 Q50 70 65 80 V145 Q50 155 35 145 Z"
          fill="#ffd27d" opacity=".85"/>
    <path d="M95 80 Q110 70 125 80 V145 Q110 155 95 145 Z"
          fill="#ffd27d" opacity=".85"/>
    <path d="M45 165 H115 L100 195 H60 Z"
          fill="#e0a83a" stroke="#b17819" stroke-width="3"/>
  </svg>

  <svg class="moon" viewBox="0 0 120 120">
    <defs>
      <radialGradient id="moonGlow">
        <stop offset="0%" stop-color="#fff7d6"/>
        <stop offset="100%" stop-color="#f4a835"/>
      </radialGradient>
    </defs>
    <circle cx="60" cy="60" r="40" fill="url(#moonGlow)"/>
    <!--<circle cx="72" cy="52" r="40" fill="#ffffff"/>-->
  </svg>

  <svg class="lantern right" viewBox="0 0 160 260" xmlns="http://www.w3.org/2000/svg">
    <line x1="80" y1="0" x2="80" y2="35" stroke="#9c6a1a" stroke-width="4"/>
    <path d="M55 35 L105 35 L120 60 H40 Z" fill="#e0a83a" stroke="#b17819" stroke-width="3"/>
    <path d="M35 60 Q80 35 125 60 V165 Q80 195 35 165 Z"
          fill="#f4a835" stroke="#b17819" stroke-width="4"/>
    <path d="M55 75 Q80 60 105 75 V150 Q80 165 55 150 Z"
          fill="#fff1c1" opacity=".9"/>
    <path d="M35 80 Q50 70 65 80 V145 Q50 155 35 145 Z"
          fill="#ffd27d" opacity=".85"/>
    <path d="M95 80 Q110 70 125 80 V145 Q110 155 95 145 Z"
          fill="#ffd27d" opacity=".85"/>
    <path d="M45 165 H115 L100 195 H60 Z"
          fill="#e0a83a" stroke="#b17819" stroke-width="3"/>
  </svg>

</div>
<!-- custom cursor  -->
<div class="customCursor"></div>
<div class="customCursorInner"></div>
<!-- end custom cursor  -->
<!-- loader -->
<!--<div class="loader">
    <img src="{{asset('frontend/img/fav.svg')}}"  alt="">
    <div class="spinner"></div>
</div>-->
<div class="loader-wrapper" aria-label="لودر لوجو إيجاز">
  <div class="square">إ</div>
  <div class="square">ي</div>
  <div class="square">ج</div>
  <div class="square">ا</div>
  <div class="square">ز</div>
</div>
<!-- ================ Header ================= -->
@include('frontend.layouts.inc._header')
<!-- ================ /Header ================= -->
<!--(((((((((((((((((((((((()))))))))))))))))))))))-->
<!--((((((((((((((((((( content )))))))))))))))))))-->
<!--(((((((((((((((((((((((()))))))))))))))))))))))-->
<content>

    @yield('content')

    <div class="modal fade cvModal" id="showDetails" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" id="CVHere">

            </div>
        </div>
    </div>
    <!--<div id="cityModal" style="display:none;">
    <div class="city-modal-content">
        <h2>
        مرحبًا بك في <span>إيجاز للاستقدام</span><br>
        اختر مدينتك لعرض العمالة الأقرب إليك
        <i class="fas fa-arrow-down arrow-icon"></i>
        </h2>

        <div class="cards">
        <div class="card" onclick="chooseCity('jeddah')">
            <i class="fas fa-city"></i>
            <span>جدة</span>
        </div>

        <div class="card" onclick="chooseCity('yanbu')">
            <i class="fas fa-water"></i>
            <span>ينبع</span>
        </div>

        <div class="card" onclick="chooseCity('riyadh')">
            <i class="fas fa-building"></i>
            <span>الرياض</span>
        </div>

        <div class="card location" onclick="detectLocation()">
            <i class="fas fa-map-marker-alt location-icon"></i>
            <span>استكشف موقعي</span>
        </div>
        </div>
    </div>
    </div>-->

    <div id="cityModal" style="display:none;">
        <div class="city-modal-content">
            <h2>
            مرحبًا بك في <span>إيجاز للاستقدام</span><br>
            اختر مدينتك لعرض العمالة الأقرب إليك
            <i class="fas fa-arrow-down arrow-icon"></i>
            </h2>

            <div class="cards">
            <div class="card" onclick="chooseCity(this, 'jeddah')">
                <i class="fas fa-city"></i>
                <span>جدة</span>
            </div>

            <div class="card" onclick="chooseCity(this, 'yanbu')">
                <i class="fas fa-water"></i>
                <span>ينبع</span>
            </div>

            <div class="card" onclick="chooseCity(this, 'riyadh')">
                <i class="fas fa-building"></i>
                <span>الرياض</span>
            </div>
            </div>
        </div>
    </div>


</content>
<!--(((((((((((((((((((((((()))))))))))))))))))))))-->
<!--((((((((((((((((( / content )))))))))))))))))))-->
<!--(((((((((((((((((((((((()))))))))))))))))))))))-->
<!-- ================ Footer ================= -->
@include('frontend.layouts.inc._footer')
<!-- ================ /Footer ================= -->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--/////////////////////////////JavaScript/////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
@include('frontend.layouts.assets._js')

<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@yield('js')

<audio id="successSound" src="https://assets.mixkit.co/sfx/preview/mixkit-correct-answer-tone-2870.mp3" preload="auto"></audio>
<script>

    var cv_loader = ` <div class="linear-background"></div>`;


    $(document).on('click', '.cvDetails', function (e) {
        e.preventDefault()
        var id = $(this).attr('attr-id');
        var url = '{{route('front.show-worker-details',":id")}}';
        url = url.replace(':id', id);

        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function () {
                $("#CVHere").html(cv_loader)
                $('#showDetails').modal('show')
                //$(".spinner").show()
            },
            success: function (data) {
                //$(".spinner").hide()
                window.setTimeout(function () {
                    $('#CVHere').html(data.html);
                }, 1000);
                new Swiper(".workerCvSlider", {
                    spaceBetween: 0,
                    centeredSlides: true,
                    // loop: true,
                    speed: 1000,
                    pagination: {
                        el: ".workerCvSliderpagination",
                        clickable: true,
                    },
                    keyboard: {
                        enabled: true,
                    },
                    navigation: {
                        nextEl: ".workerCvSliderNext",
                        prevEl: ".workerCvSliderPrev",
                    },
                });
            },
            error: function (data) {
                $('#showDetails').modal('hide')
                alert('{{__('frontend.errorTitleAuth')}}')
            }
        });

    });

    $(document).on('click', '.Recruitment_Request', function (e) {
        e.preventDefault()
        var ob = $(this)
        var id = $(this).attr('attr-id');
        var url = '{{route('front.completeTheRecruitmentRequest',":id")}}';

        var customer_support = $("#customerSupport .customerSupport:checked").val()
        @if(auth()->check())
        if (customer_support == '' || customer_support == null) {
            cuteToast({
                type: "warning", // or 'info', 'error', 'warning'
                message: "{{__('frontend.please Select From Customer Support')}}",
                timer: 3000
            })
            return 0;
        }
        url = url.replace(':id', id) + "?customerSupport=" + customer_support;
        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function () {
                ob.attr('disabled', true)
                ob.html(`<i class='fa fa-spinner fa-spin '></i>`)
            },
            success: function (data) {
                ob.attr('disabled', false)
                ob.html(`{{__('frontend.Recruitment Request')}} <i class="fa-solid fa-briefcase ms-2"></i>`);

                let orderCode = data.order_code || '';
                                // تشغيل صوت النجاح
                let sound = document.getElementById('successSound');
                if (sound) sound.play();

                Swal.fire({
                    title: '<span style="color:#f4a835; font-weight:bold;">🎉 {{__('frontend.Congratulation')}}</span>',
                    html: `
                        <div style="font-size: 1.1rem; color:#333; margin-bottom: 10px;">
                            {{__('frontend.Thanks ,We will contact you as soon as possible.')}}
                        </div>
                        <div style="background:#fff7e6; border:2px dashed #f4a835; border-radius:10px; padding:10px 15px; margin-top:10px;">
                            <strong style="font-size: 1.2rem; color:#d48806;">رقم الطلب:</strong>
                            <span style="font-size: 1.2rem; font-weight:bold; color:#333;">${orderCode}</span>
                        </div>
                    `,
                    icon: 'success',
                    confirmButtonText: '{{__('frontend.ok')}}',
                    confirmButtonColor: '#f4a835',
                    background: '#fffefc',
                    customClass: {
                        popup: 'rounded-4 shadow-lg p-3',
                        confirmButton: 'rounded-pill px-5 py-2'
                    }
                }).then(() => {
                    location.replace("{{route('auth.profile')}}");
                });
            },
            error: function (data) {
                ob.html(`{{__('frontend.Recruitment Request')}}
                <i class="fa-solid fa-briefcase ms-2"></i>`)
                if (data.status === 400) {
                    cuteToast({
                        type: "warning", // or 'info', 'error', 'warning'
                        message: "{{__('frontend.this worker had reserved')}}",
                        timer: 3000
                    })
                }

                if (data.status === 500) {
                    cuteToast({
                        type: "error", // or 'info', 'error', 'warning'
                        message: "{{__('frontend.there ar an error')}}",
                        timer: 3000
                    })
                }
            }
        });


        @else
        {{--cuteAlert({--}}
        {{--    type: "question",--}}
        {{--    title: "{{__('frontend.AlertNotificationForAuth')}}",--}}
        {{--    message: "{{__('frontend.AlertMessageForAuthComplete')}}",--}}
        {{--    confirmText: "{{__('frontend.Login')}}",--}}
        {{--    cancelText: "{{__('admin.cancel')}}"--}}
        {{--}).then((e)=>{--}}
        {{--    if ( e == 'confirm'){--}}
        {{--        location.replace("{{route('auth.login')}}")--}}
        {{--    }--}}
        {{--})--}}

        var url = "{{route('register',':id')}}";
        url = url.replace(':id', id);
        location.replace(url);

        @endif


    });
</script>

@if(LaravelLocalization::getCurrentLocale() == 'ar')
    <script src="{{asset('frontend/jQuery-Form-Validator/form-validator/lang/ar.js')}}"></script>
@else
    <script src="{{asset('frontend/jQuery-Form-Validator/form-validator/jquery.form-validator.js')}}"></script>
@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
<script src="{{asset('frontend')}}/cute-alert-master/cute-alert.js"></script>

<script>
    $.validate({
        ignore: 'input[type=hidden]',
        modules: 'date, security',
        lang: "{{ LaravelLocalization::getCurrentLocale() }}",
    });

</script>
<script>
  window.addEventListener('load', () => {
    const loader = document.querySelector('.loader-wrapper');
    if(loader){
        loader.style.transition = 'opacity 0.3s ease';
        loader.style.opacity = '0';
        setTimeout(() => {
        loader.style.display = 'none';
        }, 300);
    }
  });
</script>

<script>
    $(document).on('click', '.ignoreHref', function (e) {
        e.preventDefault();
    })
</script>
{{--<script>--}}
{{--    window.addEventListener("load", () => {--}}
{{--        if ("serviceWorker" in navigator) {--}}
{{--            navigator.serviceWorker.register("service-worker.js");--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="floating-container">
    <div class="floating-button"><i class="material-icons">headset_mic</i></div>
    <div class="element-container">

        <a  href="tel:{{$settings->callNumber}}" target="_blank">
          <span class="float-element tooltip-left">
              <i class="material-icons">phone
              </i>
          </span>
        </a>

         <span class="float-element">
             <a  href="https://api.whatsapp.com/send?phone={{$settings->whatsappNumber}}" target="_blank">
          <i style="color: white" class="material-icons">chat
          </i>
                  </a>
         </span>

        <span class="float-element">
                    <a href="mailto::{{$settings->email1}}" target="_blank" >

          <i style="color: white" class="material-icons">mail</i>
                         </a>
        </span>

    </div>
</div>
<script>
const starsBox = document.querySelector('.stars');

if(starsBox){
  for(let i=0;i<45;i++){
    const star = document.createElementNS("http://www.w3.org/2000/svg", "svg");
    star.setAttribute("viewBox", "0 0 24 24");
    star.setAttribute("width", "8");
    star.setAttribute("height", "8");
    star.classList.add('star');

    star.style.left = Math.random() * 100 + '%';
    star.style.top  = Math.random() * 30 + 'px';

    star.style.animationDelay =
      Math.random()*6 + 's, ' +
      Math.random()*2 + 's';

    star.innerHTML = `
      <polygon points="12,2 15,10 24,10 17,15 19,24 12,19 5,24 7,15 0,10 9,10"
        fill="gold" stroke="orange" stroke-width="0.5"/>
    `;
    starsBox.appendChild(star);
  }
}
</script>
<script>window.$zoho=window.$zoho || {};$zoho.salesiq=$zoho.salesiq||{ready:function(){}}</script><script id="zsiqscript" src="https://salesiq.zohopublic.sa/widget?wc=51e74ff9928005b76e4f348a33431fe4d7a8432cbe57b7d22bdc2cb68a934a6c" defer></script>
</body>
<!--@toastr_render-->
</html>
