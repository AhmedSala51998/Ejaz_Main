@section('styles')
    <style>
        body {
        background-color: #fffefc;
        font-family: 'Tajawal', sans-serif;
        line-height: 1.7;
        color: #333;
    }


    .hide-code .banner {
        background: linear-gradient(135deg, #f4a835, #fff1db);
        padding: 60px 20px;
        text-align: center;
        border-radius: 0 0 50px 50px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
        color: #333;
    }

    .hide-code .banner::before {
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

    .hide-code .banner h1 {
        font-size: 3rem;
        font-weight: bold;
        position: relative;
        z-index: 1;
    }

    .hide-code .banner ul {
        list-style: none;
        padding: 0;
        margin-top: 15px;
        display: flex;
        justify-content: center;
        gap: 20px;
        position: relative;
        z-index: 1;
    }

    .hide-code .banner ul li a {
        color: #333;
        font-weight: 600;
        text-decoration: none;
        transition: 0.3s;
    }

    .hide-code .banner ul li a.active,
    .hide-code .banner ul li a:hover {
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

.loginImg {
    width: 100%;
    max-width: 200px;
    display: block;
    margin: 0 auto 25px;
}

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

.form-label {
    font-weight: 600;
    margin-bottom: 8px;
    color: #333;
}

.card p a {
    color: #f4a835;
    font-weight: 600;
    transition: color 0.3s ease;
}
.card p a:hover {
    color: #d4901d;
    text-decoration: underline;
}

.input-group {
    border-radius: 12px;
    overflow: hidden;
}

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
    display: none;
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

.vCode-input {
  width: 60px;
  height: 60px;
  font-size: 2.5rem;
  text-align: center;
  border-radius: 15px;
  border: 2px solid #ddd;
  box-shadow: 0 3px 8px rgba(0,0,0,0.1);
  background: linear-gradient(145deg, #ffffff, #f0f0f0);
  transition: all 0.3s ease;
  outline: none;
  color: #333;
  font-weight: 700;
  user-select: none;
  -webkit-appearance: none;
  -moz-appearance: textfield;
  cursor: text;
}

.vCode-input:focus {
  border-color: #f4a835;
  box-shadow: 0 0 10px 3px rgba(244, 168, 53, 0.4);
  background: #fff9e6;
  color: #f4a835;
}

.vCode-input::placeholder {
  color: #bbb;
  font-weight: 400;
}

.vCode-input:not(:placeholder-shown) {
  color: #f4a835;
}
#vCode {
  display: flex;
  flex-direction: row;
  direction: ltr;
  gap: 12px;
  justify-content: center;
}
.vCode-input {
  width: 60px;
  height: 60px;
  text-align: center;
  font-size: 2.5rem;
  direction: ltr;
}

.vCode {
  display: flex !important;
  justify-content: center !important;
  gap: 16px !important;
  margin-top: 1rem !important;
}
.vCode-input {
  width: 60px;
  height: 60px;
  font-size: 2.5rem;
  font-weight: 700;
  text-align: center;
  border: 2px solid #f4a835;
  border-radius: 12px;
  background: #fffefc;
  box-shadow: 0 4px 8px rgba(244, 168, 53, 0.25);
  transition: border-color 0.3s ease, box-shadow 0.3s ease;
  -moz-appearance: textfield;
}

.vCode-input::-webkit-outer-spin-button,
.vCode-input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

.vCode-input:focus {
  border-color: #d88f1e;
  box-shadow: 0 0 8px 3px rgba(216, 143, 30, 0.6);
  outline: none;
  background: #fff9e6;
  color: #d88f1e;
  caret-color: #d88f1e;
  transition: border-color 0.3s ease, box-shadow 0.3s ease;
  box-shadow: 0 0 8px 3px rgba(244, 168, 53, 0.8);
  font-weight: 800;
  letter-spacing: 4px;
}



</style>
@endsection
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
