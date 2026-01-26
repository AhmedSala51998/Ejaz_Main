@extends('frontend.layouts.layout')
@section('title')
    {{__('frontend.profile')}}
@endsection
@section('styles')
  <link rel="stylesheet" href="{{asset('frontend/css/details_order_style.css')}}" />
@endsection
@section('content')
    <content>
    <div class="banner">
        <h1> حسابي الشخصي </h1>
        <ul>
            <li> <a href="{{route('home')}}">الرئيسية </a> </li>
            <li> <a href="#!" class="active"> تفاصيل الحجز </a> </li>
        </ul>
    </div>
    <section class="profile" style="margin-top:20px">
        <div class="container-fluid px-lg-5 px-3">
            <div class="row justify-content-center">
                <div class="col-12 p-2">
                    <div class="col-lg-12 mb-3">
                        <div class="userHeaderPro">

                            <div class="userLeft">
                                <div class="avatar">
                                    {{ mb_substr($user->name,0,1) }}
                                </div>

                                <div class="userMeta">
                                    <h3>{{$user->name}}</h3>
                                    <span>{{$user->phone}}</span>
                                </div>
                            </div>

                            <div class="userActions">
                                <a href="{{route('auth.logout')}}" class="logoutBtn">
                                    <i class="fas fa-power-off"></i>
                                    <span>تسجيل الخروج</span>
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class=" col-lg-12 p-2 profileContent"> <div class="routeNav">
                            <a href="{{route('auth.profile')}}" class="Back">
                                <i class="fas fa-angle-right"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{route('auth.profile')}}"> طلبات الاستقدام </a>
                                </li>
                                <li>
                                    <a href="#!" class="active"> تفاصيل الطلب </a>
                                </li>
                            </ul>
                        </div>
                        <div class="status">
                            <ol>
                                <li @if(in_array($order->status,['new','under_work','contract','musaned','traning','tfeez','finished'])) class="completed @if($order->status == 'new') active-step @endif" @endif >
                                    <p>اختيار العمالة </p>
                                </li>
                                <li @if(in_array($order->status,['under_work','contract','musaned','traning','visa','finished'])) class="completed @if($order->status == 'under_work') active-step @endif" @endif>
                                    <p>حجز السيره الذاتية </p>
                                </li>
                                <li @if(in_array($order->status,['contract','musaned','traning','visa','finished'])) class="completed @if($order->status == 'contract') active-step @endif" @endif>
                                    <p>ابرام التعاقد </p>
                                </li>
                                <li @if(in_array($order->status,['musaned','traning','visa','finished'])) class="completed @if($order->status == 'musaned') active-step @endif" @endif>
                                    <p> مساند </p>
                                </li>
                                <li @if(in_array($order->status,['traning','visa','finished'])) class="completed @if($order->status == 'traning') active-step @endif" @endif>
                                    <p> تحت الاجراءات </p>
                                </li>
                                <li @if(in_array($order->status,['visa','finished'])) class="completed @if($order->status == 'visa') active-step @endif" @endif>
                                    <p> تفييز العمالة </p>
                                </li>
                                <li @if(in_array($order->status,['finished'])) class="completed @if($order->status == 'finished') active-step @endif" @endif>
                                    <p>وصول العمالة </p>
                                </li>
                            </ol>
                        </div>

                        <div class="order-details-card">
                            <div class="row g-0"> <div class="col-md-6 order-image-section p-3">
                                    <div class="swiper workerCvSlider">
                                        <div class="swiper-wrapper">
                                            @foreach($order->biography->images as $image)
                                                <div class="swiper-slide">
                                                    <a data-fancybox="user{{$image->id}}-CV-{{$image->id}}" href="{{get_file($image->image)}}">
                                                        {{-- يفضل استخدام صورة السيرة الذاتية الفعلية بدلاً من صورة ثابتة للعرض --}}
                                                        <img src="{{ get_file($image->image) }}" alt="السيرة الذاتية" class="img-fluid rounded shadow-sm">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 order-info-section p-4">
                                    <h4 style="font-family:cairo" class="order-title mb-4">تفاصيل الطلب</h4> {{-- يمكن إضافة عنوان عام للقسم --}}
                                    <ul class="info-list list-unstyled">
                                        <li>
                                            <span class="info-label">{{__('frontend.Nationality')}} : </span>
                                            <span class="info-value">{{$order->biography->nationalitie?$order->biography->nationalitie->title:__('frontend.Not Available')}}</span>
                                        </li>
                                        <li>
                                            <span class="info-label">{{__('frontend.Occupation')}} : </span>
                                            <span class="info-value">{{$order->biography->job?$order->biography->job->title:__('frontend.Not Available')}}</span>
                                        </li>
                                        <li>
                                            <span class="info-label"> حالة الاستقدام : </span>
                                            <span class="info-status">
                                                @if ($order->status == "canceled")
                                                    <span class="badge bg-danger">{{__('frontend.orderCanceled')}}</span>
                                                @elseif ($order->status == "under_work")
                                                    <span class="badge bg-warning text-dark">تم حجز السيرة الذاتية</span>
                                                @elseif ($order->status == "visa")
                                                    <span class="badge bg-info text-dark">أصبح التعاقد الخاص بكم في مرحلة التفييز بنجاح</span>
                                                @elseif ($order->status == "musaned")
                                                    <span class="badge bg-primary">تم ربط العقد الخاص بكم في مساند بنجاح</span>
                                                @elseif ($order->status == "traning")
                                                    <span class="badge bg-secondary">أصبح التعاقد الخاص بكم في مرحلة الإجراءات بنجاح</span>
                                                @elseif ($order->status == "contract")
                                                    <span class="badge bg-success">تم قبول التعاقد الخاص بكم</span>
                                                @elseif($order->status == "finished")
                                                    <span class="badge bg-success">{{__('frontend.orderDone')}}</span>
                                                @else
                                                    <span class="badge bg-light text-dark">{{__('frontend.Unknown Status')}}</span>
                                                @endif
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="selectedCustomerInfo">
                            <div class="row">
                                <div class="col-md-6 p-1">
                                    <div class="info">
                                        <img src="{{asset('frontend')}}/img/customer-service.png" alt="Customer Service Avatar">
                                        <div class="text">
                                            <h5> {{$order->admin->name}}  </h5>
                                            <p>خدمة العملاء</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 p-1">
                                    <a class="contact" href="https://api.whatsapp.com/send?phone={{$order->admin->whats_up_number}}" target="_blank">
                                        <i class="me-2 fa-brands fa-whatsapp-square"></i>
                                        <p>تواصل عبر الواتس اب</p>
                                    </a>
                                </div>
                                <div class="col-6 col-md-3 p-1">
                                    <a class="contact" href="tel:{{$order->admin->phone}}" target="_blank">
                                        <i class="me-2 fa-solid fa-square-phone"></i>
                                        <p>تواصل عبر الهاتف </p>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="selectedCustomer">
                            <h6>سوف توصل العمالة فى خلال <span> 90 </span> يوم كحد اقصى </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</content>
@endsection
