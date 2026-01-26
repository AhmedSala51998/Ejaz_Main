@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.Forget Password Page')}}
@endsection

@section('styles')
  <link rel="stylesheet" href="{{asset('frontend/css/forget_password_style.css')}}" />
@endsection

@section('content')
    <content>
        <!-- ================ banner ================= -->
        <div class="banner">
            <h1>{{__('frontend.Forget Password Page')}}</h1>
            <ul>
                <li><a href="{{route('home')}}">{{__('frontend.Home')}}</a></li>
                <li><a href="#!" class="active">{{__('frontend.Forget Password Page')}}</a></li>
            </ul>
        </div>

        <section class="account py-5">
            <div class="container">
                <div class="row" style="margin-top:-85px">
                    <div class="col-md-8 col-lg-6 m-auto p-2">
                        <div class="auth-card">
                            <img class="loginImg" src="{{asset('frontend')}}/img/phone.svg" alt="">
                            <h6 class="text-center mb-4">{{__('frontend.Phone Number')}}</h6>

                            <form id="forget_password" method="post" action="{{route('auth.forget_password_action')}}">
                                <input type="hidden" name="id" value="{{$id}}">
                                @csrf
                                <div class="mb-3">
                                    <div class="input-group">
                                        <input data-validation="required,validatePhoneNumberOfSAR" id="phone"
                                               onkeypress="return isNumber(event)" name="phone" type="text"
                                               class="form-control" placeholder="5********">
                                        <span class="input-group-text" style="direction: ltr;"> +966 </span>
                                    </div>
                                    <span class="form-error" id="phone-error"></span>
                                </div>

                                <div class="text-center pt-3">
                                    <button id="submit_button" type="submit" class="submit_button w-100">
                                        {{__('frontend.Send Reset Password Link')}}
                                        <i class="fa-solid fa-arrow-left ms-2"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </content>
@endsection

@section('js')
    <script>
        $.formUtils.addValidator({
            name: 'validatePhoneNumberOfSAR',
            validatorFunction: function (value) {
                return /^(05\d{8})$|^(5\d{8})$/.test(value);
            },
            errorMessage: "رقم الجوال غير صحيح. يجب أن يبدأ بـ 05 ويتبعه 8 أرقام.",
            errorMessageKey: 'badPhoneNumber'
        });

        $.validate({
            form: '#forget_password',
            lang: 'ar',
            onError: function () {
                $('#phone-error').text("يرجى التأكد من صحة رقم الجوال.");
            },
            onSuccess: function () {
                $('#phone-error').text('');
                return true;
            }
        });

        function isNumber(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            return !(charCode > 31 && (charCode < 48 || charCode > 57));
        }

        $(document).on('submit', '#forget_password', function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function () {
                    $('#submit_button').attr('disabled', true).html(`<i class='fa fa-spinner fa-spin'></i>`);
                },
                success: function () {
                    setTimeout(function () {
                        Swal.fire({
                            title: '<span style="color:#f4a835; font-weight:bold;">✔ {{__("frontend.good operation")}}</span>',
                            html: `
                                <div style="font-size: 1.1rem; color:#333;">
                                    تم ارسال رابط لرقم جوالك لتغيير كلمة المرور
                                </div>
                            `,
                            icon: 'success',
                            confirmButtonText: '{{__("frontend.ok")}}',
                            confirmButtonColor: '#f4a835',
                            background: '#fffefc',
                            timer: 3000,
                            timerProgressBar: true,
                            customClass: {
                                popup: 'rounded-4 shadow-lg p-3',
                                confirmButton: 'rounded-pill px-5 py-2'
                            },
                            willClose: () => {
                                // إعادة توجيه بعد الإغلاق
                                window.location.href = '{{route('auth.forget-email-sent-successfully')}}';
                            }
                        });

                        $('#submit_button')
                            .attr('disabled', false)
                            .html(`<p>{{__('frontend.Send Reset Password Link')}}</p><span></span>`);
                    }, 1000);
                },
                error: function (data) {
                    $('#submit_button').attr('disabled', false).html(`<p>{{__('frontend.Send Reset Password Link')}}</p><span></span>`);
                    let message = "{{__('frontend.please , fill all input with correct data')}}";
                    if (data.status === 400) message = "{{__('frontend.the phone is not exists')}}";
                    if (data.status === 500) message = "{{__('frontend.the phone is already exists')}}";

                    cuteToast({ type: "error", message: message, timer: 3000 });
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    </script>
@endsection
