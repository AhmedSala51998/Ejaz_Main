@extends('admin.layouts.layout')
@section('styles')
    <!-- include summernote css/js -->
    <link href="summernote-bs5.css" rel="stylesheet">
    {{--    <link href="{{asset('dashboard/summernote/summernote-bs4.css')}}">--}}
    <style>
        .dropify-font-upload:before,
        .dropify-wrapper .dropify-message span.file-icon:before {
            content: "\f382";
            font-weight: 100;
            color: #000;
            font-size: 26px;
        }

        .dropify-wrapper .dropify-message p {
            text-align: center;
            font-size: 15px;
        }

    </style>

@endsection

@section('page-title')
    الإعدادات العامة
@endsection


@section('content')
    <div class="checkout-tabs">
        <div class="row">
            <div class="col-xl-2 col-sm-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    {{----------------------------------}}
                    <a class="nav-link active" id="v-pills-main-tab" data-bs-toggle="pill" href="#v-pills-main"
                       role="tab" aria-controls="v-pills-main" aria-selected="true">
                        <i class="bx bx-info-circle d-block check-nav-icon mt-1 mb-1"></i>
                        <p class="fw-bold mb-4">المعلومات الرئيسية</p>
                    </a>

                    {{----------------------------------}}
                    <a class="nav-link" id="v-pills-logo-t" data-bs-toggle="pill" href="#v-pills-logo" role="tab"
                       aria-controls="v-pills-logo" aria-selected="false">
                        <i class="bx bx-image-alt d-block check-nav-icon mt-1 mb-1"></i>
                        <p class="fw-bold mb-4">اللوجو</p>
                    </a>

                    {{----------------------------------}}
                    <a class="nav-link" id="v-pills-contact-tab" data-bs-toggle="pill" href="#v-pills-contact"
                       role="tab" aria-controls="v-pills-contact" aria-selected="false">
                        <i class="bx bx-book-content d-block check-nav-icon mt-1 mb-1"></i>
                        <p class="fw-bold mb-4">معلومات التواصل</p>
                    </a>
                    {{----------------------------------}}
                    <a class="nav-link" id="v-pills-social-tab" data-bs-toggle="pill" href="#v-pills-social" role="tab"
                       aria-controls="v-pills-social" aria-selected="false">
                        <i class="bx bx-like d-block check-nav-icon mt-1 mb-1"></i>
                        <p class="fw-bold mb-4">مواقع التواصل الإجتماعى</p>
                    </a>
                    {{----------------------------------}}
                    <a class="nav-link" id="v-pills-step-ta" data-bs-toggle="pill" href="#v-pills-step" role="tab"
                       aria-controls="v-pills-step" aria-selected="false">
                        <i class="bx bx-list-ol d-block check-nav-icon mt-1 mb-1"></i>
                        <p class="fw-bold mb-4">خطوات الاستقدام</p>
                    </a>
                    {{----------------------------------}}
                    <a class="nav-link" id="v-pills-about-ta" data-bs-toggle="pill" href="#v-pills-about" role="tab"
                       aria-controls="v-pills-about" aria-selected="false">
                        <i class="bx bxs-comment-dots d-block check-nav-icon mt-1 mb-1"></i>
                        <p class="fw-bold mb-4">نبذة عن </p>
                    </a>
                    <a class="nav-link" id="v-pills-privacy_policy-ta" data-bs-toggle="pill" href="#v-pills-privacy_policy" role="tab"
                       aria-controls="v-pills-privacy_policy" aria-selected="false">
                        <i class="bx bxs-comment-dots d-block check-nav-icon mt-1 mb-1"></i>
                        <p class="fw-bold mb-4">سياسة الخصوص  </p>
                    </a>
                    {{----------------------------------}}

