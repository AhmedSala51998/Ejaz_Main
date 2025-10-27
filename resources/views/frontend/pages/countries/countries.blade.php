
@extends('frontend.layouts.layout')

@section('title')
    دول الاستقدام
@endsection

@section('styles')
    <style>
        body {
            background-color: #f8f8f8;
            font-family: 'Tajawal', sans-serif;
        }

        .banner {
            background: linear-gradient(135deg, #f4a835, #fff1db);
            padding: 60px 20px;
            text-align: center;
            border-radius: 0 0 50px 50px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            color: #333;
            position: relative;
            overflow: hidden;
        }

        .banner::before {
            content: '';
            position: absolute;
            top: -100px;
            left: -100px;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            z-index: 0;
        }

        .banner h1 {
            font-size: 3rem;
            font-weight: bold;
            z-index: 1;
            position: relative;
        }

        .banner ul {
            list-style: none;
            padding: 0;
            margin-top: 15px;
            display: flex;
            justify-content: center;
            gap: 20px;
            z-index: 1;
            position: relative;
        }

        .banner ul li a {
            color: #333;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
        }

        .banner ul li a.active,
        .banner ul li a:hover {
            color: #fff;
            background: #f4a835;
            padding: 6px 14px;
            border-radius: 12px;
        }
        :root {
            --orange: #D89835;
            --orange-dark: #c8812a;
            --gray-dark: #5F5F5F;
            --text-main: #212121;
            --card-bg: rgba(255, 255, 255, 0.2);
            --border-color: rgba(255, 255, 255, 0.2);
        }

        /* الخلفية */
        .countries {
            background: radial-gradient(circle at center, #fef6ea, #fff);
            padding: 60px 0;
        }

        .sectionTitle {
            text-align: center;
            margin-bottom: 50px;
        }

        .sectionTitle h1 {
            font-size: 2.8rem;
            font-weight: bold;
            color: var(--text-main);
        }

        .sectionTitle h6 {
            font-size: 1.1rem;
            color: var(--gray-dark);
        }

        .allCountries {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
            gap: 30px;
        }

        /* كارت الدولة */
        .country {
            position: relative;
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 60px 20px 30px;
            text-align: center;
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.08);
            backdrop-filter: blur(10px);
            transition: all 0.4s ease;
            overflow: visible;
        }

        .country:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 36px rgba(228, 147, 37, 0.45) !important;
        }

        /* شعار الدولة */
        .flag-wrapper {
            position: absolute;
            top: 0;
            right: 20px;
            transform: translateY(-50%);
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 3px solid var(--orange);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            z-index: 5;
            overflow: hidden;
            transition: border-color 0.3s ease;
            opacity: 1;
        }

        /* حركة الشعار مرة واحدة */
        .animate-flag-once {
            animation: flag-move-in 1.5s ease-out forwards;
        }

        @keyframes flag-move-in {
            0% {
                transform: translate(150%, -50%);
                opacity: 0;
            }
            70% {
                transform: translate(30%, -50%);
                opacity: 1;
            }
            100% {
                transform: translateY(-50%);
            }
        }

        .flag-wrapper:hover {
            border-color: var(--orange-dark);
        }

        .flag-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            border-radius: 0;
        }

        /* محتوى البطاقة */
        .country h4 {
            font-size: 1.3rem;
            font-weight: bold;
            color: var(--orange);
            margin-top: 40px;
            margin-bottom: 5px;
        }

        .country h5 {
            font-size: 1.1rem;
            color: var(--text-main);
            margin-bottom: 10px;
        }

        .country p {
            font-size: 0.95rem;
            color: var(--gray-dark);
            min-height: 50px;
            margin-bottom: 18px;
        }

        .country a {
            display: inline-block;
            background: var(--orange);
            color: white;
            font-weight: 600;
            padding: 10px 22px;
            border-radius: 50px;
            font-size: 0.95rem;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .country a:hover {
            background: var(--orange-dark);
        }

        /* أضف هذا التعديل داخل <style> أو ملف CSS */

            @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@600;700&display=swap');

            .country h4,
            .country h5 {
                font-family: 'Cairo', sans-serif;
            }

            /* العنوان */
            .country h4 {
                font-size: 1.6rem !important;  /* أكبر */
                margin-top: 60px !important;  /* ينزل تحت عن الصورة */
                margin-bottom: 10px;
                color: var(--orange);
                font-weight: 700;
            }

            /* السعر */
            .country h5 {
                font-size: 1.2rem !important;  /* أكبر */
                margin-bottom: 5px;
                color: var(--text-main);
                font-weight: 600;
            }

        </style>

<script>
    // تشغيل الحركة مرة واحدة عند أول تحميل
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
                    <!-- Section Title -->
{{--                    <div class="SectionTitle">--}}
{{--                        <h1 class="title" data-aos="fade-up"> دول الاستقدام </h1>--}}
{{--                        <h6 class="hint" data-aos="fade-up"> نقوم بالاستقدام من مختلف الدول التي توفر عمالة ماهرة ... </h6>--}}
{{--                    </div>--}}
                        <div class="allCountries">
                            @foreach($countries as $country)
                                <div class="country" data-aos="zoom-in">
                                    <!-- شعار الدولة -->
                                    <div class="flag-wrapper">
                                        
                                            <img src="{{get_file($country->image)}}" alt="{{ $country->title }}">
                                        
                                    </div>

                                    <h4>{{ $country->title }}</h4>
                                    <h5>{{ $country->price }} ريال</h5>
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
