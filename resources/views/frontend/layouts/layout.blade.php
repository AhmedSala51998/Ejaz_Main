<!doctype html>
<html>

<head>
    <!-- Hotjar Tracking Code for https://ejazrecruitment.sa/ -->
    <script>
    let hotjarLoaded = false;

    function loadHotjar() {
    if (hotjarLoaded) return;
    hotjarLoaded = true;

    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:4969317,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    }

    window.addEventListener('scroll', loadHotjar, { once: true });
    window.addEventListener('touchstart', loadHotjar, { once: true });
    </script>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!-- Google Search Console Verification -->
    <meta name="google-site-verification" content="z2Gm-stFhrGTfv1vcDS-JOpwMXyfhRk60P0gOVSe92I">
    <title>
        {{$settings->title??"ايجاز"}} - @yield('title')
    </title>

    {{--here we will add --}}
    <!-- icon -->
    @include('frontend.layouts.assets._css')
    @yield('styles')
    <link rel="stylesheet" href="{{asset('frontend/css/layout_style.css')}}" />
    <style>
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

        .ramadan-top-decor {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 180px;
        pointer-events: none;
        z-index: 10001;
        }

        .ramadan-top-decor svg {
        width: 100%;
        height: 100%;
        display: block;
        }

        /* Hide Ramadan decor until loader finishes */
        .ramadan-svg-decor,
        .ramadan-top-decor {
        opacity: 0;
        visibility: hidden;
        transition: opacity .6s ease, visibility .6s ease;
        }

        /* When active */
        .ramadan-visible {
        opacity: 1;
        visibility: visible;
        }

    </style>
</head>

<body>
<!-- RAMADAN BUNTING DECOR -->
<div class="ramadan-top-decor">
  <svg viewBox="0 0 1920 180" preserveAspectRatio="none"
       xmlns="http://www.w3.org/2000/svg">

    <!-- Rope -->
    <path id="rope" d="M0 80 Q960 150 1920 80"
          stroke="#f4b400"
          stroke-width="1"
          fill="none"/>

    <!-- Flags -->
    <g id="flags">
        <polygon fill="#f7c400"/>
        <polygon fill="#4fc3f7"/>
        <polygon fill="#7cb342"/>
        <polygon fill="#f7c400"/>
        <polygon fill="#4fc3f7"/>
        <polygon fill="#7cb342"/>
        <polygon fill="#f7c400"/>
        <polygon fill="#4fc3f7"/>
        <polygon fill="#7cb342"/>
        <polygon fill="#f7c400"/>
        <polygon fill="#4fc3f7"/>
        <polygon fill="#7cb342"/>
        <polygon fill="#f7c400"/>
        <polygon fill="#4fc3f7"/>
        <polygon fill="#7cb342"/>
        <polygon fill="#f7c400"/>
        <polygon fill="#4fc3f7"/>
        <polygon fill="#7cb342"/>
    </g>

    <!-- Stars -->
    <g fill="#f7c400">
      <circle cx="350" cy="55" r="4"/>
      <circle cx="520" cy="45" r="3"/>
      <circle cx="690" cy="55" r="4"/>
      <circle cx="860" cy="45" r="3"/>
      <circle cx="1030" cy="55" r="4"/>
      <circle cx="1200" cy="45" r="3"/>
      <circle cx="1370" cy="55" r="4"/>
    </g>

  </svg>
