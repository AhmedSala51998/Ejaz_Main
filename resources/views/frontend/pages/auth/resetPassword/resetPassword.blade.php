@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.resetPassword')}}
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

.btn-submit {
    background-color: #f4a835;
    color: white;
    font-weight: 600;
    padding: 12px 20px;
    border: none;
    border-radius: 30px;
    transition: 0.3s;
}
.btn-submit:hover {
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
    <div class="banner">
        <h1>{{__('frontend.resetPassword')}}</h1>
        <ul>
            <li><a href="{{route('home')}}">{{__('frontend.Home')}}</a></li>
            <li><a href="#" class="active">{{__('frontend.resetPassword')}}</a></li>
        </ul>
    </div>

    <section class="auth-section py-5">
        <div class="container">
            <div class="row justify-content-center" style="margin-top: -85px;">
                <div class="col-md-6 col-lg-5">
                    <div class="auth-card">
                        <img src="{{asset('frontend')}}/img/Reset.svg" alt="Reset">
                        <form method="post" id="Form" action="{{route('auth.reset_password_action')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <div class="mb-3 position-relative">
                                <label for="password" class="form-label"><i class="fas fa-key me-2"></i>{{__('frontend.newPassword')}}</label>
                                <div class="password-wrapper">
                                <input name="password" data-validation="required,length" data-validation-length="min6" type="password" class="form-control" id="password" placeholder="*****">
                                <span class="toggle-password" onclick="togglePassword()">
                                    <i class="fas fa-eye" id="eyeIcon"></i>
                                </span>
                            </div>
                            </div>
                            <div class="mb-3 position-relative">
                                <label for="repetPassword" class="form-label"><i class="fas fa-key me-2"></i>{{__('frontend.ConfirmNewPassword')}}</label>
                                <div class="password-wrapper">
                                <input name="confirm_password" data-validation="required,repeatPassword" type="password" class="form-control" id="repetPassword" placeholder="*****">
                                <span class="toggle-password" onclick="togglePassword1()">
                                  <i class="fas fa-eye" id="eyeIcon"></i>
                                </span>
                               </div>
                            </div>
                            <button type="submit" id="submit_button" class="btn-submit w-100">
                                {{__('frontend.change Password')}} <i class="fa-solid fa-arrow-left ms-2"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
<script>
    $.formUtils.addValidator({
        name : 'repeatPassword',
        validatorFunction : function(value, $el, config, language, $form) {
            return value === $("#password").val();
        },
        errorMessage : "{{__('frontend.PasswordAndConfirmPasswordIsNotTheSame')}}",
        errorMessageKey: 'repeatPasswordKey'
    });

    function togglePassword(inputId) {
        const input = document.getElementById(inputId);
        const eyeIcon = input.nextElementSibling.querySelector('i');
        if (input.type === "password") {
            input.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }
    }

    function togglePassword1(inputId) {
        const input = document.getElementById(inputId);
        const eyeIcon = input.nextElementSibling.querySelector('i');
        if (input.type === "password") {
            input.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }
    }

    $(document).on('submit','form#Form',function(e) {
        e.preventDefault();
        var myForm = $("#Form")[0]
        var formData = new FormData(myForm)
        var url = $('#Form').attr('action');
        $.ajax({
            url:url,
            type: 'POST',
            data: formData,
            beforeSend: function(){
                $('#submit_button').attr('disabled',true)
                $('#submit_button').html(`<i class='fa fa-spinner fa-spin '></i>`)
            },
            success: function (data) {
                setTimeout(function() {
                    cuteToast({
                        type: "success",
                        message: "{{__('frontend.good operation')}}",
                        timer: 3000
                    })
                    $('#submit_button').attr('disabled',false)
                    $('#submit_button').html(`<p>{{__('frontend.change Password')}}</p><span></span>`)
                    location.replace("{{route('auth.login')}}")
                }, 2000);
            },
            error: function (data) {
                $('#submit_button').attr('disabled',false)
                $('#submit_button').html(`<p>{{__('frontend.change Password')}}</p><span></span>`)

                if (data.status === 500 || data.status === 422) {
                    cuteToast({
                        type: "error",
                        message: "{{__('frontend.please , fill all input with correct data')}}",
                        timer: 3000
                    })
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.79/jquery.form-validator.min.js"></script>

    <script>
        // ✅ تفعيل الفاليدشن لرقم الجوال السعودي
        $.formUtils.addValidator({
            name: 'validatePhoneNumberOfSAR',
            validatorFunction: function (value) {
                return /^(05\d{8})$|^(5\d{8})$/.test(value);
            },
            errorMessage: "رقم الجوال غير صحيح. يجب أن يبدأ بـ 05 ويتبعه 8 أرقام.",
            errorMessageKey: 'badPhoneNumber'
        });

        $.validate({
            form: '#Form',
            modules: 'security',
            lang: 'ar',
            onError: function () {
                $('#phone-error').text("يرجى التأكد من صحة رقم الجوال.");
            },
            onSuccess: function () {
                $('#phone-error').text('');
                return true;
            }
        });

        // ✅ تفعيل زر إظهار كلمة المرور فقط عند الكتابة
        document.addEventListener("DOMContentLoaded", function () {
            const passwordInput = document.getElementById("password");
            const togglePasswordEl = document.querySelector(".toggle-password");

            passwordInput.addEventListener("input", function () {
                if (this.value.trim().length > 0) {
                    togglePasswordEl.style.display = "block";
                } else {
                    togglePasswordEl.style.display = "none";
                    passwordInput.type = "password";
                    document.getElementById("eyeIcon").classList.remove("fa-eye-slash");
                    document.getElementById("eyeIcon").classList.add("fa-eye");
                }
            });
        });

        // ✅ تغيير نوع حقل الباسورد (إظهار/إخفاء)
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const eyeIcon = document.getElementById("eyeIcon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }
    </script>
@endsection
