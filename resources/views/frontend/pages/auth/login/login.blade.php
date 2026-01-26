@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.Login Page')}}
@endsection

@section('styles')
  <link rel="stylesheet" href="{{asset('frontend/css/login_style.css')}}" />
@endsection


@section('content')

    <content>
        <!-- ================ banner ================= -->
        <div class="banner">
            <h1>  {{__('frontend.Login Page')}} </h1>
            <ul>
                <li><a href="{{route('home')}}">{{__('frontend.Home')}} </a></li>
                <li><a href="#!" class="active">  {{__('frontend.Login Page')}} </a></li>
            </ul>
        </div>
        <!-- ================  / banner ================= -->


        <!-- login form -->
        <section class="auth-section py-5">
            <div class="container">
              <div class="row justify-content-center" style="margin-top: -85px;">
                <div class="col-md-6 col-lg-5">
                    <div class="auth-card">
                    <img src="{{asset('frontend')}}/img/login.svg" alt="Login" class="auth-img">
                    <form method="POST" action="{{route('auth.login_action')}}" id="Form" class="mt-4">
                        <input type="hidden" name="id" value="{{$id}}">
                        <div class="mb-3">
                            <label class="form-label"><i class="fas fa-phone me-2"></i>رقم الجوال</label>
                            <div class="input-group">
                                <input type="text" required
                                    name="phone"
                                    id="phone"
                                    class="form-control"
                                    placeholder="5xxxxxxxx"
                                    data-validation="required,validatePhoneNumberOfSAR"
                                    pattern="^5\d{8}$"
                                    title="رقم الجوال يجب أن يبدأ بـ5 ويليه 8 أرقام (مثال: 5xxxxxxxx)">
                                <span class="input-group-text">+966</span>
                            </div>
                            <span class="form-error" id="phone-error"></span>
                        </div>

                        <div class="mb-3 position-relative">
                        <label class="form-label"><i class="fas fa-lock me-2"></i>كلمة المرور</label>
                        <div class="password-wrapper">
                            <input type="password" name="password" id="password" class="form-control" required>
                            <span class="toggle-password" onclick="togglePassword()">
                            <i class="fa-solid fa-eye" id="eyeIcon"></i>
                            </span>
                        </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember">
                            <label class="form-check-label" for="remember">تذكرني</label>
                        </div>
                        <a href="{{route('auth.forget_password_view' , $id)}}" class="text-muted">نسيت كلمة المرور؟</a>
                        </div>

                        <button type="submit" id="submit_button" class="btn-submit w-100">
                        دخول <i class="fa-solid fa-arrow-left ms-2"></i>
                        </button>

                        <p class="text-center mt-4">لا تملك حساب؟ <a href="{{ route('register', $id) }}">سجل الآن</a></p>
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
        // Add validator
        $.formUtils.addValidator({
            name: 'validatePhoneNumberOfSAR',
            validatorFunction: function (value, $el, config, language, $form) {
                return /^(05)[0-9]{8}$|^(5)[0-9]{8}$/.test(value);
            },
            errorMessage: "{{__('frontend.phone format is incorrect')}}",
            errorMessageKey: 'badEvenNumber'
        });


        $(document).on('submit', 'form#Form', function (e) {
            e.preventDefault();
            var myForm = $("#Form")[0]
            var formData = new FormData(myForm)
            var url = $('#Form').attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function () {
                    $('#submit_button').attr('disabled', true)
                    $('#submit_button').html(`<i class='fa fa-spinner fa-spin '></i>`)
                },
                complete: function () {

                },
                success: function (data) {

                    //$('#submit-button').prop('disabled', true);

                    window.setTimeout(function () {
                        cuteToast({
                            type: "success", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.good operation')}}",
                            timer: 3000
                        })
                        $('#submit_button').attr('disabled', false)
                        $('#submit_button').html(`<p>{{__('frontend.Login')}}</p> <span></span>`)
                        window.location.href = '{{route('auth.profile')}}';
                    }, 1000);

                },
                error: function (data) {
                    $('#submit_button').attr('disabled', false)
                    $('#submit_button').html(`<p>{{__('frontend.Login')}}</p> <span></span>`)
                    if (data.status === 400) {
                        cuteToast({
                            type: "warning", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.your account had blocked , please sent to support')}}",
                            timer: 3000
                        })
                    }

                    if (data.status === 500) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.Your Phone Or Password Is Not Correct')}}",
                            timer: 3000
                        })
                    }
                    if (data.status === 422) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "{{__('frontend.please , fill all input with correct data')}}",
                            timer: 3000
                        })
                    }//end if
                    if (data.status === 415) {
                        @if(!empty($id))
                            var url = "{{ route('frontend.show.worker', ['id' => $id]) }}";
                            location.replace(url);
                        @else
                            var url = "{{ url('/worker') }}";
                            location.replace(url);
                        @endif
                    }

                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });//end ajax


        });//end submit


        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {

                return false;
            }

            return true;
        }
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

