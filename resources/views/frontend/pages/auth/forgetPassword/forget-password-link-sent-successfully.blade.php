@extends('frontend.layouts.layout')

@section('title')
    {{ __('frontend.Congratulation page') }}
@endsection

@section('styles')
<style>
    body {
        background-color: #fffefc;
        font-family: 'Tajawal', sans-serif;
        line-height: 1.7;
        color: #333;
        margin: 0;
        padding: 0;
    }

    /* بانر العنوان مع تأثيرات */
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
        background: rgba(255, 255, 255, 0.15);
        border-radius: 50%;
        z-index: 0;
        filter: blur(40px);
    }

    .banner h1 {
        font-size: 3rem;
        font-weight: 700;
        position: relative;
        z-index: 1;
        color: #3a2f0b;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
    }

    .banner ul {
        list-style: none;
        padding: 0;
        margin-top: 20px;
        display: flex;
        justify-content: center;
        gap: 25px;
        position: relative;
        z-index: 1;
    }

    .banner ul li a {
        color: #3a2f0b;
        font-weight: 600;
        text-decoration: none;
        padding: 8px 18px;
        border-radius: 14px;
        transition: all 0.3s ease;
        box-shadow: inset 0 0 0 0 #f4a835;
        border: 2px solid transparent;
    }

    .banner ul li a.active,
    .banner ul li a:hover {
        color: #fff;
        background: #f4a835;
        border-color: #f4a835;
        box-shadow: 0 4px 10px rgba(244, 168, 53, 0.4);
    }

    /* القسم الرئيسي للرسالة */
    .account {
        margin: 50px 0 80px;
    }

    .containerr {
        max-width: 480px;
        margin: 0 auto;
        padding: 0 15px;
    }

    .formCard {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 12px 40px rgba(244, 168, 53, 0.15);
        padding: 40px 30px 60px;
        position: relative;
        overflow: hidden;
        transition: box-shadow 0.3s ease;
        text-align: center;
    }

    .formCard:hover {
        box-shadow: 0 15px 45px rgba(244, 168, 53, 0.3);
    }

    /* تأثيرات البلور الدائرية */
    .circleBlur, .circleBlur2 {
        position: absolute;
        border-radius: 50%;
        filter: blur(100px);
        opacity: 0.15;
        z-index: 0;
    }

    .circleBlur {
        width: 220px;
        height: 220px;
        background: #f4a835;
        top: -80px;
        right: -60px;
    }

    .circleBlur2 {
        width: 150px;
        height: 150px;
        background: #ffce7c;
        bottom: -60px;
        left: -40px;
    }

    /* الصورة مع انيميشن */
    .loginImg {
        height: 120px !important;
        width: 120px !important;
        object-fit: contain;
        margin: 0 auto 30px auto;
        display: block;
        filter: drop-shadow(0 0 6px #f4a835);
        animation: pulseScale 2.5s ease-in-out infinite;
    }

    @keyframes pulseScale {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1);
        }
    }

    /* العناوين */
    .formCard h6 {
        font-weight: 600;
        color: #3a2f0b;
        font-size: 1.25rem;
        margin-top: 0;
        margin-bottom: 24px;
    }

    .formCard h6 a {
        color: #fff;
        background: linear-gradient(135deg, #f4a835, #d88e00);
        padding: 12px 36px;
        border-radius: 30px;
        font-weight: 700;
        text-decoration: none;
        display: inline-block;
        box-shadow: 0 8px 20px rgba(244, 168, 53, 0.35);
        transition: all 0.3s ease;
        cursor: pointer;
        user-select: none;
    }

    .formCard h6 a:hover,
    .formCard h6 a:focus {
        background: linear-gradient(135deg, #d88e00, #f4a835);
        box-shadow: 0 12px 25px rgba(216, 142, 0, 0.6);
        outline: none;
        transform: translateY(-2px);
    }

    /* متجاوب */
    @media (max-width: 576px) {
        .banner h1 {
            font-size: 2.25rem;
        }

        .formCard {
            padding: 30px 20px 50px;
        }

        .formCard h6 a {
            padding: 10px 28px;
            font-size: 1rem;
        }
    }
</style>
@endsection

@section('content')
<div class="banner" role="banner" aria-label="صفحة التهنئة">
    <h1>تمت العملية بنجاح</h1>
    <ul aria-label="روابط التنقل الرئيسية">
        <li><a href="{{ route('home') }}" aria-label="العودة للرئيسية">الرئيسية</a></li>
        <li><a href="#!" class="active" aria-current="page">نسيت كلمة المرور</a></li>
    </ul>
</div>

<section class="account" aria-live="polite" aria-atomic="true">
    <div class="containerr">
        <div class="formCard" role="region" aria-labelledby="successMessage">
            <div class="circleBlur" aria-hidden="true"></div>
            <div class="circleBlur2" aria-hidden="true"></div>

            <img class="loginImg" src="{{ asset('frontend/img/check.png') }}" alt="تم بنجاح - علامة صح" />
            <h6 id="successMessage">{{ __('frontend.Reset Password Phone Is Sent Successfully') }}</h6>
            <h6>
                <a href="{{ route('home') }}" role="button" tabindex="0">العودة للرئيسية</a>
            </h6>
        </div>
    </div>
</section>
@endsection

@section('js')
{{-- يمكنك إضافة جافاسكريبت هنا إذا أردت --}}
@endsection
