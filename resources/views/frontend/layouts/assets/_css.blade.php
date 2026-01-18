<link rel="icon" type="image/x-icon" href="{{$settings->tap_logo?get_file($settings->tap_logo):asset('frontend/img/fav.svg')}}">



<!-- dropify -->
<link rel="stylesheet" href="{{asset('frontend')}}/css/dropify.min.css">


<link rel="stylesheet" href="{{asset('frontend/css/bootstrap.rtl.min.css')}}" />
<link rel="stylesheet" href="{{asset('frontend/css/fontawesome.min.css')}}" />
<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}" />
<link rel="preload" href="{{asset('frontend/css/swiper-bundle.min.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link rel="preload" href="{{asset('frontend/css/animate.min.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link rel="preload" href="{{asset('frontend/css/aos.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link rel="preload" href="{{asset('frontend/css/dropify.min.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link rel="preload" href="{{asset('frontend/css/jquery.fancybox.min.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link rel="preload" href="{{asset('frontend/css/odometer.min.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link rel="preload" href="{{asset('frontend/css/select2.min.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link rel="preload" href="{{asset('frontend/backEndFiles/validation/toastr.min.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link rel="preload" href="{{asset('frontend/backEndFiles/sweetalert/sweetalert.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link rel="preload" href="{{asset('frontend/css/introjs.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link rel="preload" href="{{asset('frontend/css/introjs-rtl.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">

<noscript>
  <link rel="stylesheet" href="{{asset('frontend/css/swiper-bundle.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/animate.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/aos.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/dropify.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/jquery.fancybox.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/odometer.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/backEndFiles/validation/toastr.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/backEndFiles/sweetalert/sweetalert.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/introjs.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/introjs-rtl.css')}}">
</noscript>


<style>
    @font-face {
        font-family: 'Cairo';
        src: url('{{asset("frontend/fonts/Cairo.woff2")}}') format('woff2'),
            url('{{asset("frontend/fonts/Cairo.woff")}}') format('woff');
        font-display: swap;
    }

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
