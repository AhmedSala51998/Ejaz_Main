
@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.RegisterPage')}}
@endsection

@section('styles')
  <link rel="stylesheet" href="{{asset('frontend/css/register_style.css')}}" />
@endsection


@section('content')
    <div id="displaySectionHere">
        @include('frontend.pages.auth.register.parts.register-form')
        @include('frontend.pages.auth.register.parts.code')
        <!-- Verification Popup -->
        <div id="verifyPhonePopup" class="verify-phone-popup d-none">
            <div class="verify-phone-content">
                <h3>هل تريدنا التحقق من رقم جوالك؟</h3>
                <p>سنرسل لك كود تفعيل لتأكيد رقم جوالك.</p>
                <div class="verify-phone-buttons">
                    <button id="verifyYes" class="btn-yes">نعم</button>
                    <button id="verifyNo" class="btn-no">لا</button>
                </div>
            </div>
        </div>

    </div
@endsection

@section('js')
    <script>

        var timeOfSendingCode = 0;
        // Add validator
        $.formUtils.addValidator({
            name : 'validatePhoneNumberOfSAR',
            validatorFunction : function(value, $el, config, language, $form) {
                return /^(05)[0-9]{8}$|^(5)[0-9]{8}$/.test(value);
            },
            errorMessage : "{{__('frontend.phone format is incorrect')}}",
            errorMessageKey: 'validatePhoneNumberOfSAR'
        });


        $.formUtils.addValidator({
            name : 'repeatPassword',
            validatorFunction : function(value, $el, config, language, $form) {
                return value == $("#password").val()
            },
            errorMessage : "{{__('frontend.PasswordAndConfirmPasswordIsNotTheSame')}}",
            errorMessageKey: 'repeatPasswordKey'
        });

        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {

                return false;
            }

            return true;
        }


        $(".passwordEye").click(function() {

            $(this).find('.far').toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).closest('.passwordDiv').find('.passwordInput'));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });

        var codeSentToMobile
        $(document).on('submit', 'form#Form', function(e) {
    e.preventDefault(); // تمنع الإرسال الافتراضي

    // تحديث الحقول الداخلية
    $("#nameInCode").val($("#name").val())
    $("#passwordInCode").val($("#password").val())
    $("#phoneInCode").val($("#Phone").val())

    // إظهار Popup للسؤال
    $('#verifyPhonePopup').removeClass('d-none');

    // زر نعم: إرسال الفورم وإرسال الكود الحقيقي
    $('#verifyYes').off('click').on('click', function() {
        $('#verifyPhonePopup').addClass('d-none'); // إخفاء البوب أب

        var phone = $('#Phone').val();

        // ⬅️ تحقق أولاً من رقم الهاتف
        $.ajax({
            url: '/check-phone',
            type: 'POST',
            data: {
                phone: phone,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(res) {
                if (res.exists) {
                    $('#submitBtn').attr('disabled', false);
                    $('.btn-text').show();
                    $('#arrowIcon').show();
                    $('#dotLoader').addClass('d-none');
                    // ⛔ الرقم موجود بالفعل → أظهر رسالة وارجع
                    cuteToast({
                        type: "error",
                        message: "رقم الجوال مسجل مسبقًا",
                        timer: 3000
                    });
                    return;
                }

                // ✅ الرقم جديد → أكمل عملية الإرسال
                var myForm = $("#Form")[0];
                var formData = new FormData(myForm);
                var url = $('#Form').attr('action');

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $('#submitBtn').attr('disabled', true);
                        $('.btn-text').hide();
                        $('#arrowIcon').hide();
                        $('#dotLoader').removeClass('d-none');
                    },
                    success: function(data) {
                        $('#submitBtn').attr('disabled', false);
                        $('.btn-text').show();
                        $('#arrowIcon').show();
                        $('#dotLoader').addClass('d-none');

                        // ✅ هنا نعرض صفحة الكود فقط لو الرقم جديد
                        codeSentToMobile = data;
                        $("#registerForm").hide();
                        $('#hide-code').show();
                        $('#register-hide').hide();
                        $("#CodeForm").show();
                        document.getElementById("vCodeIdFirst").focus();
                        timeOfSendingCode++;
                        sendActivationCodeToPhone();
                    },
                    error: function(err) {
                        $('#submitBtn').attr('disabled', false);
                        $('.btn-text').show();
                        $('#arrowIcon').show();
                        $('#dotLoader').addClass('d-none');
                        let msg = err.responseJSON?.message || err.responseText || "حدث خطأ";
                        cuteToast({ type: "error", message: msg, timer: 3000 });
                    }
                });
            }
        });
    });


    // زر لا: لا نرسل كود حقيقي وننقل مباشرة للصفحة المناسبة
    $('#verifyNo').off('click').on('click', function() {
        $('#verifyPhonePopup').addClass('d-none');

        var myForm = $("#Form")[0];
        var formData = new FormData(myForm);
        formData.append('code', '1234'); // كود افتراضي

        $.ajax({
            url: "{{ route('register_action') }}",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(res){
                cuteToast({
                    type: "success",
                    message: "تم تسجيل حسابك بنجاح",
                    timer: 3000
                });

                @if(request()->segment(2))
                    location.href = "{{ route('frontend.show.worker', ['id' => request()->segment(2)]) }}";
                @else
                    location.href = "{{ route('auth.profile') }}";
                @endif
            },
            error: function(err){
                $('#submitBtn').attr('disabled', false);
                $('.btn-text').show();
                $('#arrowIcon').show();
                $('#dotLoader').addClass('d-none');
                if (err.status === 409) {

                    let msg = err.responseJSON?.message || 'رقم الجوال مسجل مسبقًا';
                    cuteToast({
                        type: "error",
                        message: msg,
                        timer: 3000
                    });
                } else {

                    cuteToast({
                        type: "error",
                        message: "حدث خطأ من فضلك راجع البيانات المدخله",
                        timer: 3000
                    });
                }
            }
        });
    });
});



    </script>
    <script>
        var vCode = (function () {
            //cache dom
            var $inputs = $("#vCode").find("input");
            //bind events
            $inputs.on('keyup', processInput);
            //define methods
            function processInput(e) {
                var x = e.charCode || e.keyCode;
                if ((x == 8 || x == 46) && this.value.length == 0) {
                    var indexNum = $inputs.index(this);
                    if (indexNum != 0) {
                        $inputs.eq($inputs.index(this) - 1).focus();
                    }
                }
                if (ignoreChar(e))
                    return false;
                else if (this.value.length == this.maxLength) {
                    $(this).next('input').focus();
                }
            }
            function ignoreChar(e) {
                var x = e.charCode || e.keyCode;
                if (x == 37 || x == 38 || x == 39 || x == 40)
                    return true;
                else
                    return false
            }
        })();


       $(document).on('submit', 'form#CompleteRegister', function (e) {
    e.preventDefault();

    const codeHere = [];
    var inputs = $(".vCode-input");
    for (var i = 0; i < inputs.length; i++) {
        if ($(inputs[i]).val() == '' || $(inputs[i]).val() == null) {
            cuteToast({
                type: "error",
                message: "{{__('frontend.please , fill all input with correct code')}}",
                timer: 3000
            });
            return 0;
        } else {
            codeHere.push($(inputs[i]).val());
        }
    }

    if (codeSentToMobile != codeHere.join('')) {
        cuteToast({
            type: "error",
            message: "{{__('frontend.this code is wrong')}}",
            timer: 3000
        });
        return 0;
    }

    $("#codeInCode").val(codeSentToMobile);
    var myForm = $("#CompleteRegister")[0];
    var formData = new FormData(myForm);
    var url = $('#CompleteRegister').attr('action');

    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        beforeSend: function () {
            $('#verifyBtn').attr('disabled', true);
            $('.verify-text').hide();
            $('#verifyArrow').hide();
            $('#dotLoaderVerify').removeClass('d-none');
        },
        success: function (data) {
            window.setTimeout(function () {
                cuteToast({
                    type: "success",
                    message: "{{__('frontend.good operation')}}",
                    timer: 3000
                });
                $('#verifyBtn').attr('disabled', false);
                $('.verify-text').show();
                $('#verifyArrow').show();
                $('#dotLoaderVerify').addClass('d-none');
                location.href = "{{ route('auth.profile') }}";
            }, 2000);
        },
        error: function (data) {
            $('#verifyBtn').attr('disabled', false);
            $('.verify-text').show();
            $('#verifyArrow').show();
            $('#dotLoaderVerify').addClass('d-none');

            if (data.status === 403 || data.status === 500) {
                cuteToast({
                    type: "error",
                    message: "{{__('frontend.the phone is already exists')}}",
                    timer: 3000
                });
            }

           if (data.status === 415) {
                @if(!empty($id))
                    var url = "{{ route('frontend.show.worker', ['id' => $id]) }}";
                    location.replace(url);
                @else
                    var url = "{{ url('/worker') }}";
                    location.replace(url);
                @endif
            }


            if (data.status === 422) {
                cuteToast({
                    type: "error",
                    message: "{{__('frontend.please , fill all input with correct data')}}",
                    timer: 3000
                });
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
});




        $(document).on('click',"#registerAgain",function (e){
            e.preventDefault()
            $("#registerForm").show()
            $("#CodeForm").hide()
            $('#hide-code').hide();
            $('#register-hide').show();
            document.getElementById("vCodeIdFirst").blur();
        })


        $(document).on('click',"#sendCodeAgain",function (e){
            e.preventDefault()
          if ( $("#sendCodeAgain").attr('attr-code-sent') == 'sent')
          {
              $('#sendCodeAgain').html(`<i class='fa fa-spinner fa-spin '></i>`)
              window.setTimeout(function() {
                  $("#codeReceiveOrNot").html("{{__('frontend.CodeIsSentAgain')}}")
                  $("#Form").submit()
                  countdown(1)
                  $("#sendCodeAgain").attr('attr-code-sent',"no_send")
              }, 1000);

          }else{
              cuteToast({
                  type: "error", // or 'info', 'error', 'warning'
                  message: "{{__('frontend.Please wait until the time is up')}}",
                  timer: 3000
              })
             return 0;
          }

        })


        var timeoutHandle;
        function countdown(minutes) {
            var seconds = 60;
            var mins = minutes
            var counter = document.getElementById("sendCodeAgain");
            var current_minutes = mins-1

            let interval = setInterval(() => {
                seconds--;
                counter.innerHTML =
                    current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
                // our seconds have run out
                if(seconds <= 0) {
                    // our minutes have run out
                    if(current_minutes <= 0) {
                        // we display the finished message and clear the interval so it stops.
                        counter.innerHTML = "{{__('frontend.ReSent')}}"
                        $("#codeReceiveOrNot").html("{{__('frontend.I did not receive the activation code')}}")
                        $("#sendCodeAgain").attr('attr-code-sent',"sent")
                        clearInterval(interval);
                    } else {
                        // otherwise, we decrement the number of minutes and change the seconds back to 60.
                        current_minutes--;
                        seconds = 60;
                    }
                }

                // we set our interval to a second.
            }, 1000);
        }

        $('#hide-code').hide();

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

    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        const toggleVisibility = (inputId, toggleId) => {
            const input = document.getElementById(inputId);
            const toggle = document.getElementById(toggleId);
            input.addEventListener("input", function () {
                if (this.value.trim()) {
                    toggle.style.display = "block";
                } else {
                    toggle.style.display = "none";
                    this.type = "password";
                    const icon = toggle.querySelector("i");
                    icon.classList.remove("fa-eye-slash");
                    icon.classList.add("fa-eye");
                }
            });
        };
        toggleVisibility("password", "togglePassword");
        toggleVisibility("repeatPassword", "toggleRepeatPassword");
    });

    function isNumber(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        return !(charCode > 31 && (charCode < 48 || charCode > 57));
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('Form');
        const submitBtn = document.getElementById('submitBtn');
        const dotLoader = document.getElementById('dotLoader');
        const btnText = submitBtn.querySelector('.btn-text');
        const arrowIcon = document.getElementById('arrowIcon');

        form.addEventListener('submit', function () {
            submitBtn.disabled = true;
            btnText.style.display = 'none';
            arrowIcon.style.display = 'none';
            dotLoader.classList.remove('d-none');
        });
    });
</script>

<script>
    document.querySelectorAll('#vCode input').forEach((input, index, inputs) => {
  input.addEventListener('input', (e) => {
    const value = e.target.value;

    e.target.value = value.replace(/[^0-9]/g, '').slice(0, 1);

    if (e.target.value && index < inputs.length - 1) {
      inputs[index + 1].focus();
    }
  });

  input.addEventListener('keydown', (e) => {
    if (e.key === 'Backspace' && !e.target.value && index > 0) {
      inputs[index - 1].focus();
    }
  });
});

window.addEventListener('DOMContentLoaded', () => {
  const firstInput = document.querySelector('#vCode input');
  if (firstInput) firstInput.focus();
});

</script>
@endsection
