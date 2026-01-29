<link rel="stylesheet" href="{{asset('frontend/css/contactUs_style.css')}}" />
<section id="contactUs">
    <div class="container">
        <div class="contact-container">
            <h2 class="contact-title">تواصل معنا</h2>
            <p class="contact-sub">يسعدنا تواصلك معنا من خلال البيانات التالية أو النموذج</p>
            <div class="row mt-5">
                <div class="col-md-5">
                    <div class="contact-info-block">
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="info-text">
                                <h6>موقعنا</h6>
                                @if(Cookie::get('branch') == 'yanbu')
                                <p>4198 علي بن أبي طالب، السميـري، 8130، ينبع 46424</p>
                                @elseif(Cookie::get('branch') == 'jeddah')
                                <p>الأمير فيصل، حي الخالدية، جدة 23423</p>
                                @elseif(Cookie::get('branch') == 'riyadh')
                                <p>3032 الرياض، حي الملك فيصل، شارع أم المؤمنين سودة بنت زمعه</p>
                                @else
                                <p>4198 علي بن أبي طالب، السميـري، 8130، ينبع 46424</p>
                                @endif                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="info-text">
                                <h6>البريد الإلكتروني</h6>
                                <p>info@ejazrecruitment.sa</p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="info-text">
                                <h6>أرقام الجوال</h6>
                                <p>
                                    590722225<br>
                                    920020708<br>
                                    0500322225<br>
                                    0580168402<br>
                                    0580000693<br>
                                    0536981668
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <form action="{{route('front.contact_us_action')}}" method="post" id="Form" class="needs-validation contact-form" novalidate>
                        @csrf
                        <div class="form-group">
                            <i class="fa-solid fa-user form-icon"></i>
                            <input type="text" name="name" class="form-control ps-5" placeholder="الاسم كامل" required>
                            <div class="invalid-feedback">الرجاء إدخال الاسم الكامل</div>
                        </div>
                        <div class="form-group">
                            <i class="fa-solid fa-phone form-icon"></i>
                            <input type="text" id="phoneInput" name="phone" class="form-control ps-5" placeholder="رقم الجوال" required onkeypress="return isNumber(event)">
                            <div class="invalid-feedback">الرجاء إدخال رقم الجوال</div>
                        </div>
                        <div class="form-group">
                            <i class="fa-solid fa-message form-icon"></i>
                            <input type="text" name="subject" class="form-control ps-5" placeholder="الموضوع" required>
                            <div class="invalid-feedback">يرجى كتابة الموضوع</div>
                        </div>
                        <div class="form-group">
                            <i class="fa-solid fa-feather form-icon"></i>
                            <textarea name="message" class="form-control ps-5" rows="5" placeholder="رسالتك" required></textarea>
                            <div class="invalid-feedback">لا تترك الرسالة فارغة</div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="send-btn" id="submit_button">
                                <i class="fa-solid fa-paper-plane"></i> إرسال
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Validation style toggle
    document.querySelector('.contact-form').addEventListener('submit', function (e) {
        const inputs = this.querySelectorAll('input, textarea');
        let valid = true;

        inputs.forEach(input => {
            if (!input.checkValidity()) {
                input.classList.add('is-invalid');
                valid = false;
            } else {
                input.classList.remove('is-invalid');
            }
        });

        if (!valid) e.preventDefault();
    });
</script>
