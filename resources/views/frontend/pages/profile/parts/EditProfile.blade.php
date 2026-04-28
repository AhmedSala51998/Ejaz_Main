<style>
    /* General Body and Container Styles */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f6f9; /* Light grey background for the page */
        margin: 0;
        color: #333;
    }

    /* Edit Profile Section Card Styling */
    .editProfile {
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08); /* Soft, modern shadow */
        margin-bottom: 30px; /* Space between sections */
        padding: 30px;
        transition: transform 0.2s ease-in-out;
    }

    .editProfile:hover {
        transform: translateY(-5px); /* Subtle lift on hover */
    }

    .editProfile .head {
        border-bottom: 1px solid #e0e0e0; /* Light separator */
        padding-bottom: 15px;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        background-color:rgba(244, 168, 53, 0.8)
    }

    .editProfile .head h5 {
        font-size: 24px;
        font-weight: 600;
        color: rgba(244, 168, 53, 0.8); /* Darker heading color */
        margin: 0;
    }

    .editProfile .head i {
        color: #fff; /* Primary accent color for icons */
        font-size: 22px;
        margin-right: 10px;
    }

    /* Form Layout (using Bootstrap's row/col for simplicity) */
    .editProfile form.row {
        margin: -10px; /* Counteract padding on p-2 to remove outer margin */
    }

    .editProfile .col-12.p-2,
    .editProfile .col-md-6.p-2,
    .editProfile .col-md-12.p-2 {
        padding: 10px !important; /* Consistent inner padding */
    }

    /* Form Labels */
    .form-label {
        font-weight: 500;
        color: #555;
        margin-bottom: 8px;
        display: block; /* Ensure label takes full width */
        font-size: 15px;
    }

    .form-label i {
        color: #6c757d; /* Slightly muted icon color for labels */
        font-size: 16px;
        margin-right: 8px;
    }

    /* Form Controls (Input, Select) */
    .form-control, .select2-container--default .select2-selection--single {
        border: 1px solid #ced4da;
        border-radius: 8px;
        padding: 12px 15px;
        font-size: 16px;
        color: #333;
        width: 100%; /* Ensure full width */
        box-sizing: border-box; /* Include padding and border in width */
        transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }

    .form-control:focus, .select2-container--default .select2-selection--single:focus-within {
        border-color: #007bff; /* Accent color on focus */
        box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25); /* Subtle focus glow */
        outline: none;
    }

    /* Dropify Styling (assuming standard Dropify setup) */
    .profilePic {
        display: flex;
        justify-content: center;
        margin-bottom: 25px;
    }
    .dropify-wrapper {
        border: 2px dashed #dbe0e6;
        border-radius: 50%; /* Make it circular for profile pic */
        width: 150px;
        height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        margin: 0 auto;
        background-color: #f8f9fa;
        background-size: cover;
        background-position: center;
    }
    .dropify-wrapper:hover {
        border-color: #007bff;
        background-color: #e9f5ff;
    }
    /* You might need to override Dropify's internal elements more specifically if default styles don't apply */
    .dropify-wrapper .dropify-preview .dropify-render img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }
    .dropify-wrapper .dropify-message {
        font-size: 14px;
        color: #888;
    }


    /* Password Eye Icon */
    .passwordDiv {
        position: relative;
    }
    .passwordDiv .eye {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(calc(-50% + 8px)); /* Adjust for label height */
        cursor: pointer;
        color: #6c757d;
        font-size: 18px;
        transition: color 0.2s ease;
    }
    .passwordDiv .eye:hover {
        color: #007bff;
    }

    /* Verification Code Inputs */
    .vCode {
        display: flex;
        justify-content: center;
        gap: 10px; /* Space between inputs */
        margin-top: 15px;
        margin-bottom: 20px;
    }
    .vCode-input {
        width: 50px;
        height: 50px;
        text-align: center;
        font-size: 24px;
        font-weight: 600;
        border: 1px solid #ced4da;
        border-radius: 8px;
        -moz-appearance: textfield; /* Hide arrows on Firefox */
    }
    .vCode-input::-webkit-outer-spin-button,
    .vCode-input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    .vCode-input:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
        outline: none;
    }

    /* Submit Buttons */
    .btn-success {
        background-color: #28a745; /* Success green */
        border-color: #28a745;
        color: #fff;
        padding: 12px 40px;
        border-radius: 25px; /* Pill shape */
        font-size: 18px;
        font-weight: 600;
        transition: background-color 0.3s ease, transform 0.2s ease;
        position: relative;
        overflow: hidden;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 150px;
    }

    .btn-success p {
        margin: 0;
        position: relative;
        z-index: 1;
    }

    .btn-success span {
        position: absolute;
        display: block;
        width: 0;
        height: 0;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.15);
        transform: scale(0);
        opacity: 1;
        transition: all 0.4s ease-out;
        z-index: 0;
    }

    .btn-success:hover {
        background-color: #218838; /* Darker green on hover */
        transform: translateY(-2px); /* Subtle lift */
        box-shadow: 0 4px 10px rgba(40, 167, 69, 0.3);
    }

    .btn-success:hover span {
        width: 150%;
        height: 150%;
        transform: scale(1);
        opacity: 0;
    }

    /* Phone Settings Section Specific */
    #CodeForm .form-label span {
        font-weight: 600;
        color: #007bff;
    }

    #CodeForm .text-center a {
        color: #007bff;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.2s ease;
    }
    #CodeForm .text-center a:hover {
        color: #0056b3;
        text-decoration: underline;
    }

    #CodeForm #codeReceiveOrNot {
        color: #777;
    }


    /* Responsive Design */
    @media (max-width: 768px) {
        .editProfile {
            padding: 20px;
            margin-bottom: 20px;
        }

        .editProfile .head h5 {
            font-size: 20px;
        }

        .editProfile .head i {
            font-size: 20px;
        }

        .form-control, .select2-container--default .select2-selection--single {
            padding: 10px 12px;
            font-size: 15px;
        }

        .profilePic .dropify-wrapper {
            width: 120px;
            height: 120px;
        }

        .vCode-input {
            width: 45px;
            height: 45px;
            font-size: 20px;
        }

        .btn-success {
            padding: 10px 30px;
            font-size: 16px;
            min-width: 120px;
        }
    }

    @media (max-width: 576px) {
        body {
            padding: 10px;
        }

        .container {
            margin: 20px auto;
        }

        .editProfile {
            padding: 15px;
            margin-bottom: 15px;
        }

        .editProfile .head {
            margin-bottom: 15px;
            padding-bottom: 10px;
        }

        .editProfile .head h5 {
            font-size: 18px;
        }

        .editProfile .head i {
            font-size: 18px;
        }

        .form-label {
            font-size: 14px;
        }

        .form-control, .select2-container--default .select2-selection--single {
            padding: 8px 10px;
            font-size: 14px;
        }

        .profilePic .dropify-wrapper {
            width: 100px;
            height: 100px;
        }

        .vCode-input {
            width: 40px;
            height: 40px;
            font-size: 18px;
        }

        .btn-success {
            padding: 8px 25px;
            font-size: 15px;
            min-width: unset;
        }
    }
    :root {
        --main-orange: rgba(244, 168, 53, 0.8);
        --main-orange-solid: #f4a835;
    }

    .editProfile {
        background-color: white;
        border: 2px solid var(--main-orange);
    }

    .editProfile .head {
        border-color: var(--main-orange);
    }
    .editProfile .head h5 {
        color: #FFF;
    }

    .form-control,
    .select2-container--default .select2-selection--single {
        border: 2px solid rgba(244, 168, 53, 0.4);
        background-color: rgba(244, 168, 53, 0.07);
        color: #333;
    }
    .form-control:focus,
    .select2-container--default .select2-selection--single:focus-within {
        border-color: var(--main-orange-solid);
        box-shadow: 0 0 0 0.25rem rgba(244, 168, 53, 0.25);
    }

    .btn-success {
        background-color: var(--main-orange-solid) !important;
        border-color: var(--main-orange-solid) !important;
        box-shadow: 0 4px 12px rgba(244, 168, 53, 0.3);
    }
    .btn-success:hover {
        background-color: #e49d20 !important;
        box-shadow: 0 6px 14px rgba(244, 168, 53, 0.4);
    }



    .profilePic .initials-placeholder {
        width: 150px;
        height: 150px;
        background-color: var(--main-orange-solid);
        border-radius: 50%;
        font-size: 40px;
        font-weight: bold;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        text-transform: uppercase;
    }

    .initials-placeholder {
        width: 150px;
        height: 150px;
        background-color: var(--main-orange-solid);
        border-radius: 50%;
        font-size: 40px;
        font-weight: bold;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        text-transform: uppercase;
    }

    .initials-avatar {
    width: 140px;
    height: 140px;
    background-color: #f4a83533;
    color: #fff;
    font-size: 36px;
    font-weight: bold;
    position: relative;
    cursor: pointer;
    margin: auto;
    transition: 0.3s ease-in-out;
    border: 2px dashed #f4a835;
}

