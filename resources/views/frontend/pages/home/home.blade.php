@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.Home')}}
@endsection

@section('meta_description')
شركة إيجاز للاستقدام تقدم خدمات استقدام العمالة المنزلية داخل المملكة العربية السعودية بإجراءات سريعة وأسعار تنافسية وخدمة موثوقة عبر منصة مساند.
@endsection

@section('styles')

<script type="application/ld+json">
    {
    "@context": "https://schema.org",
    "@graph": [
        {
        "@type": "WebSite",
        "@id": "https://isteqdamejaz.com/#website",
        "url": "https://isteqdamejaz.com/",
        "name": "شركة إيجاز للاستقدام",
        "description": "شركة إيجاز للاستقدام – خدمات استقدام العمالة المنزلية داخل المملكة العربية السعودية",
        "publisher": {
            "@id": "https://isteqdamejaz.com/#organization"
        },
        "hasPart": {
            "@type": "SiteNavigationElement",
            "name": [
            "الرئيسية",
            "طلب استقدام",
            "من نحن",
            "دول الاستقدام",
            "المدونة",
            "اتصل بنا"
            ],
            "url": [
            "https://isteqdamejaz.com/",
            "https://isteqdamejaz.com/all-workers",
            "https://isteqdamejaz.com/about",
            "https://isteqdamejaz.com/countries",
            "https://isteqdamejaz.com/blog",
            "https://isteqdamejaz.com/supports/contactUs"
            ]
        }
        },
        {
        "@type": "Organization",
        "@id": "https://isteqdamejaz.com/#organization",
        "name": "شركة إيجاز للاستقدام",
        "alternateName": "Ejaz Recruitment Company",
        "url": "https://isteqdamejaz.com/",
        "logo": {
            "@type": "ImageObject",
            "url": "https://isteqdamejaz.com/frontend/img/google-logo.png"
        }
        }
    ]
    }
    </script>
    <style>
    </style>
@endsection


@section('content')


    <content>
        <?php
        $local='ar'
        ?>
                @include('frontend.pages.home.parts.slider')
{{--        <!-- *** about section -->--}}
{{--        @include('frontend.pages.home.parts.aboutUs')--}}
                @include('frontend.pages.home.parts.ourService')
        @include('frontend.pages.home.parts.customarServices')
                @include('frontend.pages.home.parts.countries')
                @include('frontend.pages.home.parts.appBanner')
{{--                @include('frontend.pages.home.parts.recruitmentOperations')--}}
{{--
                @include('frontend.pages.home.parts.recruitmentSteps')
--}}
                @include('frontend.pages.home.parts.ourStatistics')
                @include('frontend.pages.home.parts.contactUs')
                @include('frontend.pages.home.parts.references')
                @include('frontend.pages.home.parts.latestBlogs')


    </content>

@endsection

