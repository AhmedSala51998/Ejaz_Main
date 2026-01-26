<style>
    #contactUs {
        background: linear-gradient(to bottom right, #fffdf9, #fff2e6);
        padding: 80px 0;
        font-family: 'Tajawal', sans-serif;
    }

    .contact-container {
        background: #fff;
        border-radius: 28px;
        padding: 60px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.06);
    }

    .contact-title {
        font-size: 2.8rem;
        font-weight: 900;
        text-align: center;
        margin-bottom: 10px;
        color: #1f1f1f;
    }

    .contact-sub {
        text-align: center;
        font-size: 1.1rem;
        color: #777;
        margin-bottom: 40px;
    }

    .contact-form .form-control {
        border-radius: 16px;
        border: 1px solid #ddd;
        padding: 16px 20px;
        margin-bottom: 20px;
        font-size: 1rem;
        background-color: #fcfcfc;
        transition: 0.3s ease;
    }

    .contact-form .form-control:focus {
        border-color: #f28500;
        box-shadow: 0 0 0 3px rgba(242, 133, 0, 0.15);
    }

    .form-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #f28500;
        font-size: 1.1rem;
    }

    .form-group {
        position: relative;
    }

    .send-btn {
        background: linear-gradient(to right, #f28500, #f4a832);
        color: white;
        padding: 14px 36px;
        border-radius: 50px;
        font-weight: bold;
        font-size: 1.1rem;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        border: none;
        transition: 0.3s;
        box-shadow: 0 8px 20px rgba(242,133,0,0.2);
    }

    .send-btn:hover {
        background: #e27a00;
        box-shadow: 0 8px 30px rgba(226,122,0,0.4);
    }

    .contact-info-block {
        background: #fffaf5;
        border-radius: 24px;
        padding: 30px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.04);
    }

    .info-item {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 30px;
        transition: 0.3s;
    }

    .info-item:hover {
        transform: translateY(-4px);
    }

    .info-icon {
        width: 58px;
        height: 58px;
        border-radius: 50%;
        background: linear-gradient(135deg, #f28500, #ffb84d);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        flex-shrink: 0;
        box-shadow: 0 6px 12px rgba(0,0,0,0.1);
        transition: 0.3s;
    }

    .info-item:hover .info-icon {
        transform: scale(1.1);
    }

    .info-text h6 {
        margin: 0;
        font-weight: 700;
        color: #222;
        font-size: 1.05rem;
        margin-bottom: 5px;
    }

    .info-text p {
        margin: 0;
        color: #555;
        font-size: 0.95rem;
        line-height: 1.6;
    }

    .form-control.is-invalid {
        border-color: #e74c3c;
        box-shadow: 0 0 0 4px rgba(231, 76, 60, 0.2);
    }

    .invalid-feedback {
        color: #e74c3c;
        font-size: 0.9rem;
        margin-top: -10px;
        margin-bottom: 15px;
        padding-inline-start: 10px;
        display: block;
    }
    /* Section Titles - Enhanced */
.contact-title {
    font-size: 3.2rem; /* Slightly larger */
    color: #2c3e50; /* Darker, more professional grey */
    font-weight: 800; /* Bolder */
    position: relative;
    padding-bottom: 15px; /* Space for underline effect */
}

.contact-title::after {
    content: '';
    position: absolute;
    left: 50%;
    bottom: 0;
    transform: translateX(-50%);
    width: 80px; /* Short underline */
    height: 4px; /* Thicker underline */
    background: linear-gradient(to right, #D89835, #F2B544); /* Gradient underline */
    border-radius: 2px;
}

.contact-sub {
    color: #7f8c8d; /* Muted grey for subtitle */
    font-size: 1.2rem; /* Slightly larger */
    margin-top: 10px;
}
@media (max-width: 768px) {
    #contactUs {
        padding: 40px 15px;
    }

    .contact-container {
        padding: 30px 20px;
        box-shadow: 0 15px 30px rgba(0,0,0,0.05);
    }

    .contact-title {
        font-size: 2.4rem;
    }

    .contact-sub {
        font-size: 1rem;
        margin-bottom: 30px;
    }

    .row {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    .col-md-5, .col-md-7 {
        max-width: 100%;
        flex: 1 1 100%;
    }

    .contact-info-block {
        padding: 20px;
    }

    .info-item {
        gap: 10px;
    }

    .info-icon {
        width: 48px;
        height: 48px;
        font-size: 18px;
    }

    .info-text h6 {
        font-size: 1rem;
    }

    .info-text p {
        font-size: 0.9rem;
    }

    .contact-form .form-control {
        font-size: 0.95rem;
        padding: 14px 16px 14px 40px;
    }

    .form-icon {
        font-size: 1rem;
        left: 12px;
    }

    .send-btn {
        width: 100%;
        justify-content: center;
        font-size: 1rem;
        padding: 14px 0;
        border-radius: 30px;
        box-shadow: 0 6px 15px rgba(242,133,0,0.15);
    }
}

 .invalid-feedback {
    display: none;
    color: #dc3545;
    font-size: 0.875em;
    margin-top: 0.25rem;
    }

    input.is-invalid + .invalid-feedback,
    textarea.is-invalid + .invalid-feedback {
     display: block;
    }

</style>

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