{{--                    <a class="nav-link" id="v-pills-family-ta" data-bs-toggle="pill" href="#v-pills-family" role="tab"--}}
{{--                       aria-controls="v-pills-family" aria-selected="false">--}}
{{--                        <i class="bx bxs-quote-single-left d-block check-nav-icon mt-1 mb-1"></i>--}}
{{--                        <p class="fw-bold mb-4">جزء العائلة فى الرئيسية </p>--}}
{{--                    </a>--}}
                    {{----------------------------------}}
                </div>
            </div>
            <div class="col-xl-10 col-sm-9">
                {{----------------------------------}}
                <div class="card">
                    <div class="card-body">


                        <div class="tab-content" id="v-pills-tabContent">
                            {{----------------------------------}}

                            <div class="tab-pane fade show active" id="v-pills-main" role="tabpanel"
                                 aria-labelledby="v-pills-main-tab">
                                   @include("admin.settings.parts.main")
                            </div>


                            {{----------------------------------}}

                            <div class="tab-pane fade" id="v-pills-logo" role="tabpanel"
                                 aria-labelledby="v-pills-logo-t">
                                @include("admin.settings.parts.logo")
                            </div>


                            {{----------------------------------}}

                            <div class="tab-pane fade" id="v-pills-contact" role="tabpanel"
                                 aria-labelledby="v-pills-contact-tab">
                                @include("admin.settings.parts.contact")
                            </div>

                            {{----------------------------------}}

                            <div class="tab-pane fade" id="v-pills-social" role="tabpanel"
                                 aria-labelledby="v-pills-social-tab">
                                @include("admin.settings.parts.social")
                            </div>

                            {{----------------------------------}}

                            <div class="tab-pane fade" id="v-pills-step" role="tabpanel"
                                 aria-labelledby="v-pills-step-ta">
                                @include("admin.settings.parts.step")
                            </div>

                            {{----------------------------------}}

                            <div class="tab-pane fade" id="v-pills-about" role="tabpanel"
                                 aria-labelledby="v-pills-about-ta">
                                @include("admin.settings.parts.about")
                            </div>

                            <div class="tab-pane fade" id="v-pills-privacy_policy" role="tabpanel"
                                 aria-labelledby="v-pills-privacy_policy-ta">
                                @include("admin.settings.parts.privacy_policy")
                            </div>
                            {{----------------------------------}}

{{--                            <div class="tab-pane fade" id="v-pills-family" role="tabpanel"--}}
{{--                                 aria-labelledby="v-pills-family-ta">--}}
{{--                                @include("admin.settings.parts.family")--}}
{{--                            </div>--}}

                            {{----------------------------------}}
                        </div>


                    </div>
                </div>
                {{----------------------------------}}

            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.0.0/tinymce.min.js"
            integrity="sha512-XQOOk3AOZDpVgRcau6q9Nx/1eL0ATVVQ+3FQMn3uhMqfIwphM9rY6twWuCo7M69rZPdowOwuYXXT+uOU91ktLw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.dropify').dropify();


        tinymce.init({
            selector: '.textEditor',
            toolbar: 'language',
            directionality: 'rtl',
        });
    </script>

    <script>

        $(document).on('submit', 'form#Form_about', function (e) {
            e.preventDefault();
            var myForm = $("#Form_about")[0]
            var formData = new FormData(myForm)
            var url = $('#Form_about').attr('action');
            sendAjax(url, formData);
        });

        $(document).on('submit', 'form#Form_contact', function (e) {
            e.preventDefault();
            var myForm = $("#Form_contact")[0]
            var formData = new FormData(myForm)
            var url = $('#Form_contact').attr('action');
            sendAjax(url, formData);
        });

        $(document).on('submit', 'form#Form_family', function (e) {
            e.preventDefault();
            var myForm = $("#Form_family")[0]
            var formData = new FormData(myForm)
            var url = $('#Form_family').attr('action');
            sendAjax(url, formData);
        });

        $(document).on('submit', 'form#Form_logo', function (e) {
            e.preventDefault();
            var myForm = $("#Form_logo")[0]
            var formData = new FormData(myForm)
            var url = $('#Form_logo').attr('action');
            sendAjax(url, formData);
        });

        $(document).on('submit', 'form#Form_main', function (e) {
            e.preventDefault();
            var myForm = $("#Form_main")[0]
            var formData = new FormData(myForm)
            var url = $('#Form_main').attr('action');
            sendAjax(url, formData);
        });

        $(document).on('submit', 'form#Form_social', function (e) {
            e.preventDefault();
            var myForm = $("#Form_social")[0]
            var formData = new FormData(myForm)
            var url = $('#Form_social').attr('action');
            sendAjax(url, formData);
        });

        $(document).on('submit', 'form#Form_step', function (e) {
            e.preventDefault();
            var myForm = $("#Form_step")[0]
            var formData = new FormData(myForm)
            var url = $('#Form_step').attr('action');
            sendAjax(url, formData);
        });

        function sendAjax(url, formData) {
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function () {
                    $('.loader-ajax').show()
                },
                complete: function () {


                },
                success: function (data) {
                    $('.loader-ajax').hide()
                    $(".logo_basic").attr("src", data.logo);
                    cuteToast({
                        type: "success", // or 'info', 'error', 'warning'
                        message: "تم تعديل الإعدادات العامة",
                        timer: 3000
                    });
                },
                error: function (data) {
                    $('.loader-ajax').hide()
                    if (data.status === 500) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "يوجد خطأ ",
                            timer: 3000
                        });


                    }
                    if (data.status === 422) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    cuteToast({
                                        type: "error", // or 'info', 'error', 'warning'
                                        message: value,
                                        timer: 3000
                                    });

                                });

                            } else {

                            }
                        });
                    }
                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });
        }


    </script>

@endsection
