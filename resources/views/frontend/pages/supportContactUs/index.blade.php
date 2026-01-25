@extends('frontend.layouts.layout')

@section('title')
تواصل معنا
@endsection


@section('content')

    <content>
        <div class="banner">
            <h1> تواصل معنا </h1>
            <ul>
                <li> <a href="{{route('home')}}">الرئيسية </a> </li>
                <li> <a href="#!" class="active"> تواصل معنا </a> </li>
            </ul>
        </div>
        <section class="mapEarth">
            <div class="container">
                <div class="row align-items-center flex-column-reverse flex-lg-row"> {{-- Added flex-column-reverse for mobile, map will appear above contact info --}}
                    <div class="col-lg-6">
                        <div class="worldMap">
                            <div class="earth"></div>
                            <div class="orbic">
                                <svg viewBox="0 0 500 500" width="0" height="0">
                                    <g id="orbic_path">
                                        <ellipse cx="250" cy="250" rx="240" ry="100" transform="rotate(-10,250,250)"></ellipse>
                                        <path d="M230,192Q300,25 375,146"></path>
                                        <path d="M375,146Q450,175 410,301"></path>
                                        <path d="M40,234Q300,125 410,301"></path>
                                        <path d="M410,301Q260,165 125,354"></path>
                                        <path d="M125,354Q150,220 230,192"></path>
                                        <path d="M40,234Q130,200 125,354"></path>
                                    </g>
                                    <g id="orbic_dots">
                                        <defs>
                                            <circle id="orbic_dot" cx="0" cy="0" r="6"></circle>
                                        </defs>
                                        <use id="orbic_dot1" xlink:href="#orbic_dot"></use>
                                        <use id="orbic_dot2" xlink:href="#orbic_dot"></use>
                                        <use id="orbic_dot3" xlink:href="#orbic_dot"></use>
                                        <use id="orbic_dot4" xlink:href="#orbic_dot"></use>
                                        <use id="orbic_dot5" xlink:href="#orbic_dot"></use>
                                    </g>
                                    <g id="orbic_users">
                                        <image id="orbic_user1" xlink:href="{{asset('frontend')}}/img/user1.webp" width="20%" height="20%"></image>
                                        <image id="orbic_user2" xlink:href="{{asset('frontend')}}/img/user2.webp" width="20%" height="20%"></image>
                                        <image id="orbic_user3" xlink:href="{{asset('frontend')}}/img/user3.webp" width="20%" height="20%"></image>
                                        <image id="orbic_user4" xlink:href="{{asset('frontend')}}/img/user4.webp" width="20%" height="20%"></image>
                                        <image id="orbic_user5" xlink:href="{{asset('frontend')}}/img/user5.webp" width="20%" height="20%"></image>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 pt-lg-5">
                        <h4 class="title"> <span> كن علي اتصال </span> </h4>
                        <div class="companyInfo ">
                            <ul>
                                <li class="" data-aos="fade-up">
                                    <span><i class="fa-solid fa-map-location"></i></span>
                                    @if(Cookie::get('branch') == 'yanbu')
                                      <p class="ms-3">
                                            فروعنا :
                                        <a target="_blank" href="https://maps.app.goo.gl/cAvHub78qk2jcy9DA" > {{ $settings->address1 ?? "السعودية - الرياض - شارع الوحدة" }}</a> <br>
                                        <ul>
                                          <li><a target="_blank" href="https://maps.app.goo.gl/QaPjsmrTQ3jgcq6u8" > الأمير فيصل، حي الخالدية، جدة 23423</a></li>
                                          <li><a target="_blank" href="https://maps.app.goo.gl/WEv3MkTyMmLBdeWE9" > 3032 الرياض، حي الملك فيصل، شارع أم المؤمنين سودة بنت زمعه</a></li>
                                        </ul>
                                      </p>
                                    @elseif(Cookie::get('branch') == 'jeddah')
                                        <p class="ms-3">
                                            فروعنا :
                                        <a target="_blank" href="https://maps.app.goo.gl/QaPjsmrTQ3jgcq6u8" > الأمير فيصل، حي الخالدية، جدة 23423</a> <br>
                                        <ul>
                                          <li><a target="_blank" href="https://maps.app.goo.gl/cAvHub78qk2jcy9DA" > {{ $settings->address1 ?? "السعودية - الرياض - شارع الوحدة" }}</a></li>
                                          <li><a target="_blank" href="https://maps.app.goo.gl/WEv3MkTyMmLBdeWE9" > 3032 الرياض، حي الملك فيصل، شارع أم المؤمنين سودة بنت زمعه</a></li>
                                        </ul>
                                       </p>
                                        @elseif(Cookie::get('branch') == 'riyadh')
                                        <p class="ms-3">
                                            فروعنا :
                                        <a target="_blank" href="https://maps.app.goo.gl/WEv3MkTyMmLBdeWE9" > 3032 الرياض، حي الملك فيصل، شارع أم المؤمنين سودة بنت زمعه</a> <br>
                                        <ul>
                                          <li><a target="_blank" href="https://maps.app.goo.gl/cAvHub78qk2jcy9DA" > {{ $settings->address1 ?? "السعودية - الرياض - شارع الوحدة" }}</a></li>
                                          <li><a target="_blank" href="https://maps.app.goo.gl/QaPjsmrTQ3jgcq6u8" > الأمير فيصل، حي الخالدية، جدة 23423</a></li>
                                        </ul>
                                       </p>
                                       @else
                                       <p class="ms-3">
                                            فروعنا :
                                        <a target="_blank" href="https://maps.app.goo.gl/cAvHub78qk2jcy9DA" > {{ $settings->address1 ?? "السعودية - الرياض - شارع الوحدة" }}</a> <br>
                                        <ul>
                                          <li><a target="_blank" href="https://maps.app.goo.gl/QaPjsmrTQ3jgcq6u8" > الأمير فيصل، حي الخالدية، جدة 23423</a></li>
                                          <li><a target="_blank" href="https://maps.app.goo.gl/WEv3MkTyMmLBdeWE9" > 3032 الرياض، حي الملك فيصل، شارع أم المؤمنين سودة بنت زمعه</a></li>
                                        </ul>
                                      </p>
                                      @endif
                                </li>
                                <li class="" data-aos="fade-up">
                                    <span><i class="fa-solid fa-phone"></i></span>
                                    <p class="ms-3">
                                        المبيعات :
                                        <a href="tel:{{$settings->callNumber ?? '+966 0123456789'}}"> {{$settings->callNumber ?? '+966 0123456789'}} </a>
                                        <a href="tel:{{$settings->whatsappNumber ?? '+966 0123456789'}}"> {{$settings->whatsappNumber ?? '+966 0123456789'}} </a>
                                        <a href="tel:{{$settings->phone1 ?? '+966 0123456789'}}"> {{$settings->phone1 ?? '+966 0123456789'}} </a>
                                        <a href="tel:{{$settings->phone2 ?? '+966 0123456789'}}"> {{$settings->phone2 ?? '+966 0123456789'}} </a>
                                        <a href="tel:{{$settings->phone3 ?? '+966 0123456789'}}"> {{$settings->phone3 ?? '+966 0123456789'}} </a>
                                        <a href="tel:{{$settings->phone4 ?? '+966 0123456789'}}"> {{$settings->phone4 ?? '+966 0123456789'}} </a>
                                    </p>
                                </li>
                                <li class="" data-aos="fade-up">
                                    <span><i class="fa-solid fa-message-question"></i></span>
                                    <p class="ms-3">
                                        الشكاوي والاقتراحات :
                                        <a href="tel:{{$settings->phone1}}">{{$settings->phone1}}</a>
                                    </p>
                                </li>
                                <li class="" data-aos="fade-up">
                                    <span><i class="fas fa-envelope"></i></span>
                                    <p class="ms-3">
                                        البريد الالكتروني :
                                        <a href="mailto:{{$settings->email1}}">{{$settings->email1}}</a>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="contactForm">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 p-2 mb-5 mb-md-0 " data-aos=" fade-up">
                        <div class="headTitle text-start ">
                            <h2> تواصل معنا </h2>
                            <p> اطلب عاملتك الان وسيقوم فريق خدمة العملاء لدينا بالتواصل معك بأسرع وقت ... </p>
                        </div>
                        <form id="Form" class="needs-validation custom-contact-form" action="{{route('front.contact_us_action')}}" method="post" novalidate>
                            @csrf

                            <div class="form-group">
                                <label for="nameInput"><i class="fas fa-user"></i> الاسم كامل *</label>
                                <input type="text" name="name" id="nameInput" required placeholder="الاسم كامل">
                                <small class="error-message"></small>
                            </div>

                            <div class="form-group">
                                <label for="phoneInput"><i class="fas fa-phone-alt"></i> رقم الجوال *</label>
                                <input type="text" name="phone" id="phoneInput" required onkeypress="return isNumber(event)" placeholder="رقم الجوال">
                                <small class="error-message"></small>
                            </div>

                            <div class="form-group">
                                <label for="subjectInput"><i class="fas fa-comment-dots"></i> الموضوع</label>
                                <input type="text" name="subject" id="subjectInput" placeholder="الموضوع">
                                <small class="error-message"></small>
                            </div>

                            <div class="form-group">
                                <label for="messageTextarea"><i class="fas fa-feather-alt"></i> رسالتك *</label>
                                <textarea name="message" id="messageTextarea" rows="4" required placeholder="رسالتك"></textarea>
                                <small class="error-message"></small>
                            </div>

                            <div class="text-center pt-3">
                                <button type="submit" class="submit-button" id="submit_button">
                                    <i class="fas fa-paper-plane ms-2"></i> إرسال
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 p-2 " data-aos=" fade-up">
                        <div class="googleMap wow fadeInUp "> {{-- Wrapped iframe in a div for better control --}}
                        <div class="map-responsive">
                            @if(Cookie::get('branch') == 'yanbu')
                              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14568.708601963628!2d38.0609721!3d24.0952649!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15b9072220f00e2f%3A0xc45245d46a507938!2z2LTYsdmD2Kkg2KfZitis2KfYsiDZhNmE2KfYs9iq2YLYr9in2YU!5e0!3m2!1sen!2ssa!4v1711472449580!5m2!1sen!2ssa" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            @elseif(Cookie::get('branch') == 'jeddah')
                              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d399192.549344057!2d39.00448971889578!3d21.63386608525768!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x147e5180a6ce7bd%3A0xa97ff9e14a988412!2z2LTYsdmD2Kkg2KfZitis2KfYsiDZhNmE2KfYs9iq2YLYr9in2YU!5e0!3m2!1sen!2ssa!4v1759667574597!5m2!1sen!2ssa" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            @elseif(Cookie::get('branch') == 'riyadh')
                              <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1280.9175596126404!2d46.768513254663944!3d24.76180731424474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjTCsDQ1JzQyLjAiTiA0NsKwNDYnMTAuMyJF!5e0!3m2!1sen!2ssa!4v1759666548668!5m2!1sen!2ssa" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            @else
                              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14568.708601963628!2d38.0609721!3d24.0952649!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15b9072220f00e2f%3A0xc45245d46a507938!2z2LTYsdmD2Kkg2KfZitis2KfYsiDZhNmE2KfYs9iq2YLYr9in2YU!5e0!3m2!1sen!2ssa!4v1711472449580!5m2!1sen!2ssa" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            @endif
                        </div>
                </div>
            </div>
        </section>
        <section class="references py-6">
        <div class="container">
            <div class="sectionTitle text-center mb-5" data-aos="fade-up">
            <h2>الجهات المرجعية</h2>
            <p>نفخر بالتعاون مع أبرز الجهات الحكومية والرسمية</p>
            </div>

            <div class="swiper referencesSlider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                <div class="referenceLogo glass-card">
                    <img src="{{asset('frontend')}}/img/Ministry-of-Foreign-Affairs-01.svg" alt="وزارة الخارجية" loading="lazy" />
                    <div class="shine"></div>
                </div>
                </div>
                <div class="swiper-slide">
                <div class="referenceLogo glass-card">
                    <img src="{{asset('frontend')}}/img/Ministry-of-Interior-01.svg" alt="وزارة الداخلية" loading="lazy" />
                    <div class="shine"></div>
                </div>
                </div>
                <div class="swiper-slide">
                <div class="referenceLogo glass-card">
                    <img src="{{asset('frontend')}}/img/Ministry-of-Labor-and-Social-Development.svg" alt="وزارة الموارد البشرية" loading="lazy" />
                    <div class="shine"></div>
                </div>
                </div>
                <div class="swiper-slide">
                <div class="referenceLogo glass-card">
                    <img src="{{asset('frontend')}}/img/musand.svg" alt="مساند" loading="lazy" />
                    <div class="shine"></div>
                </div>
                </div>
            </div>
            <div class="swiper-pagination mt-5"></div>
            </div>
        </div>
        </section>
    </content>
