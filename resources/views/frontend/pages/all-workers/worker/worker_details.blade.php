@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.Recruitment Request')}}
@endsection

@section('content')
<!-- ================ banner ================= -->
<div class="banner">
    <h1>طلب استقدام</h1>
    <ul>
        <li><a href="{{route('home')}}">{{__('frontend.Home')}} </a></li>
        <li><a href="#!" class="active">اختر أحد مندوبي خدمة العملاء</a></li>
    </ul>
</div>
<!-- ================  / banner ================= -->

<section class="selectCustomerService">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 p-2">
                <div class="headTitle">
                    <h1>اختر أحد مندوبي خدمة العملاء</h1>
                    <p>
                        {{__('frontend.Please choose a customer service representative to continue completing the contract and complete the recruitmentContract')}}
                    </p>
                </div>
                <div class="row justify-content-center g-3">
                    @foreach($admins as $admin)

                        <div class="col-4 col-sm-4 col-md-3 col-lg-2" id="customerSupport">
                            <div class="customerOption">
                                <input type="radio" class="btn-check customerSupport" value="{{$admin->id}}" name="customer" id="option{{$admin->id}}">
                                <label for="option{{$admin->id}}">
                                    <img src="{{asset('frontend/img/customer-service.png')}}" alt="Customer Service Icon">
                                    <span>{{$admin->name}}</span>
                                </label>
                            </div>
                        </div>

                    @endforeach
                </div>
                <div class="pt-4 p-2 text-center">
                    <button attr-id="{{$cv->id}}" class="animatedLinkk Recruitment_Request">
                        {{__('frontend.Recruitment Request')}}
                        <i class="fa-regular fa-left-long ms-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')

@endsection
