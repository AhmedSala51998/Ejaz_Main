<content id="hide-code">
    <!-- ================ banner ================= -->
<div class="banner">
    <h1>{{ __('frontend.create account') }}</h1>
    <ul>
        <li><a href="{{ route('home') }}">{{ __('frontend.Home') }}</a></li>
        <li><a href="#!" class="active">كود التفعيل</a></li>
    </ul>
</div>
<!-- ================  / banner ================= -->
    <!-- login form -->
    <section class="auth-section py-5">
        <div class="container">
            <div class="row justify-content-center" style="margin-top:-80px !important">
                <div class="col-md-7 col-lg-6">
                    <div class="auth-card position-relative p-4 p-md-5">

                        <img class="mx-auto d-block mb-4" src="{{asset('frontend')}}/img/code.svg" alt="Code" style="max-width: 180px;">

                        <form id="CompleteRegister" method="post" action="{{route('register_action')}}" class="row g-3">
                            @csrf
                            <input type="hidden" name="id" value="{{$id}}">
                            <input type="hidden" name="name" id="nameInCode">
                            <input type="hidden" name="password" id="passwordInCode">
                            <input type="hidden" name="phone" id="phoneInCode">

                            <div class="col-12 text-center">
                                <label class="form-label fw-bold fs-5"> {{__('frontend.PleaseEnterTheSentCode')}} <span class="text-muted"> 5XXXXXXXX </span> </label>
                                <div class="vCode d-flex justify-content-center mt-3 gap-3" id="vCode">
                                    <input
                                        id="vCodeIdFirst"
                                        onkeypress="isNumber(event)"
                                        type="tel"
                                        inputmode="numeric"
                                        maxlength="1"
                                        class="form-control text-center fs-4 rounded vCode-input"
                                        placeholder=""
                                        style="
                                        width: 70px;
                                        height: 70px;
                                        font-size: 2.8rem;
                                        font-weight: 700;
                                        text-align: center;
                                        padding: 0;
                                        border: 2px solid #f4a835;
                                        border-radius: 14px;
                                        background: #fffefc;
                                        box-shadow: 0 4px 8px rgba(244, 168, 53, 0.25);
                                        transition: 0.3s ease;
                                        appearance: textfield;
                                        -webkit-appearance: none;
                                        -moz-appearance: textfield;
                                        "
                                    />

                                    <input
                                        onkeypress="isNumber(event)"
                                        type="tel"
                                        inputmode="numeric"
                                        maxlength="1"
                                        class="form-control text-center fs-4 rounded vCode-input"
                                        placeholder=""
                                        style="
                                        width: 70px;
                                        height: 70px;
                                        font-size: 2.8rem;
                                        font-weight: 700;
                                        text-align: center;
                                        padding: 0;
                                        border: 2px solid #f4a835;
                                        border-radius: 14px;
                                        background: #fffefc;
                                        box-shadow: 0 4px 8px rgba(244, 168, 53, 0.25);
                                        transition: 0.3s ease;
                                        appearance: textfield;
                                        -webkit-appearance: none;
                                        -moz-appearance: textfield;
                                        "
                                    />

                                    <input
                                        onkeypress="isNumber(event)"
                                        type="tel"
                                        inputmode="numeric"
                                        maxlength="1"
                                        class="form-control text-center fs-4 rounded vCode-input"
                                        placeholder=""
                                        style="
                                        width: 70px;
                                        height: 70px;
                                        font-size: 2.8rem;
                                        font-weight: 700;
                                        text-align: center;
                                        padding: 0;
                                        border: 2px solid #f4a835;
                                        border-radius: 14px;
                                        background: #fffefc;
                                        box-shadow: 0 4px 8px rgba(244, 168, 53, 0.25);
                                        transition: 0.3s ease;
                                        appearance: textfield;
                                        -webkit-appearance: none;
                                        -moz-appearance: textfield;
                                        "
                                    />

                                    <input
                                        onkeypress="isNumber(event)"
                                        type="tel"
                                        inputmode="numeric"
                                        maxlength="1"
                                        class="form-control text-center fs-4 rounded vCode-input"
                                        placeholder=""
                                        style="
                                        width: 70px;
                                        height: 70px;
                                        font-size: 2.8rem;
                                        font-weight: 700;
                                        text-align: center;
                                        padding: 0;
                                        border: 2px solid #f4a835;
                                        border-radius: 14px;
                                        background: #fffefc;
                                        box-shadow: 0 4px 8px rgba(244, 168, 53, 0.25);
                                        transition: 0.3s ease;
                                        appearance: textfield;
                                        -webkit-appearance: none;
                                        -moz-appearance: textfield;
                                        "
                                    />
                                    </div>



                            </div>

                            <div class="col-12 text-center pt-4">
                               <button type="submit" class="btn w-100 py-3 position-relative overflow-hidden text-center" id="verifyBtn"
                                    style="background-color: #f4a835; color: white; font-weight: 600; border-radius: 50px; transition: 0.3s;">
                                    <span class="verify-text">{{ __('frontend.confirm') }}</span>
                                    <i class="fa fa-arrow-left ms-2" id="verifyArrow"></i>

                                    <!-- Loader -->
                                    <span class="dot-loader d-none" id="dotLoaderVerify">
                                        <span></span><span></span><span></span><span></span>
                                    </span>
                                </button>
                            </div>
                        </form>

                        <p class="text-center mt-4">{{__('frontend.I did not receive the activation code')}}
                            <a href="#" id="sendCodeAgain" attr-code-sent="sent" style="color: #f4a835; font-weight: 600; text-decoration: underline;">{{__('frontend.ReSent')}}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</content>
