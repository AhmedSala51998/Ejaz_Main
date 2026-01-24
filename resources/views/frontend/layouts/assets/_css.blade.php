<link rel="icon" type="image/x-icon" href="{{$settings->tap_logo ? get_file($settings->tap_logo) : asset('frontend/img/fav.svg')}}">


<link rel="preload" href="{{asset('frontend/css/fontawesome.min.css')}}" as="style" onload="this.rel='stylesheet'">
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
  <link rel="stylesheet" href="{{asset('frontend/css/fontawesome.min.css')}}">
</noscript>

<link rel="preload"
      href="{{asset('frontend/css/bootstrap.rtl.min.css')}}"
      as="style"
      onload="this.onload=null;this.rel='stylesheet'">

<link rel="preload"
      href="{{asset('frontend/css/style.css')}}"
      as="style"
      onload="this.onload=null;this.rel='stylesheet'">

<noscript>
<link rel="stylesheet" href="{{asset('frontend/css/bootstrap.rtl.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
</noscript>


<link rel="preload"
      as="style"
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@600;700;800&family=Tajawal:wght@400;500;700&display=swap"
      onload="this.onload=null;this.rel='stylesheet'">

<noscript>
<link rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@600;700;800&family=Tajawal:wght@400;500;700&display=swap">
</noscript>


<style>
/* ===== Critical CSS ===== */

* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: 'Tajawal', 'Cairo', sans-serif;
    background-color: #fff;
    color: #212121;
}

/* ===== Header / Navbar ===== */
header {
    width: 100%;
    background: #ffffff;
}

.navbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 20px;
}

.navbar img {
    height: 48px;
}

.navbar a {
    text-decoration: none;
    color: #212121;
    font-weight: 500;
}

/* ===== Hero Section (LCP) ===== */
.hero {
    min-height: 70vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 40px 20px;
    background: linear-gradient(135deg, #f4a835, #d89835);
}

.hero h1 {
    font-size: 2rem;
    margin-bottom: 15px;
    color: #fff;
}

.hero p {
    font-size: 1.1rem;
    color: #fff;
    margin-bottom: 25px;
}

.hero .btn {
    display: inline-block;
    padding: 12px 28px;
    background: #ffffff;
    color: #212121;
    border-radius: 30px;
    font-weight: 600;
    text-decoration: none;
}

img {
    max-width: 100%;
    height: auto;
}
.form-error { color: red; font-weight: normal; font-size: smaller; }
input.valid, textarea.valid { border: 1px solid green; }

/* Floating buttons */
.container-wa .floating-button {
    position: fixed; bottom: 40px; right: 40px;
    width: 60px; height: 60px;
    background-color: #25d366; color: white;
    border-radius: 50px; text-align: center;
    font-size: 35px; cursor: pointer;
    box-shadow: 0px 2px 5px #666;
}
.container-wa .floating-button:hover { background-color: #1fad53; }
.container-wa .floating-button .icon { position: absolute; top:0; left:0; right:0; line-height:60px; text-align:center; transition: all 0.3s; }
.container-wa .floating-button .icon.wa { animation: wa-out 0.3s; }

.container-call .floating-button {
    position: fixed; bottom:40px; left:40px;
    width:60px; height:60px;
    background-color:#1a3354; color:white;
    border-radius:50px; text-align:center;
    font-size:30px; cursor:pointer;
    box-shadow:0px 2px 5px #666;
}
.container-call .floating-button:hover { background-color:#166fbf; }
.container-call .floating-button i { position:absolute; top:0; left:0; right:0; line-height:60px; text-align:center; transition:all 0.3s; }
.container-call .floating-button .icon.call { animation: wa-out 0.3s; }
/* ===== Select2 RTL FIX ===== */
.select2-container {
    width: 100% !important;
}

.select2-container--default .select2-selection--single {
    height: 42px;
    padding: 6px 12px;
    border-radius: 10px;
    border: 1px solid #f4a835;
    display: flex;
    align-items: center;
}

.select2-container--default
.select2-selection--single
.select2-selection__rendered {
    padding-right: 0 !important;
    padding-left: 24px !important;
    text-align: right;
    line-height: normal !important;
}

.select2-container--default
.select2-selection--single
.select2-selection__arrow {
    right: auto !important;
    left: 10px;
    height: 100%;
}
.select2-container--default
.select2-selection--single
.select2-selection__arrow {
    top: 43%;
    transform: translateY(-40%);
}

</style>