.initials-text {
    z-index: 1;
}

.overlay-upload {
    position: absolute;
    bottom: 0;
    right: 0;
    background-color: #f4a835;
    color: white;
    padding: 6px;
    border-radius: 50%;
    font-size: 16px;
    cursor: pointer;
    z-index: 2;
    transition: background 0.3s ease;
}

.overlay-upload:hover {
    background-color: #d68b00;
}

.initials-avatar-full {
    width: 140px;
    height: 140px;
    background-color: #f4a83533;
    color: #fff;
    font-size: 36px;
    font-weight: bold;
    border-radius: 50%;
    cursor: pointer;
    position: relative;
    border: 2px dashed #f4a835;
    transition: 0.3s ease-in-out;
    overflow: hidden;
}

.initials-text {
    z-index: 1;
}

.camera-icon {
    font-size: 20px;
    margin-top: 8px;
    opacity: 0;
    transition: 0.3s;
    color: #fff;
}

.initials-avatar-full:hover .camera-icon {
    opacity: 1;
}
.initials-avatar-full {
    width: 140px;
    height: 140px;
    background-color: #f4a83533;
    color: #fff;
    font-size: 36px;
    font-weight: bold;
    border-radius: 50%;
    cursor: pointer;
    position: relative;
    border: 2px dashed #f4a835;
    transition: 0.3s ease-in-out;
    overflow: hidden;
    background-size: cover;
    background-position: center;
}

