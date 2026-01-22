<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/js/popper.min.js')}}" defer></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}" defer></script>
<script src="{{asset('frontend/js/select2.min.js')}}" defer></script>
<script src="{{asset('frontend/js/jquery.appear.js')}}" defer></script>
<script src="{{asset('frontend/js/aos.js')}}" defer></script>
<script src="{{asset('frontend/js/app.js')}}" defer></script>
<script src="{{asset('frontend/js/Custom.js')}}"></script>

<script src="{{asset('frontend/backEndFiles/validation/jquery.form-validator.js')}}"></script>
<script src="{{asset('frontend/backEndFiles/validation/toastr.min.js')}}"></script>
<script src="{{asset('frontend/backEndFiles/axios.min.js')}}"></script>
<script src="{{asset('frontend/backEndFiles/sweetalert/sweetalert.min.js')}}"></script>

@if(Route::is('home'))
<script src="{{asset('frontend/js/odometer.min.js')}}" defer></script>
<script src="{{asset('frontend/js/intro.js')}}" defer></script>
<script src="{{asset('frontend/js/wow.js')}}" defer></script>
<script src="{{asset('frontend/js/particles.js')}}" defer></script>
<script src="{{asset('frontend/js/dropify.min.js')}}" defer></script>
@endif

<script>
document.addEventListener('DOMContentLoaded', function() {
    // side menu
    $(function () {
        $('.sideBtn').on('click', function () {
            $(this).toggleClass('active');
            $('.sideMenu').toggleClass('active');
        });
    });

    // goBack
    function goBack() { window.history.back(); }

    // input number validation
    $(document).on('keyup','.numbersOnly',function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });

    // online/offline alert
    window.addEventListener('online', () => alertify.success('عادت خدمة الانترنت !'));
    window.addEventListener('offline', () => alertify.error('لا يوجد خدمة انترنت !'));
});

</script>
<script>
window.addEventListener('load', function () {
    if (window.jQuery && $.fn.select2) {
        $('.select2').select2({
            dir: 'rtl',
            width: '100%'
        });
    }
});
</script>
<script>
document.addEventListener('click', function(e){
    if (e.target.closest('[data-fancybox]')) {
        if (!window.Fancybox) {
            const s = document.createElement('script');
            s.src = "{{ asset('frontend/js/jquery.fancybox.min.js') }}";
            s.onload = () => Fancybox.bind("[data-fancybox]");
            document.body.appendChild(s);
        }
    }
});
</script>
<script>
if (document.querySelector('.swiper')) {
    const s = document.createElement('script');
    s.src = "{{ asset('frontend/js/swiper-bundle.min.js') }}";
    s.defer = true;
    document.body.appendChild(s);
}
</script>
<script>
let hotjarLoaded = false;

function loadHotjar() {
    if (hotjarLoaded) return;
    hotjarLoaded = true;

    const s = document.createElement('script');
    s.src = 'https://script.hotjar.com/modules.5af39c6….js';
    s.async = true;
    document.body.appendChild(s);
}

['scroll','mousemove','touchstart'].forEach(evt => {
    window.addEventListener(evt, loadHotjar, { once: true });
});
</script>
