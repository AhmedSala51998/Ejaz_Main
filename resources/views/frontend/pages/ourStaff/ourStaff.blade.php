@extends('frontend.layouts.layout')

@section('title')
    خدمة العملاء
@endsection

@section('styles')
    <style>
        body {

            background-color: #fff;
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
        .section-title {
            font-size: 2.8rem;
            color: #5F5F5F;
            font-weight: bold;
        }

        .section-subtitle {
            color: #A7A7A7;
            font-size: 1.1rem;
        }

        .customer-service-section {
            background: #FFF !important;
            background-size: 200% 200%;
            animation: bg-move 10s ease infinite;
        }

        @keyframes bg-move {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }

        .service-card {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 5px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            transition: all 0.4s ease;
            text-align: center;
            padding: 30px 20px;
            box-shadow: 0 8px 32px rgba(244, 168, 53, 0.35);
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }

        .service-card .icon-container {
            background: linear-gradient(135deg, #D89835, #F2B544);
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .service-card .icon-container img {
            width: 42px;
            height: 42px;
        }

        .service-card h5 {
            font-weight: 700;
            color: #333;
            margin-bottom: 6px;
        }

        .service-card p {
            font-size: 0.95rem;
            color: #666;
            margin-bottom: 20px;
        }

        .btn-whatsapp {
            background-color: #D89835;
            color: white;
            border-radius: 50px;
            font-weight: 600;
            transition: 0.3s;
            padding: 8px 18px;
            font-size: 15px;
        }

        .btn-call {
            background-color: #5F5F5F;
            color: white;
            border-radius: 50px;
            font-weight: 600;
            transition: 0.3s;
            padding: 8px 18px;
            font-size: 15px;
        }

        .btn-whatsapp:hover,
        .btn-call:hover {
            opacity: 0.9;
            transform: scale(1.03);
        }
        .customer-service-section {
            background: linear-gradient(135deg, rgba(242,181,68,0.2), rgba(255,255,255,0.4));
            background-size: 200% 200%;
            animation: bg-move 10s ease infinite;
        }

        /* الشريط العلوي فوق الكارت */
        .top-strip {
            height: 8px;
            width: 100%;
            background-color: #D89835;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            margin-bottom: 15px;
        }
        .service-card {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            border: 1px solid rgba(255, 165, 0, 0.25);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            transition: all 0.3s ease;
            text-align: center;
            padding: 30px 20px;
            box-shadow: 0 0 25px 10px rgba(255, 140, 0, 0.7); /* ✅ شادو برتقالي قوي وواضح */
            position: relative;
        }

        .service-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 0 35px 14px rgba(255, 140, 0, 0.85); /* ✅ شادو برتقالي ناري عند الهوفر */
            border: 1px solid #f4a835;
        }

    </style>
@endsection


@section('content')

    <content>
        <!-- ================ banner ================= -->
        <div class="banner">
            <h1>     خدمة العملاء</h1>
            <ul>
                <li> <a href="{{route('home')}}">الرئيسية </a> </li>
                <li> <a href="#!" class="active">   خدمة العملاء</a> </li>
            </ul>
        </div>
        <!-- ================  / banner ================= -->


        @if (count($admins)>0)
            <section class="customer-service-section py-5" id="Countries">
                <div class="container">

                    <!-- عنوان الصفحة -->
                    <div class="text-center mb-5" data-aos="fade-up">
                        <h1 class="section-title">خدمة العملاء</h1>
                        <p class="section-subtitle">لخدمة عملاء متميزة على مدار الساعة</p>
                    </div>

                    <!-- البطاقات -->
                    <div class="row gy-4">
                        @foreach($admins as $admin)
                            <div class="col-lg-3 col-md-6">
                                <div class="service-card shadow-sm h-100">
                                    <!--<div class="top-strip"></div>-->
                                    <div class="icon-container">
                                        <img src="{{ asset('frontend/img/customer-service.png') }}" alt="خدمة العملاء">
                                    </div>
                                    <h5>{{ $admin->name }}</h5>
                                    <p>نخدمكم على مدار <strong>24/7</strong></p>
                                    <div class="d-grid gap-2">
                                        <a href="https://api.whatsapp.com/send?phone={{ $admin->phone }}" class="btn btn-whatsapp">
                                            <i class="fa fa-whatsapp me-1"></i> واتساب
                                        </a>
                                        <a href="tel:{{ $admin->phone }}" class="btn btn-call">
                                            <i class="fa fa-phone me-1"></i> اتصال
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </section>

        @else
        @endif

    </content>
@endsection
