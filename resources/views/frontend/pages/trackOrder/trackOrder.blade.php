@extends('frontend.layouts.layout')

@section('title')
    تتبع الطلب
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