@section('js')
<script>
$(document).on('submit', 'form#Form', function (e) {
    e.preventDefault();

    let form = $('#Form');
    let submitBtn = $('#submit_button');
    let formEl = form[0];
    let formData = new FormData(formEl);
    let url = form.attr('action');
    let phoneInput = $('#phoneInput');
    let phoneValue = phoneInput.val().trim();
    let phoneRegex = /^(00966|966|\+966)?5[0-9]{8}$/;

    form.find('input, textarea').removeClass('is-invalid');
    form.find('.invalid-feedback').text('');

    let valid = true;

    form.find('input[required], textarea[required]').each(function () {
        if (!this.checkValidity()) {
            $(this).addClass('is-invalid');
            valid = false;
        }
    });

    if (phoneValue) {
        if (!phoneRegex.test(phoneValue)) {
            phoneInput.addClass('is-invalid');
            phoneInput.next('.invalid-feedback').text("يرجى إدخال رقم جوال سعودي صحيح يبدأ بـ 5 بدون صفر");
            valid = false;
        }
    } else {
        phoneInput.addClass('is-invalid');
        phoneInput.next('.invalid-feedback').text("الرجاء إدخال رقم الجوال");
        valid = false;
    }

    if (!valid) {
        return;
    }

    submitBtn.prop('disabled', true);
    submitBtn.html(`
        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
        جاري الإرسال...
    `);

    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        processData: false,
        contentType: false,
        cache: false,
        success: function (data) {
            submitBtn.prop('disabled', false);
            submitBtn.html(`<i class="fa-solid fa-paper-plane me-2"></i> إرسال`);

            Swal.fire({
                title: '🎉 تم الإرسال بنجاح!',
                html: `
                    <div style="display: flex; flex-direction: column; align-items: center; gap: 20px; font-family: 'Tajawal', sans-serif; direction: rtl;">
                        <div id="lottie-success" style="width: 140px; height: 140px;"></div>
                        <p style="font-size: 18px; color: #2c3e50; font-weight: 600; margin: 0;">
                            شكرًا لتواصلك معنا! <br> سنقوم بالرد عليك في أقرب وقت ممكن.
                        </p>
                        <button id="swal-ok-btn" style="
                            margin-top: 10px;
                            background: linear-gradient(135deg, #f4a835, #ffb23c);
                            border: none;
                            color: white;
                            font-size: 16px;
                            padding: 10px 28px;
                            border-radius: 25px;
                            cursor: pointer;
                            box-shadow: 0 8px 20px rgba(244, 168, 53, 0.35);
                            transition: all 0.3s ease-in-out;
                        " onmouseover="this.style.transform='scale(1.05)';" onmouseout="this.style.transform='scale(1)';">
                            تم ✔️
                        </button>
                    </div>
                `,
                showConfirmButton: false,
                didOpen: () => {
                    lottie.loadAnimation({
                        container: document.getElementById('lottie-success'),
                        renderer: 'svg',
                        loop: false,
                        autoplay: true,
                        path: 'https://assets6.lottiefiles.com/packages/lf20_jbrw3hcz.json'
                    });

                    document.getElementById('swal-ok-btn').addEventListener('click', () => {
                        Swal.close();
                        form[0].reset();
                    });
                },
                backdrop: `
                    rgba(0,0,0,0.4)
                    url("https://assets10.lottiefiles.com/temp/lf20_HpFqiS.json")
                    left top
                    no-repeat
                `,
                background: 'rgba(255, 255, 255, 0.95)',
                width: 380,
                padding: '30px 20px',
                customClass: {
                    popup: 'ultra-glass-popup'
                }
            });
        },
        error: function (jqXHR) {
            if (jqXHR.status === 422) {
                let errors = jqXHR.responseJSON?.errors || {};
                for (let field in errors) {
                    let input = $(`[name="${field}"]`);
                    input.addClass('is-invalid');
                    input.next('.invalid-feedback').text(errors[field][0]);
                }
                Swal.fire({
                    icon: 'error',
                    title: 'خطأ في البيانات',
                    text: 'يرجى تصحيح الحقول المطلوبة.',
                    confirmButtonText: 'حسناً',
                    customClass: {
                        popup: 'ultra-glass-popup',
                        confirmButton: 'ultra-btn'
                    },
                    buttonsStyling: false
                });
            } else if (jqXHR.status === 500) {
                Swal.fire({
                    icon: 'error',
                    title: 'خطأ في السيرفر',
                    text: 'حدث خطأ داخلي، حاول لاحقاً.',
                    confirmButtonText: 'موافق',
                    customClass: {
                        popup: 'ultra-glass-popup',
                        confirmButton: 'ultra-btn'
                    },
                    buttonsStyling: false
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'حدث خطأ',
                    text: 'حاول مرة أخرى في وقت لاحق.',
                    confirmButtonText: 'موافق',
                    customClass: {
                        popup: 'ultra-glass-popup',
                        confirmButton: 'ultra-btn'
                    },
                    buttonsStyling: false
                });
            }
            submitBtn.prop('disabled', false);
            submitBtn.html(`<i class="fa-solid fa-paper-plane me-2"></i> إرسال`);
        }
    });
});


function isNumber(evt) {
    evt = evt || window.event;
    let charCode = evt.which || evt.keyCode;
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
}
</script>

@endsection