.initials-text {
    z-index: 1;
    transition: 0.3s;
}

.camera-icon {
    font-size: 20px;
    margin-top: 8px;
    opacity: 0;
    transition: 0.3s;
    color: #fff;
}

.initials-avatar-full:hover .camera-icon {
    opacity: 1;
}

.initials-avatar-full {
    width: 140px;
    height: 140px;
    background-color: #f4a83533;
    color: #fff;
    font-size: 36px;
    font-weight: bold;
    border-radius: 50%;
    cursor: pointer;
    position: relative;
    border: 2px dashed #f4a835;
    overflow: hidden;

    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;

    transition: background-image 0.5s ease-in-out, transform 0.3s ease;
}

.initials-avatar-full:hover {
    transform: scale(1.05);
    box-shadow: 0 0 12px #f4a83588;
}

.initials-text {
    z-index: 1;
    transition: 0.3s;
    padding-top:11px
}

.camera-icon {
    font-size: 20px;
    margin-top: 8px;
    opacity: 0;
    transition: 0.3s;
    color: #fff;
}

.initials-avatar-full:hover .camera-icon {
    opacity: 1;
}

@keyframes fadeInImage {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}
.initials-avatar-full {
    width: 140px;
    height: 140px;
    background-color: #f4a83533;
    border: 2px dashed #f4a835;
    border-radius: 50%;
    position: relative;
    cursor: pointer;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    transition: background-image 0.5s ease-in-out, transform 0.3s ease;

    display: flex;
    align-items: center;
    justify-content: center;
}

.initials-text {
    font-size: 38px;
    font-weight: bold;
    color: #CCC;
    z-index: 2;
    pointer-events: none;
}
.editProfile {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 30px;
    box-shadow: 0 0 15px rgba(0,0,0,0.05);
    width: 100%;
}

