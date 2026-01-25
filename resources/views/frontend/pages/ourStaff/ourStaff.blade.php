@extends('frontend.layouts.layout')

@section('title')
    خدمة العملاء
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
                                            <i class="bi bi-whatsapp me-1"></i> واتساب
                                        </a>
                                        <a href="tel:{{ $admin->phone }}" class="btn btn-call">
                                            <i class="bi bi-telephone me-1"></i> اتصال
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
