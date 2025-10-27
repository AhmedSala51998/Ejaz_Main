<link rel="icon" type="image/x-icon" href="{{$settings->tap_logo?get_file($settings->tap_logo):asset('frontend/img/fav.svg')}}">



<!-- dropify -->
<link rel="stylesheet" href="{{asset('frontend')}}/css/dropify.min.css">


<!-- fonts  -->
<link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">

<link href="{{asset('frontend/backEndFiles/validation/toastr.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('frontend/backEndFiles/sweetalert/sweetalert.css')}}">



<!-- favicon -->
<!-- Bootstrap -->
<link rel="stylesheet" href="{{asset('frontend')}}/css/bootstrap.rtl.min.css" />
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('frontend')}}/css/fontawesome.min.css" />
<!-- swiper -->
<link rel="stylesheet" href="{{asset('frontend')}}/css/swiper-bundle.min.css" />
<!-- animate -->
<link rel="stylesheet" href="{{asset('frontend')}}/css/animate.min.css" />
<!-- aos -->
<link rel="stylesheet" href="{{asset('frontend')}}/css/aos.css" />
<!-- select2 -->
<link rel="stylesheet" href="{{asset('frontend')}}/css/select2.min.css" />
<!-- img gallery -->
<link rel="stylesheet" href="{{asset('frontend')}}/css/jquery.fancybox.min.css" />
<!-- odometer -->
<link rel="stylesheet" href="{{asset('frontend')}}/css/odometer.min.css" />
<!-- intro  -->
<link rel="stylesheet" href="{{asset('frontend')}}/css/introjs.css">
<link rel="stylesheet" href="{{asset('frontend')}}/css/introjs-rtl.css">
<!-- Custom style  -->
<link rel="stylesheet" href="{{asset('frontend')}}/css/style.css" />
{{--<link href="{{asset('frontend')}}/css/all.css" rel="stylesheet" type="text/css" />--}}
<!-- Icons Css -->
<link href="{{asset('frontend')}}/css/icons.min.css" rel="stylesheet" type="text/css">
<!-- App Css-->
<!-- <link href="assets/css/app.min.css" rel="stylesheet" type="text/css"> -->
{{--<link href="{{asset('frontend')}}/css/appAR.css" rel="stylesheet" type="text/css">--}}
<!-- custom Css-->
{{--<link href="{{asset('frontend')}}/assets/css/custom.min.css" rel="stylesheet" type="text/css">--}}







{{--<!-- CSS -->--}}
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

<style>
    .form-error{
        color: red;
        font-weight: normal;
        font-size: smaller;
    }

    input.valid, textarea.valid{
        border: 1px solid green;
    }
    .container-wa .floating-button {
        position: fixed;
        bottom: 40px;
        right: 40px;
        width: 60px;
        height: 60px;
        background-color: #25d366;
        color: white;
        border-radius: 50px;
        text-align: center;
        font-size: 35px;
        cursor: pointer;
        box-shadow: 0px 2px 5px #666;
    }
    .container-wa .floating-button:hover {
        background-color: #1fad53;
    }
    .container-wa .floating-button .icon {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        line-height: 60px;
        text-align: center;
        transition: all 0.3s;
    }
    .container-wa .floating-button .icon.wa {
        animation: wa-out 0.3s;
    }
    .container-call .floating-button {
        position: fixed;
        bottom: 40px;
        left: 40px;
        width: 60px;
        height: 60px;
        background-color: #1a3354;
        color: white;
        border-radius: 50px;
        text-align: center;
        font-size: 30px;
        cursor: pointer;
        box-shadow: 0px 2px 5px #666;
    }
    .container-call .floating-button:hover {
        background-color: #166fbf;
    }
    .container-call .floating-button i{
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        line-height: 60px;
        text-align: center;
        transition: all 0.3s;
    }
    .container-call .floating-button .icon.call {
        animation: wa-out 0.3s;
    }

</style>
