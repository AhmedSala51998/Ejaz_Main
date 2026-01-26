@extends('frontend.layouts.layout')

@section('title')
    تتبع الطلب
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
        .trackOrder {
            background: #FFF;
        }

        .track-form input::placeholder {
            color: #aaa;
            font-size: 0.95rem;
        }

        .track-form label {
            font-size: 1.1rem;
        }

        @media (max-width: 767px) {
            .track-form {
                padding: 30px 20px;
            }

            .track-form label {
                font-size: 1rem;
            }
        }

        .spinner-border-dotted {
            width: 2.5rem;
            height: 2.5rem;
            border: 3px dotted #fff;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 0.8s linear infinite;
            display: inline-block;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .loading-btn {
            width: 3rem !important;
            height: 3rem !important;
            padding: 0 !important;
            border-radius: 50% !important;
            background-color: #f4a835 !important;
            color: transparent !important;
            position: relative;
            display: flex !important;
            align-items: center;
            justify-content: center;
        }



    </style>
@endsection


@section('content')


    <content>
        <!-- ================ banner ================= -->
        <div class="banner">
            <h1> تتبع طلبك</h1>
            <ul>
                <li> <a href="{{route('home')}}">{{__('frontend.Home')}} </a> </li>
                <li> <a href="#!" class="active"> تتبع الطلب </a> </li>
            </ul>
        </div>

<!-- INNER PAGE BANNER END -->

<!-- =========================================== trackOrder ======================================== -->
<section class="trackOrder py-5">
    <div class="container">
        <div class="row align-items-center justify-content-center gy-4">

            <div class="col-lg-6 col-md-10">
                <div class="track-form p-5 shadow-lg rounded-4" style="background: rgba(255,255,255,0.5); backdrop-filter: blur(12px); border: 1px solid rgba(0,0,0,0.05);">
                    <form action="{{route('track_order')}}" id="CompleteRegister" method="post">
                        @csrf
                        <div class="inputField mb-4">
                            <label for="track" class="form-label fw-bold text-dark">
                                <i class="fa-solid fa-map-pin me-2 text-warning"></i>
                                من فضلك ادخل رقم الطلب
                            </label>
                            <input id="track" type="text" name="code" class="form-control form-control-lg rounded-pill" placeholder="ادخل هنا" required>
                        </div>
                        <div class="d-grid">
                            <button style="background-color: #f4a835 !important;color:#FFF !important" class="btn btn-warning btn-lg rounded-pill" id="CompleteRegisterr" type="submit">تحقق</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-6 col-md-10 text-center">
                <div class="trackorder-image">
                    <img src="{{asset('frontend')}}/img/register.svg" alt="" class="img-fluid" style="max-height: 350px;">
                </div>
            </div>
        </div>
    </div>
</section>


    </content>

@endsection

@section('js')
<script>
$(document).on('submit','form#CompleteRegister',function(e) {
    e.preventDefault();

    var myForm = $("#CompleteRegister")[0]
    var formData = new FormData(myForm)
    var url = $('#CompleteRegister').attr('action');

    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        beforeSend: function(){
            $('#CompleteRegisterr')
                .addClass('loading-btn')
                .attr('disabled', true)
                .html('<span class="spinner-border-dotted"></span>');
        },
        complete: function() {
            $('#CompleteRegisterr')
                .removeClass('loading-btn')
                .attr('disabled', false)
                .html('تحقق');
        },
        success: function (data) {
            setTimeout(function() {
                cuteToast({
                    type: "success",
                    message: "{{__('frontend.good operation')}}",
                    timer: 3000
                });
                location.href = "/order_details/" + data.order_code
            }, 2000);
        },
        error: function (data) {

            if (data.status === 500) {
                cuteToast({ type: "error", message: "يجب تسجيل الدخول لاستخدام هذة الخدمة", timer: 3000 });
            }
            if (data.status === 403) {
                cuteToast({ type: "error", message: "ﻻ يمكنك تتبع هذا الطلب", timer: 3000 });
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
});
</script>
@endsection

