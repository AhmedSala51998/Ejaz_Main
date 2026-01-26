
@extends('frontend.layouts.layout')

@section('title')
    دول الاستقدام
@endsection

@section('styles')
   <link rel="stylesheet" href="{{asset('frontend/css/countries_external_style.css')}}" />

<script>
    window.addEventListener("DOMContentLoaded", function () {
        const flags = document.querySelectorAll(".flag-wrapper");
        flags.forEach(flag => {
            flag.classList.add("animate-flag-once");
        });
    });
</script>
@endsection


@section('content')

    <content>
        <!-- ================ banner ================= -->
        <div class="banner">
            <h1> دول الاستقدام </h1>
            <ul>
                <li> <a href="{{route('home')}}">الرئيسية </a> </li>
                <li> <a href="#!" class="active"> دول الاستقدام </a> </li>
            </ul>
        </div>
        <!-- ================  / banner ================= -->


        @if (count($countries)>0)

            <section class="countries" id="countries">
                <div class="container">
                        <div class="allCountries">
                            @foreach($countries as $country)
                                <div class="country" data-aos="zoom-in">
                                    <div class="flag-wrapper">

                                            <img src="{{get_file($country->image)}}" alt="{{ $country->title }}">

                                    </div>

                                    <h4>{{ $country->title }}</h4>
                                    <h5>{{ $country->price }}
                                        <span class="riyal-logo">
                                            <svg viewBox="0 0 120 40" xmlns="http://www.w3.org/2000/svg">
                                                <text x="60" y="28"
                                                    text-anchor="middle"
                                                    font-size="26"
                                                    font-weight="800"
                                                    font-family="Cairo, Tajawal, sans-serif"
                                                    fill="#D89835">
                                                    ريال
                                                </text>
                                            </svg>
                                        </span>
                                    </h5>
                                    <p>{{ $country->description }}</p>
                                    <a href="{{ route('all-workers', $country->id) }}">
                                        اطلب الآن
                                        <i class="fa fa-arrow-left ms-2"></i>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                </div>
            </section>

        @else
            <section class="countries" id="countries">
                <div class="container">
                    <div class="sectionTitle align-items-center">
                        <h1> دول الإستقدام </h1>
                        <p> نتعامل مع جميع دول الاستقدام و نستقدم افضل العمالة ... </p>
                    </div>
                    <div class="allCountries">
                        <!-- country -->
                        <div class="country" data-aos="fade-down">
                            <div class="flag">
                                <img src="{{asset('frontend')}}/img/countries/1.webp" alt="">
                            </div>
                            <h4> اوغندا </h4>
                            <p>مدة الاستقدام في خلال 60 يوم اي مبالغ مالية عن طريق مساند</p>
                            <a href="#" class="btn btn-outline-success"> اطلب الآن </a>
                        </div>
                        <!-- country -->
                        <div class="country" data-aos="fade-down">
                            <div class="flag">
                                <img src="{{asset('frontend')}}/img/countries/2.webp" alt="">
                            </div>
                            <h4> كينيا </h4>
                            <p>مدة الاستقدام في خلال 60 يوم اي مبالغ مالية عن طريق مساند</p>
                            <a href="#" class="btn btn-outline-success"> اطلب الآن </a>
                        </div>
                        <!-- country -->
                        <div class="country" data-aos="fade-down">
                            <div class="flag">
                                <img src="{{asset('frontend')}}/img/countries/3.webp" alt="">
                            </div>
                            <h4> بنجلادش </h4>
                            <p>مدة الاستقدام في خلال 60 يوم اي مبالغ مالية عن طريق مساند</p>
                            <a href="#" class="btn btn-outline-success"> اطلب الآن </a>
                        </div>
                        <!-- country -->
                        <div class="country" data-aos="fade-down">
                            <div class="flag">
                                <img src="{{asset('frontend')}}/img/countries/4.webp" alt="">
                            </div>
                            <h4> الفلبين </h4>
                            <p>مدة الاستقدام في خلال 60 يوم اي مبالغ مالية عن طريق مساند</p>
                            <a href="#" class="btn btn-outline-success"> اطلب الآن </a>
                        </div>
                        <!-- country -->
                        <div class="country" data-aos="fade-down">
                            <div class="flag">
                                <img src="{{asset('frontend')}}/img/countries/5.webp" alt="">
                            </div>
                            <h4> الهند </h4>
                            <p>مدة الاستقدام في خلال 60 يوم اي مبالغ مالية عن طريق مساند</p>
                            <a href="#" class="btn btn-outline-success"> اطلب الآن </a>
                        </div>
                        <!-- country -->
                        <div class="country" data-aos="fade-down">
                            <div class="flag">
                                <img src="{{asset('frontend')}}/img/countries/6.webp" alt="">
                            </div>
                            <h4> موريتانيا </h4>
                            <p>مدة الاستقدام في خلال 60 يوم اي مبالغ مالية عن طريق مساند</p>
                            <a href="#" class="btn btn-outline-success"> اطلب الآن </a>
                        </div>
                        <!-- country -->
                        <div class="country" data-aos="fade-down">
                            <div class="flag">
                                <img src="{{asset('frontend')}}/img/countries/7.webp" alt="">
                            </div>
                            <h4> جيبوتي </h4>
                            <p>مدة الاستقدام في خلال 60 يوم اي مبالغ مالية عن طريق مساند</p>
                            <a href="#" class="btn btn-outline-success"> اطلب الآن </a>
                        </div>

                    </div>
                </div>
            </section>
        @endif

    </content>
@endsection
