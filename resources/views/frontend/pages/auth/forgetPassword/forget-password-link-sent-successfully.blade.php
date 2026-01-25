@extends('frontend.layouts.layout')

@section('title')
    {{ __('frontend.Congratulation page') }}
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
