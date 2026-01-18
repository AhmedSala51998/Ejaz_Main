<!-- jquery  -->
<script src="{{asset('frontend')}}/js/jquery.min.js"></script>
<!-- bootstrap -->
<script src="{{asset('frontend')}}/js/bootstrap.min.js"></script>
<script src="{{asset('frontend')}}/js/popper.min.js"></script>
<!-- apper  -->
<script src="{{asset('frontend')}}/js/jquery.appear.js"></script>
<!-- swiper slider -->
<script src="{{asset('frontend')}}/js/swiper-bundle.min.js"></script>
<!-- select -->
<script src="{{asset('frontend')}}/js/select2.min.js"></script>
<!-- fancybox Img viewr and zoom -->
<script src="{{asset('frontend')}}/js/jquery.fancybox.min.js"></script>
<!-- animation on scroll -->
<script src="{{asset('frontend')}}/js/aos.js"></script>
<!-- odometer counterUp  -->
<script src="{{asset('frontend')}}/js/odometer.min.js"></script>
<!-- orbit -->
<!--<script src="{{asset('frontend')}}/js/three.js"></script>
<script src="{{asset('frontend')}}/js/orbit.js"></script>
<script src="{{asset('frontend')}}/js/custom_orbit.js"></script>-->
<script src="https://unpkg.com/three@0.152.2/build/three.min.js"></script>
<script src="https://unpkg.com/globe.gl"></script>
<script src="https://unpkg.com/topojson@3"></script>

<!-- introjs -->
<script src="{{asset('frontend')}}/js/intro.js"></script>


<script src="{{asset('frontend')}}/js/jquery.appear.js"></script>
<script src="{{asset('frontend')}}/js/swiper-bundle.min.js"></script>
<script src="{{asset('frontend')}}/js/wow.js"></script>
<script src="{{asset('frontend')}}/js/jquery.fancybox.min.js"></script>
<script src="{{asset('frontend')}}/js/particles.js"></script>
<script src="{{asset('frontend/js/dropify.min.js')}}"></script>
<script src="{{asset('frontend/js/Custom.js')}}"></script>
<script src="{{asset('frontend/js/app.js')}}"></script>
<script src="{{asset('frontend/js/jquery.min.js')}}" defer></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}" defer></script>
<script src="{{asset('frontend/js/popper.min.js')}}" defer></script>
<script src="{{asset('frontend/js/jquery.appear.js')}}" defer></script>
<script src="{{asset('frontend/js/swiper-bundle.min.js')}}" defer></script>
<script src="{{asset('frontend/js/select2.min.js')}}" defer></script>
<script src="{{asset('frontend/js/jquery.fancybox.min.js')}}" defer></script>
<script src="{{asset('frontend/js/aos.js')}}" defer></script>
<script src="{{asset('frontend/js/odometer.min.js')}}" defer></script>
<script src="{{asset('frontend/js/intro.js')}}" defer></script>
<script src="{{asset('frontend/js/wow.js')}}" defer></script>
<script src="{{asset('frontend/js/particles.js')}}" defer></script>
<script src="{{asset('frontend/js/dropify.min.js')}}" defer></script>
<script src="{{asset('frontend/js/Custom.js')}}" defer></script>
<script src="{{asset('frontend/js/app.js')}}" defer></script>

<script>
    // goBack
@@ -43,131 +21,26 @@ function goBack() {
    };
</script>

<script src="{{asset('frontend/backEndFiles/validation/jquery.form-validator.js')}}"></script>
<script src="{{asset('frontend/backEndFiles/validation/toastr.min.js')}}"></script>
<script src="{{asset('frontend/backEndFiles/axios.min.js')}}"></script>
<script src="{{asset('frontend/backEndFiles/sweetalert/sweetalert.min.js')}}"></script>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // side menu
    $(".sideBtn").click(function () {
        $(this).toggleClass("active");
        $(".sideMenu").toggleClass("active");
    });

    function myToast(heading, text, position, loaderBg, icon, hideAfter, stack) {
        "use strict";
        $.toast({
            heading: heading,
            text: text,
            position: position,
            loaderBg: loaderBg,
            icon: icon,
            hideAfter: hideAfter,
            stack: stack
        });
    }


    alertify.defaults = {
        // dialogs defaults
        autoReset:true,
        basic:false,
        closable:true,
        closableByDimmer:true,
        invokeOnCloseOff:false,
        frameless:false,
        defaultFocusOff:false,
        maintainFocus:true, // <== global default not per instance, applies to all dialogs
        maximizable:true,
        modal:true,
        movable:true,
        moveBounded:false,
        overflow:true,
        padding: true,
        pinnable:true,
        pinned:true,
        preventBodyShift:false, // <== global default not per instance, applies to all dialogs
        resizable:true,
        startMaximized:false,
        transition:'pulse',
        transitionOff:false,
        tabbable:'button:not(:disabled):not(.ajs-reset),[href]:not(:disabled):not(.ajs-reset),input:not(:disabled):not(.ajs-reset),select:not(:disabled):not(.ajs-reset),textarea:not(:disabled):not(.ajs-reset),[tabindex]:not([tabindex^="-"]):not(:disabled):not(.ajs-reset)',  // <== global default not per instance, applies to all dialogs

        // notifier defaults
        notifier:{
            // auto-dismiss wait time (in seconds)
            delay:5,
            // default position
            position:'bottom-right',
            // adds a close button to notifier messages
            closeButton: false,
            // provides the ability to rename notifier classes
            classes : {
                base: 'alertify-notifier',
                prefix:'ajs-',
                message: 'ajs-message',
                top: 'ajs-top',
                right: 'ajs-right',
                bottom: 'ajs-bottom',
                left: 'ajs-left',
                center: 'ajs-center',
                visible: 'ajs-visible',
                hidden: 'ajs-hidden',
                close: 'ajs-close'
            }
        },

        // language resources
        glossary:{
            // dialogs default title
            title:'AlertifyJS',
            // ok button text
            ok: 'OK',
            // cancel button text
            cancel: 'Cancel'
        },

        // theme settings
        theme:{
            // class name attached to prompt dialog input textbox.
            input:'ajs-input',
            // class name attached to ok button
            ok:'ajs-ok',
            // class name attached to cancel button
            cancel:'ajs-cancel'
        },
        // global hooks
        hooks:{
            // invoked before initializing any dialog
            preinit:function(instance){},
            // invoked after initializing any dialog
            postinit:function(instance){},
        },
    };
</script>
<script>
    // goBack
    function goBack() { window.history.back(); }

    //for input number validation
    // input number validation
    $(document).on('keyup','.numbersOnly',function () {
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });

    window.addEventListener('online', () =>{
        alertify.success('عادت خدمة الانترنت !');
    });
    window.addEventListener('offline', () =>{
        alertify.error('لا يوجد خدمة انترنت !');
    });




</script>

    // online/offline alert
    window.addEventListener('online', () => alertify.success('عادت خدمة الانترنت !'));
    window.addEventListener('offline', () => alertify.error('لا يوجد خدمة انترنت !'));
});

<script>
    // side menu
    $(".sideBtn").click(function () {
        $(this).toggleClass("active");
        $(".sideMenu").toggleClass("active");
    });
</script>
