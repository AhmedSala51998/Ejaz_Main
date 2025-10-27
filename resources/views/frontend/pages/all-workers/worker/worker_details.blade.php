@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.Recruitment Request')}}
@endsection

@section('styles')
<style>
    body {
        background-color: #fffefc;
        font-family: 'Tajawal', sans-serif;
        line-height: 1.7;
        color: #333;
    }

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
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        z-index: 0;
    }

    .banner h1 {
        font-size: 3rem;
        font-weight: bold;
        position: relative;
        z-index: 1;
    }

    .banner ul {
        list-style: none;
        padding: 0;
        margin-top: 15px;
        display: flex;
        justify-content: center;
        gap: 20px;
        position: relative;
        z-index: 1;
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

    .selectCustomerService {
        padding: 40px 0;
        background: #fff !important;
        min-height: 70vh;
        margin-top:-5px
    }

    .animatedLinkk {
        background: #f4a835;
        border: none;
        color: #fff;
        font-weight: 600;
        padding: 12px 35px;
        border-radius: 40px;
        cursor: pointer;
        font-size: 1.1rem;
        box-shadow: 0 6px 15px rgba(244, 168, 53, 0.5);
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .animatedLinkk:hover {
        background: #d48806;
        box-shadow: 0 8px 20px rgba(212, 136, 6, 0.7);
    }

    .animatedLinkk i {
        font-size: 1.2rem;
    }

    @media (max-width: 576px) {
        .banner h1 {
            font-size: 2rem;
        }

        .customerOption label {
            padding: 20px 10px;
        }

        .customerOption img {
            width: 50px;
            height: 50px;
        }

        .animatedLinkk {
            font-size: 1rem;
            padding: 10px 25px;
        }
    }
    .customerOption input[type="radio"] {
        display: none;
    }

    .customerOption label {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        padding: 25px 15px 15px;
        display: flex;
        flex-direction: column;
        align-items: center;
        cursor: pointer;
        border: 2px solid transparent;
        transition: all 0.3s ease;
        position: relative;
        text-align: center;
        min-height: 160px;
    }

    .customerOption label:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 25px rgba(244, 168, 53, 0.3);
    }

    /* ✅ إطار برتقالي عند الاختيار */
    .customerOption input[type="radio"]:checked + label {
        border-color: #f4a835;
        background: #fffaf3;
    }

    /* ✅ علامة صح برتقالية فوق البطاقة */
    .customerOption input[type="radio"]:checked + label::before {
        content: "✔";
        position: absolute;
        top: 5px;
        left: 5px;
        background-color: #f4a835;
        color: #fff;
        width: 24px;
        height: 24px;
        font-size: 14px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        font-weight: bold;
    }

    .customerOption {
        width: 100%;
        position: relative;
    }

    .customerOption input[type="radio"] {
        display: none;
    }

    .customerOption label {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.06);
        padding: 18px 10px;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        border: 2px solid transparent;
        transition: 0.3s;
        min-height: 130px;
        width: 100%;
    }

    .customerOption label:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 18px rgba(244, 168, 53, 0.25);
    }

    .customerOption input[type="radio"]:checked + label {
        border-color: #f4a835;
        background: #fffaf3;
    }

    .customerOption input[type="radio"]:checked + label::before {
        content: "✔";
        position: absolute;
        top: 8px;
        left: 8px;
        background-color: #f4a835;
        color: #fff;
        width: 22px;
        height: 22px;
        font-size: 13px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        font-weight: bold;
    }

    .customerOption img {
        width: 42px;
        height: 42px;
        margin-bottom: 6px;
    }

    .customerOption span {
        font-size: 0.85rem;
        font-weight: 600;
        color: #333;
    }

    .customerOption label {
        background: #ffffff; /* خلفية بيضاء صافية */
        border-radius: 15px; /* حواف مدورة أكتر */
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15); /* ظل أعمق وأكثر وضوح */
        padding: 25px 15px 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        cursor: pointer;
        border: 2px solid transparent;
        transition: all 0.3s ease;
        position: relative;
        text-align: center;
        min-height: 130px;
    }

    .customerOption label:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 30px rgba(244, 168, 53, 0.4);
    }


    .customerOption input[type="radio"]:checked + label {
        border-color: #f4a835;
        background: #fff9e6;
        box-shadow: 0 18px 40px rgba(244, 168, 53, 0.5);
    }


    .customerOption input[type="radio"]:checked + label::before {
        content: "✔";
        position: absolute;
        top: 8px;
        left: 8px;
        background-color: #f4a835;
        color: #fff;
        width: 26px;
        height: 26px;
        font-size: 16px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 3px 8px rgba(0,0,0,0.2);
        font-weight: bold;
    }



</style>
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