.editProfile form .form-control {
    height: 45px;
    border-radius: 8px;
}

.editProfile button.btn-success {
    padding: 10px 30px;
    font-weight: bold;
    border-radius: 8px;
}


</style>
<div class="editProfile">
    <div class="head">
        <h5> <i class="fas fa-user me-2"></i> {{__('frontend.Personal Info')}}</h5>
    </div>
    <form method="post" action="{{route('profile.changeBasicDataOFProfile')}}" class="row" id="Form">
        @csrf
        <div class="col-12 p-2">
        @php
            $isDefaultImage = is_null($user->logo);
            $defaultFile = $isDefaultImage ? null : get_file($user->logo);

            $username = trim($user->name ?? '');

            if ($username === '') {
                $initials = '??';
            } else {
                $nameParts = preg_split('/\s+/', $username);

                $firstInitial = mb_substr($nameParts[0], 0, 1, 'UTF-8');

                $secondInitial = isset($nameParts[1]) && $nameParts[1] !== ''
                    ? mb_substr($nameParts[1], 0, 1, 'UTF-8')
                    : '';

                $initials = mb_strtoupper($firstInitial, 'UTF-8');
                if ($secondInitial !== '') {
                    $initials .= ' ' . mb_strtoupper($secondInitial, 'UTF-8');
                }
            }
        @endphp

            <div class="profilePic text-center">
                @if($isDefaultImage)
                    <label for="uploadAvatar" class="initials-avatar-full d-flex align-items-center justify-content-center flex-column" id="avatarPreviewContainer">
                        <span class="initials-text" id="avatarInitials">{{ $initials }}</span>
                        <i class="fas fa-camera camera-icon"></i>
                        <input type="file" name="logo" id="uploadAvatar" class="d-none" accept="image/*" />
                    </label>
                @else
                    <input name="logo" type="file" id="input-file-now-custom-1" class="dropify" data-default-file="{{ $defaultFile }}" />
                @endif
            </div>
        </div>
        <div class="col-12 p-2">
            <label for="name" class="form-label"> <i class="fas fa-user me-2"></i> {{__('frontend.FullName')}}* </label>
            <input value="{{$user->name}}" data-validation="required,length" data-validation-length="min2" type="text" class="form-control" name="name" id="name" placeholder="{{__('frontend.enter FullName')}}">
        </div>
        <div class="col-md-12 p-2">
            <label for="city" class="form-label"> <i class="fa-solid fa-city me-2"></i> {{__('frontend.City')}} </label>
            <select data-validation="required" name="city_id" id="city" class="select2">
                @if ($user->city_id != null)
                    <option value=""> {{__('frontend.selectCity')}} </option>
                @endif
                @foreach($cities as $city)
                    <option {{$user->city_id == $city->id ?"selected":""}} value="{{$city->id}}"> {{$city->title}} </option>
                @endforeach
            </select>
        </div>

        <div class="col-12 pt-4 p-2 text-center">

            <button id="submit_button" class=" btn btn-success " type="submit">
                <p class="px-5">{{__('frontend.ok')}}</p>
                <span></span>
            </button>
        </div>
    </form>
</div>

<div class="editProfile">
    <div class="head">
        <h5> <i class="fas fa-key me-2"></i> {{__('frontend.change Password')}} </h5>
    </div>
    <form method="post" action="{{route('profile.changePasswordOFProfile')}}" class="row" id="FormPassword">
        @csrf

        <div class="col-md-6 p-2 passwordDiv">
            <label for="password" class="form-label"> <i class="fas fa-key me-2"></i> {{__('frontend.Password')}}* </label>
            <input data-validation="required,length" data-validation-length="min6" type="password" class="form-control passwordInput" id="password" name="password" placeholder="*****">
            <span style="display: none" class="eye passwordEye"><i class="far fa-eye"></i></span>
        </div>
        <div class="col-md-6 p-2 passwordDiv">
            <label for="repetPassword" class="form-label"> <i class="fas fa-key me-2"></i> {{__('frontend.confirmPassword')}} *
            </label>
            <input data-validation="required,repeatPassword" type="password" class="form-control passwordInput" id="repetPassword" name="repeatPassword" placeholder="*****">
            <span style="display: none" class="eye passwordEye"><i class="far fa-eye"></i></span>
        </div>
        <div class="col-12 pt-4 p-2 text-center">
            <button id="submit_buttonPassword" class="btn btn-success " type="submit">
                <p class="px-5">{{__('frontend.ok')}}</p>
                <span></span>
            </button>
        </div>
    </form>
