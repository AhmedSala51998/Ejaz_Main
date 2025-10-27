@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.Forget Password Page')}}
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
        .password-wrapper {
        position: relative;
    }

    .password-input {
        padding-right: 40px;
    }

    .toggle-password {
        position: absolute;
        top: 50%;
        left: 12px;
        transform: translateY(-50%);
        cursor: pointer;
        color: #888;
        transition: color 0.3s ease;
        z-index: 10;
    }

    .toggle-password:hover {
        color: #f4a835;
    }

    /* ✅ كارد الدخول بشكل احترافي */
.card {
    background: rgba(255, 255, 255, 0.15);
    border-radius: 20px;
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    padding: 40px 30px;
    transition: all 0.4s ease-in-out;
    overflow: hidden;
}

/* ✅ صورة */
.loginImg {
    width: 100%;
    max-width: 200px;
    display: block;
    margin: 0 auto 25px;
}

/* ✅ الحقول */
.form-control {
    border-radius: 12px;
    padding: 12px 16px;
    font-size: 16px;
    border: 1px solid #ddd;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.form-control:focus {
    border-color: #f4a835;
    box-shadow: 0 0 0 4px rgba(244, 168, 53, 0.15);
}

/* ✅ اللابل */
.form-label {
    font-weight: 600;
    margin-bottom: 8px;
    color: #333;
}

/* ✅ الرابط السفلي */
.card p a {
    color: #f4a835;
    font-weight: 600;
    transition: color 0.3s ease;
}
.card p a:hover {
    color: #d4901d;
    text-decoration: underline;
}

/* ✅ تنسيق input-group */
.input-group {
    border-radius: 12px;
    overflow: hidden;
}

/* ✅ checkbox و نسيت كلمة المرور */
.form-check-label {
    font-weight: 500;
    font-size: 14px;
}

.auth-card a {
    text-decoration: none;
    font-weight: 500;
    color: #555;
    transition: 0.3s;
}

.auth-card a:hover {
    color: #f4a835;
}

.card {
    background: rgba(255, 255, 255, 0.15);
    border-radius: 24px;
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border: 1px solid rgba(255, 255, 255, 0.25);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
    padding: 45px 35px;
    transition: all 0.4s ease;
    overflow: hidden;
    position: relative;
}
.card::after {
    content: "";
    position: absolute;
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, #f4a835, #ffdfb0);
    border-radius: 50%;
    top: -40px;
    right: -40px;
    opacity: 0.1;
    z-index: 0;
}
.loginImg {
    max-width: 180px;
    margin: 0 auto 30px;
    display: block;
}
.form-label {
    font-weight: 700;
    font-size: 15px;
    color: #444;
}
.form-control {
    border-radius: 14px;
    padding: 14px 16px;
    font-size: 15px;
    border: 1px solid #ddd;
    transition: 0.3s ease;
}
.form-control:focus {
    border-color: #f4a835;
    box-shadow: 0 0 0 4px rgba(244, 168, 53, 0.15);
}
.password-wrapper {
    position: relative;
}
.toggle-password {
    position: absolute;
    top: 50%;
    left: 14px;
    transform: translateY(-50%);
    cursor: pointer;
    font-size: 18px;
    color: #aaa;
    transition: 0.3s;
}
.toggle-password:hover {
    color: #f4a835;
}
.form-check-label {
    font-size: 14px;
    font-weight: 500;
}
.card p a {
    color: #f4a835;
    font-weight: 600;
}
.card p a:hover {
    color: #d88f1e;
    text-decoration: underline;
}

.card {
    background: rgba(255, 255, 255, 0.25);
    border-radius: 24px;
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    padding: 45px 35px;
    transition: all 0.4s ease;
    position: relative;
}

.loginImg {
    max-width: 180px;
    margin: 0 auto 30px;
    display: block;
}

.form-label {
    font-weight: 700;
    font-size: 15px;
    color: #333;
}

.form-control {
    border-radius: 14px;
    padding: 14px 16px;
    font-size: 15px;
    border: 1px solid #ddd;
    transition: 0.3s ease;
}

.form-control:focus {
    border-color: #f4a835;
    box-shadow: 0 0 0 4px rgba(244, 168, 53, 0.15);
}

/* Toggle password */
.password-wrapper {
    position: relative;
}
.toggle-password {
    position: absolute;
    top: 50%;
    left: 14px;
    transform: translateY(-50%);
    cursor: pointer;
    font-size: 18px;
    color: #aaa;
    transition: 0.3s;
    display: none; /* ✅ مخفية بالبداية */
}
.toggle-password:hover {
    color: #f4a835;
}

.auth-section {
    background: #fffefc;
    font-family: 'Tajawal', sans-serif;
}

.auth-card {
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(16px);
    border-radius: 24px;
    padding: 40px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.auth-card::after {
    content: "";
    position: absolute;
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, #f4a835, #ffdfb0);
    border-radius: 50%;
    top: -40px;
    right: -40px;
    opacity: 0.1;
    z-index: 0;
}

.auth-img {
    display: block;
    width: 160px;
    margin: 0 auto 20px;
}

.form-label {
    font-weight: 600;
    color: #444;
}

.form-control {
    border-radius: 12px;
    padding: 12px 16px;
    border: 1px solid #ccc;
    transition: all 0.3s;
}

.form-control:focus {
    border-color: #f4a835;
    box-shadow: 0 0 0 4px rgba(244, 168, 53, 0.1);
}

.input-group-text {
    background: #f4a835;
    color: #fff;
    font-weight: 600;
    border: none;
}

.submit_button {
    background-color: #f4a835;
    color: white;
    font-weight: 600;
    padding: 12px 20px;
    border: none;
    border-radius: 30px;
    transition: 0.3s;
}
.submit_button:hover {
    background-color: #d88f1e;
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(244,168,53,0.4);
}

.toggle-password {
    position: absolute;
    top: 50%;
    left: 14px;
    transform: translateY(-50%);
    cursor: pointer;
    color: #888;
    display: none;
    font-size: 16px;
}
.toggle-password:hover {
    color: #f4a835;
}

.auth-card {
    background: rgba(255, 255, 255, 0.25);
    border-radius: 24px;
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    padding: 45px 35px;
    transition: all 0.4s ease;
    position: relative;
}

.form-error {
    color: red;
    font-size: 13px;
    margin-top: 4px;
}

</style>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.79/jquery.form-validator.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
