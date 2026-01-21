<!doctype html>
<html>

<head>
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
    <script async src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

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
            z-index: 10002;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            gap: 10px;
        }

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

        .square:nth-child(1) { animation-delay: 0s; }
        .square:nth-child(2) { animation-delay: 0.3s; }
        .square:nth-child(3) { animation-delay: 0.6s; }
        .square:nth-child(4) { animation-delay: 0.9s; }
        .square:nth-child(5) { animation-delay: 1.2s; }

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
            background-color: #f4a835 !important;
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

        /*********************************/
        #cityModal {
        position: fixed;
        inset: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        background: rgba(255,255,255,.04);
        z-index: 99999;
        contain: layout paint;
        }
        #cityModal.active {
        backdrop-filter: blur(0.2px);
        -webkit-backdrop-filter: blur(0.2px);
        animation: fadeInBg .4s ease forwards;
        }

        .city-modal-content {
        background: linear-gradient(145deg, #fff, #f8f8f8);
        border-radius: 30px;
        padding: 40px 30px;
        max-width: 520px;
        width: 90%;
        text-align: center;
        box-shadow: 0 8px 40px rgba(0,0,0,.15);
        border: 1px solid rgba(255,136,0,.2);
        transform: translateY(40px);
        opacity: 0;
        will-change: transform, opacity;
        }
        #cityModal.active .city-modal-content {
        transform: translateY(0);
        opacity: 1;
        transition: transform .5s ease, opacity .5s ease;
        }

        .city-modal-content h2 {
        font-size: 1.4rem;
        line-height: 1.8;
        margin-bottom: 30px;
        }
        .city-modal-content h2 span {
        color: #ff8800;
        font-weight: 700;
        }
        .arrow-icon {
        color: #ff8800;
        margin-right: 6px;
        animation: arrowBounce 1.2s infinite;
        }

        .cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: 20px;
        }

        .card {
        height: 120px;
        background: linear-gradient(135deg, #ff9a00, #ffb347, #ff8c00);
        border-radius: 22px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: #fff;
        cursor: pointer;
        font-weight: 600;
        transition: transform .3s ease, box-shadow .3s ease;
        box-shadow: 0 8px 22px rgba(255,136,0,.25);
        }
        .card:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow: 0 15px 35px rgba(255,136,0,.4);
        }
        .card i {
        font-size: 44px;
        margin-bottom: 10px;
        }

        .loader-circle {
        width: 36px;
        height: 36px;
        border: 3px solid rgba(255,136,0,.2);
        border-top-color: #ff8800;
        border-radius: 50%;
        animation: spin .8s linear infinite;
        }

        @keyframes spin { to { transform: rotate(360deg); } }
        @keyframes fadeInBg { from { opacity: 0; } to { opacity: 1; } }
        @keyframes arrowBounce { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-6px); } }

        @media (max-width:600px){
        .card { height: 110px; }
        .city-modal-content { padding: 25px 15px; }
        }
          /* Globe hidden visually but still measurable */
        #globe-container {
        opacity: 0;
        pointer-events: none;
        transition: opacity .6s ease;
        }

        #globe-container.globe-visible {
        opacity: 1;
        pointer-events: auto;
        }

        /* Bubble */
        #saudi-bubble {
        opacity: 0;
        pointer-events: none;
        transition: opacity .4s ease;
        }

        #saudi-bubble.globe-visible {
        opacity: 1;
        }

        /* Hide header until loader finishes */

        .fancybox__container {
            top: 80px !important;
            height: calc(100% - 80px) !important;
        }

        #globe-container {
            min-height: 360px;
        }

        @media (max-width: 768px) {
            #globe-container {
                min-height: 300px;
            }
        }
        @media (max-width: 768px) {
            #saudi-bubble {
                backdrop-filter: none;
            }
        }
    </style>

    <script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

<!-- custom cursor  -->
<div class="customCursor"></div>
<div class="customCursorInner"></div>
<!-- end custom cursor  -->
<!-- loader -->
<div class="loader">
    <img src="{{asset('frontend/img/fav.svg')}}"  alt="">
    <div class="spinner"></div>
</div>
<!--<div class="loader-wrapper" aria-label="لودر لوجو إيجاز">
  <div class="square">إ</div>
  <div class="square">ي</div>
  <div class="square">ج</div>
  <div class="square">ا</div>
  <div class="square">ز</div>
</div>-->
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
        <!--<h2>
        مرحبًا بك في <span>إيجاز للاستقدام</span><br>
        اختر مدينتك لعرض العمالة الأقرب إليك
        <i class="fas fa-arrow-down arrow-icon"></i>
        </h2>-->

        <div class="cards">
        <div class="card" data-branch="jeddah">
            <i class="fas fa-city"></i>
            <span>جدة</span>
        </div>

        <div class="card" data-branch="yanbu">
            <i class="fas fa-water"></i>
            <span>ينبع</span>
        </div>

        <div class="card" data-branch="riyadh">
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
  const globe  = document.getElementById('globe-container');
  const bubble = document.getElementById('saudi-bubble');
  const ramadanDecor = document.querySelectorAll(
    '.ramadan-svg-decor, .ramadan-top-decor'
  );

  if (loader) {
    loader.style.transition = 'opacity 0.3s ease';
    loader.style.opacity = '0';

    setTimeout(() => {
      loader.style.display = 'none';

      // mark page as loaded
      document.body.classList.add('page-loaded');

      // show elements
      ramadanDecor.forEach(el => el.classList.add('ramadan-visible'));
      globe?.classList.add('globe-visible');
      bubble?.classList.add('globe-visible');

    }, 300);
  }

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
                    <a href="mailto::{{$settings->email1}}" target="_blank" >

          <i style="color: white" class="fa-solid fa-envelope"></i>
                         </a>
        </span>

    </div>
</div>
<script>window.$zoho=window.$zoho || {};$zoho.salesiq=$zoho.salesiq||{ready:function(){}}</script><script id="zsiqscript" src="https://salesiq.zohopublic.sa/widget?wc=51e74ff9928005b76e4f348a33431fe4d7a8432cbe57b7d22bdc2cb68a934a6c" defer></script>
</body>
<!--@toastr_render-->
</html>