</div>

<div class="editProfile">
    <div class="head">
        <h5> <i class="fas fa-phone me-2"></i> {{__('frontend.phone Settings')}} </h5>
    </div>
    <div id="displaySectionHere">
        <section id="registerForm">
            <form method="post" action="{{route('checkPhoneToSendOtpTOChangePhone')}}" class="row" id="ChangePhoneForm">
                @csrf

                <div class="col-12 p-2">
                    <label for="Phone" class="form-label"> <i class="fas fa-phone-alt me-2"></i> {{__('frontend.phone')}}* </label>
                    <input onkeypress="return isNumber(event)" data-validation="required,validatePhoneNumberOfSAR" type="text" class="form-control" id="Phone" name="phone" placeholder="5********">
                </div>


                <div class="col-12 pt-4 p-2 text-center">

                    <button id="submit_button_for_phone_change" class="btn btn-success " type="submit">
                        <p class="px-5">{{__('frontend.ok')}}</p>
                        <span></span>
                    </button>
                </div>
            </form>
        </section>

        <section  id="CodeForm" style="display: none">
            <form id="CompleteRegister" method="post" action="{{route('ChangePhoneProfile')}}" class="row">
                @csrf
                <input type="hidden" name="name" value="" id="nameInCode">
                <input type="hidden" name="password" value="" id="passwordInCode">
                <input type="hidden" name="phone" value="" id="phoneInCode">
                {{--         <input type="hidden" name="code" value="" id="codeInCode">--}}

                <div class="col-12 p-2 text-center">
                    <label class="form-label"> {{__('frontend.PleaseEnterTheSentCode')}} <span> 5XXXXXXXX </span> </label>
                    <div class="vCode " id="vCode" >
                        <input id="vCodeIdFirst" onkeypress="isNumber(evt)"  type="number" class="vCode-input mx-1" maxlength="1">
                        <input type="number"  onkeypress="isNumber(evt)"  class="vCode-input mx-1" maxlength="1">
                        <input type="number"   onkeypress="isNumber(evt)" class="vCode-input mx-1" maxlength="1">
                        <input type="number"  onkeypress="isNumber(evt)"  class="vCode-input mx-1" maxlength="1">
                    </div>
                </div>
                <div class="col-12 p-2 text-center">
                    <button id="CompleteRegisterButton" class="btn btn-success " type="submit">
                        <p class="px-5">  </p>
                        <span></span>
                    </button>
                </div>


            </form>
            <div class="col-md-12 p-2">
                <p class="text-center pt-4 pb-2"> <span id="codeReceiveOrNot">{{__('frontend.I did not receive the activation code')}}</span> <a href="#" id="sendCodeAgain" attr-code-sent="sent"> {{__('frontend.ReSent')}} </a>
                    {{__('frontend.changePhoneAgain')}}
                    <a id="registerAgain" href="#">{{__('frontend.from here')}}</a>
                </p>
            </div>

        </section>

    </div>
</div>
<script>
    document.getElementById('uploadAvatar').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const preview = document.getElementById('avatarPreviewContainer');
                preview.style.backgroundImage = `url('${e.target.result}')`;

                document.getElementById('avatarInitials').style.display = 'none';
                preview.querySelector('.camera-icon').style.display = 'none';
            };
            reader.readAsDataURL(file);
        }
    });

    reader.onload = function (e) {
        const preview = document.getElementById('avatarPreviewContainer');
        preview.style.backgroundImage = `url('${e.target.result}')`;
        preview.style.animation = 'fadeInImage 0.6s ease-in-out';

        document.getElementById('avatarInitials').style.display = 'none';
        preview.querySelector('.camera-icon').style.display = 'none';
    };



</script>
