@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.resetPassword')}}
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
                        <form method="post" id="Form" action="{{route('auth.reset_password_action')}}" oninput='repeatPassword.setCustomValidity(repeatPassword.value !== password.value ? "تأكيد كلمة المرور غير مطابق" : "")'>
                            <input type="hidden" name="cv_id" value="{{ $cv_id ?? '' }}">
                            @csrf
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <div class="mb-3 position-relative">
                                <label for="password" class="form-label"><i class="fas fa-key me-2"></i>{{__('frontend.newPassword')}}</label>
                                <div class="password-wrapper">
                                <input name="password"  required minlength="6" title="كلمة المرور يجب ألا تقل عن 6 أحرف" data-validation="required,length" data-validation-length="min6" type="password" class="form-control" id="password" placeholder="*****">
                                <span class="toggle-password" onclick="togglePassword()">
                                    <i class="fas fa-eye" id="eyeIcon"></i>
                                </span>
                            </div>
                            </div>
                            <div class="mb-3 position-relative">
                                <label for="repetPassword" class="form-label"><i class="fas fa-key me-2"></i>{{__('frontend.ConfirmNewPassword')}}</label>
                                <div class="password-wrapper">
                                <input name="confirm_password"  required minlength="6" title="يجب أن يكون مطابقًا لكلمة المرور" data-validation="required,repeatPassword" type="password" class="form-control" id="repeatPassword" placeholder="*****">
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
                    if (data.cv_id) {
                        var url = "{{ route('auth.login', ['id' => ':id']) }}";
                        url = url.replace(':id', data.cv_id);
                        location.replace(url);
                    } else {
                        location.replace("{{ route('auth.login') }}");
                    }
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