@endsection
@section('js')
<script>
    $(document).on('submit', 'form#Form', function (e) {
        e.preventDefault();

        let myForm = $("#Form")[0];
        let formData = new FormData(myForm);
        let url = $(this).attr('action');
        let submitBtn = $('#submit_button');

        // Reset errors
        $(myForm).find('.is-invalid').removeClass('is-invalid');
        $(myForm).find('.invalid-feedback').text('');

           const phoneInput = $('#phoneInput');
            const phoneValue = phoneInput.val().trim();
            const phoneRegex = /^(00966|966|\+966)?5[0-9]{8}$/;

            if (!phoneRegex.test(phoneValue)) {
                phoneInput.addClass('is-invalid');
                phoneInput.next('.error-message').text("يرجى إدخال رقم جوال سعودي صحيح يبدأ بـ 5 بدون صفر");
                return; // إيقاف الإرسال
            } else {
                phoneInput.removeClass('is-invalid');
                phoneInput.next('.invalid-feedback').text('');
            }

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            cache: false,

            beforeSend: function () {
                submitBtn.attr('disabled', true);
                submitBtn.html(`<i class='fa fa-spinner fa-spin'></i> جاري الإرسال...`);
            },

            success: function (response) {

                Swal.fire({
                    title: '🎉 {{ __("frontend.Message Successfully Sent") }}',
                    html: `
                        <div style="display:flex;flex-direction:column;align-items:center;gap:20px">
                            <div id="lottie-success" style="width:140px;height:140px;"></div>
                            <div style="font-size: 16px; font-weight: 500; color: #333;">
                                {{ __("frontend.Thanks ,We will contact you as soon as possible.") }}
                            </div>
                        </div>
                    `,
                    showConfirmButton: true,
                    confirmButtonText: '{{ __("frontend.confirm") }} 🚀',
                    customClass: {
                        popup: 'ultra-glass-popup',
                        confirmButton: 'ultra-btn'
                    },
                    buttonsStyling: false,
                    timer: 6000,
                    timerProgressBar: true,
                    didOpen: () => {
                        lottie.loadAnimation({
                            container: document.getElementById('lottie-success'),
                            renderer: 'svg',
                            loop: false,
                            autoplay: true,
                            path: 'https://assets6.lottiefiles.com/packages/lf20_jbrw3hcz.json' // ✅ Success Lottie
                        });
                    }
                });

                $('#Form')[0].reset();
            },

            error: function (xhr) {
                if (xhr.status === 422 && xhr.responseJSON?.errors) {
                    const errors = xhr.responseJSON.errors;

                    for (const field in errors) {
                        const input = $(`[name="${field}"]`);
                        input.addClass('is-invalid');
                        input.next('.invalid-feedback').text(errors[field][0]);
                    }

                    cuteAlert({
                        title: "خطأ في البيانات",
                        message: "يرجى تصحيح الحقول المطلوبة.",
                        type: "error",
                        buttonText: "حسناً"
                    });
                } else {
                    cuteAlert({
                        title: "خطأ",
                        message: "حدث خطأ غير متوقع، حاول مرة أخرى لاحقاً.",
                        type: "error",
                        buttonText: "حسناً"
                    });
                    console.error("خطأ:", xhr.responseText);
                }
            },

            complete: function () {
                submitBtn.removeAttr('disabled');
                submitBtn.html(`{{__('frontend.Send Message')}} <i class="fas fa-paper-plane ms-2"></i>`);
            }
        });
    });

    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        const charCode = (evt.which) ? evt.which : evt.keyCode;
        return !(charCode > 31 && (charCode < 48 || charCode > 57));
    }
</script>

<!-- Lottie -->
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.10.2/lottie.min.js"></script>


<script>

    if (typeof Swiper !== 'undefined') {
        new Swiper('.referencesSlider', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 20,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 50,
                },
            },
        });
    }
</script>
@endsection
