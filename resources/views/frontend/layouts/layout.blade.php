<!doctype html>
<html lang="ar">

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

    <!-- Meta Description (SEO) -->
    <meta name="description" content="@yield('meta_description', 'إيجاز للاستقدام شركة متخصصة في استقدام العمالة المنزلية داخل المملكة العربية السعودية، نوفر كوادر مدرّبة بإجراءات سريعة وخدمة موثوقة في جدة والرياض وينبع.')">

    {{--here we will add --}}
    <!-- icon -->
    @include('frontend.layouts.assets._css')
    @yield('styles')
    <link rel="stylesheet" href="{{asset('frontend/css/layout_style.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/ramadan_layout_style.css')}}" />
</head>

<body>
<!-- ================ Ramadan Decoration ================= -->
@include('frontend.layouts.ramadan_decor.ramadan_decoration')
<!-- ================ /Ramadan Decoration ================= -->
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

        <a  href="tel:{{$settings->callNumber}}" target="_blank" aria-label="اتصل بنا">
          <span class="float-element tooltip-left">
              <i class="fa-solid fa-phone"></i>
          </span>
        </a>

         <span class="float-element">
             <a  href="https://api.whatsapp.com/send?phone={{$settings->whatsappNumber}}" target="_blank" aria-label="أرسل رسالة واتساب">
          <i style="color: white" class="fa-brands fa-whatsapp"></i>
                  </a>
         </span>

        <span class="float-element">
            <a href="mailto:{{$settings->email1}}" target="_blank" aria-label="أرسل بريد إلكتروني">
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
</body>
</html>
