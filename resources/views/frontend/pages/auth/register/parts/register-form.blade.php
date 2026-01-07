<content id="register-hide">
    <!-- ================ banner ================= -->
    <div class="banner">
        <h1>{{ __('frontend.create account') }}</h1>
        <ul>
            <li><a href="{{ route('home') }}">{{ __('frontend.Home') }}</a></li>
            <li><a href="#!" class="active">{{ __('frontend.create account') }}</a></li>
        </ul>
    </div>
    <!-- ================  / banner ================= -->

    <!-- Register Form -->
    <section class="auth-section py-5">
        <div class="container">
            <div class="row justify-content-center" style="margin-top: -85px;">
                <div class="col-md-6 col-lg-5">
                    <div class="auth-card">
                        <img src="{{ asset('frontend') }}/img/register.svg" alt="Register" class="auth-img">

                        <form method="POST"
                            action="{{ route('checkPhoneToSendOtp') }}"
                            id="Form" class="mt-4" oninput='repeatPassword.setCustomValidity(repeatPassword.value !== password.value ? "تأكيد كلمة المرور غير مطابق" : "")'>
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">
                                    <i class="fas fa-user me-2"></i>{{ __('frontend.FullName') }}
                                </label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="{{ __('frontend.enter FullName') }}"
                                    required minlength="2">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    <i class="fas fa-phone-alt me-2"></i>{{ __('frontend.phone') }}
                                </label>
                                <div class="input-group">
                                    <input type="text" name="phone" id="Phone" class="form-control"
                                        placeholder="5********"
                                        pattern="^5\d{8}$"
                                        title="رقم الجوال يجب أن يبدأ بـ5 ويليه 8 أرقام (مثال: 5xxxxxxxx)"
                                        required>
                                        <span class="input-group-text">+966</span>
                                </div>

                            </div>

                            <div class="mb-3 position-relative">
                                <label class="form-label"><i class="fas fa-lock me-2"></i>{{ __('frontend.Password') }}</label>
                                <div class="password-wrapper">
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="*****"
                                        required minlength="6"
                                        title="كلمة المرور يجب ألا تقل عن 6 أحرف">
                                    <span class="toggle-password" onclick="togglePassword('password','eyeIcon1')">
                                        <i class="fa-solid fa-eye" id="eyeIcon1"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="mb-3 position-relative">
                                <label class="form-label"><i class="fas fa-lock me-2"></i>{{ __('frontend.confirmPassword') }}</label>
                                <div class="password-wrapper">
                                    <input type="password" name="repeatPassword" id="repeatPassword" class="form-control"
                                        placeholder="*****"
                                        required minlength="6"
                                        title="يجب أن يكون مطابقًا لكلمة المرور">
                                    <span class="toggle-password" onclick="togglePassword('repeatPassword','eyeIcon2')">
                                        <i class="fa-solid fa-eye" id="eyeIcon2"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="d-grid pt-4">
                                <button type="submit" class="btn-submit position-relative overflow-hidden text-center" id="submitBtn">
                                    <span class="btn-text">{{ __('frontend.RegisterPage') }}</span>
                                    <i class="fa-solid fa-arrow-left ms-2" id="arrowIcon"></i>
                                    <span class="dot-loader d-none" id="dotLoader">
                                        <span></span><span></span><span></span><span></span>
                                    </span>
                                </button>
                            </div>
                        </form>


                        <p class="text-center mt-4">
                            {{ __('frontend.you already have account ?') }}
                            <a href="{{ route('auth.login', $id) }}">{{ __('frontend.Login') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</content>