</div>
<!-- RAMADAN DECOR -->
<div class="ramadan-svg-decor">

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
<div class="loader">
    <img src="{{asset('frontend/img/fav.svg')}}"  alt="">
    <div class="spinner"></div>
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

    <!-- ======= City Modal ======= -->
    <div id="cityModal" hidden>
    <div class="city-modal-content">
        <div class="cards">
        <div class="card" data-branch="jeddah">
            <i style="font-size:44px !important" class="fas fa-city"></i>
            <span>جدة</span>
        </div>

        <div class="card" data-branch="yanbu">
            <i style="font-size:44px !important" class="fas fa-water"></i>
            <span>ينبع</span>
        </div>

        <div class="card" data-branch="riyadh">
            <i style="font-size:44px !important" class="fas fa-building"></i>
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
<script>
(() => {

    const modal = document.getElementById('cityModal');
    if (!modal) return;

    const setCookie = (n,v) =>
        document.cookie = `${n}=${v}; path=/; expires=Fri, 31 Dec 2099 23:59:59 GMT`;

    const getCookie = n =>
        document.cookie.match('(^|;)\\s*' + n + '\\s*=\\s*([^;]+)')?.pop() || null;

    const showModal = () => {
        modal.hidden = false;
        document.body.style.pointerEvents = 'none';
        modal.style.pointerEvents = 'auto';

        requestAnimationFrame(() => {
            modal.classList.add('active');
        });

        fixZohoChat();
    };

    const fixZohoChat = () => {
        const selectors = [
            '#zsiq_float',
            '#zsiq_widget',
            '.zsiq_flt_rel',
            '[id^="zsiq_"]'
        ];

        let tries = 0;
        const interval = setInterval(() => {
            tries++;
            selectors.forEach(sel => {
                document.querySelectorAll(sel).forEach(el => {
                    el.style.pointerEvents = 'auto';
                });
            });

            if (document.querySelector('#zsiq_float') || tries > 10) {
                clearInterval(interval);
            }
        }, 400);
    };

    const branch = localStorage.getItem('branch') || getCookie('branch');

    if (!branch) {
        if ('requestIdleCallback' in window) {
            requestIdleCallback(showModal, { timeout: 1200 });
        } else {
            setTimeout(showModal, 300);
        }
    }

    modal.addEventListener('click', e => {
        const card = e.target.closest('.card');
        if (!card) return;

        const branch = card.dataset.branch;

        modal.querySelectorAll('.card').forEach(c => c.style.pointerEvents = 'none');
        card.innerHTML = '<div class="loader-circle"></div>';

        localStorage.setItem('branch', branch);
        setCookie('branch', branch);

        requestIdleCallback(() => {
            axios.post('{{ route("detect.location.ajax") }}', { branch }, {
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            }).finally(() => location.reload());
        });
    });

})();
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
<div class="floating-container">
    <div class="floating-button"><i class="fa-solid fa-headset"></i></div>
    <div class="element-container">

        <a  href="tel:{{$settings->callNumber}}" target="_blank">
          <span class="float-element tooltip-left">
              <i class="fa-solid fa-phone"></i>
          </span>
        </a>

         <span class="float-element">
             <a  href="https://api.whatsapp.com/send?phone={{$settings->whatsappNumber}}" target="_blank">
          <i style="color: white" class="fa-brands fa-whatsapp"></i>
                  </a>
         </span>

        <span class="float-element">
            <a href="mailto:{{$settings->email1}}" target="_blank">
                <i style="color: white" class="fa-solid fa-envelope"></i>
            </a>
        </span>

    </div>
</div>
<script>
const rope = document.getElementById('rope');
const flags = document.querySelectorAll('#flags polygon');
const positionsX = [300,380,460,540,620,700,780,860,940,1020,1100,1180,1260,1340,1420,1500,1580,1660];
const baseOffset = 50;

flags.forEach((flag, i) => {
  const x = positionsX[i];
  const pathLength = rope.getTotalLength();
  const point = rope.getPointAtLength((x / 1920) * pathLength);
  const y = point.y;

  const points = `${x-20},${y} ${x+20},${y} ${x},${y+baseOffset}`;
  flag.setAttribute('points', points);

  const angle = 2 + Math.random()*1.5;
  const duration = 2 + Math.random()*1;
  flag.style.transformOrigin = `${x}px ${y}px`;
  flag.style.animation = `flutter${i} ${duration}s ease-in-out infinite alternate`;

  const style = document.createElement('style');
  style.innerHTML = `
    @keyframes flutter${i} {
      0% { transform: rotate(${-angle}deg); }
      50% { transform: rotate(${angle}deg); }
      100% { transform: rotate(${-angle}deg); }
    }
  `;
  document.head.appendChild(style);
});
</script>
<script>
(function () {

  let zohoLoaded = false;

  function loadZoho() {
    if (zohoLoaded) return;
    zohoLoaded = true;

    window.$zoho = window.$zoho || {};
    window.$zoho.salesiq = window.$zoho.salesiq || {
      ready: function () {}
    };

    const s = document.createElement('script');
    s.id = 'zsiqscript';
    s.src = 'https://salesiq.zohopublic.sa/widget?wc=51e74ff9928005b76e4f348a33431fe4d7a8432cbe57b7d22bdc2cb68a934a6c';
    s.defer = true;

    document.body.appendChild(s);
  }

  window.addEventListener('scroll', loadZoho, { once: true, passive: true });
  window.addEventListener('touchstart', loadZoho, { once: true, passive: true });
  window.addEventListener('mousemove', loadZoho, { once: true });

})();
</script>
</body>
</html>
