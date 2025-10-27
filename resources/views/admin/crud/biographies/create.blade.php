@extends('admin.layouts.layout')
@section('styles')
    <link href="{{asset('dashboard/backEndFiles/uploadMultiImages/image-uploader.min.css')}}" rel="stylesheet"
          type="text/css">

    @include('admin.layouts.noContent.noContentCss')
    <style>
        select option[disabled] {
            display: none;
        }

        .fa {
            margin-left: -30px;
            cursor: pointer;
        }
    </style>


    <style>
        .modal-fullscreen .modal-body {
            overflow-y: unset !important;
        }

        .select2-container {
            text-align: end;
        }
    </style>
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

    <style>
        .modal-fullscreen .modal-body{
            overflow-y: unset!important;
        }
        .dropify-wrapper {
            padding: 0;
        }
        .dropify-wrapper .dropify-message {
            position: absolute;
            top: 50%;
            right: 50%;
            transform: translateY(-50%) translateX(50%);
        }
    </style>

@endsection

@section('page-title')
    إضافة سيرة ذاتية جديدة
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">إضافة سيرة ذاتية جديدة</h4>
                    <form id="Form" method="post" enctype="multipart/form-data" action="{{route('biographies.store')}}">
                        @csrf
                        <div id="vertical-example" class="vertical-wizard">


                            <!-- Seller Details -->
                            <h3>البيانات الشخصية </h3>
                            <section>

                                <div class="row">


                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12" >
                                        <div class="form-group">
                                            <label for="cv_file"> ارفق صور السيرة الذاتية </label>
                                            <input data-validation="required" required type="file"
                                                   class="form-control dropify" value=""
                                                   id="cv_file" name="cv_file" placeholder="">
                                        </div>
                                    </div>


                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="name"> الاسم الشخصي </label>
                                            <input data-validation="required" required type="text" class="form-control default_rer"
                                                   value=""
                                                   id="cv_name" name="cv_name" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="passport_number">الجنسية </label>
                                            <select data-validation="required" required name="nationalitie_id"
                                                    class="form-control select2Users">
                                                @foreach($nationalitie as $one)
                                                    <option value="{{$one->id}}">{{$one->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="recruitment_office_id"> مكاتب السيرة الذاتية </label>
                                            <select data-validation="required" required name="recruitment_office_id"
                                                    id="recruitment_office_id" class="form-control default_rer">
                                                @foreach($recruitment_office as $one)
                                                    <option value="{{$one->id}}">{{$one->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="salary">الراتب </label>
                                            <input data-validation="required" required type="number"
                                                   class="form-control default_rer"
                                                   value="0"
                                                   id="salary" name="salary" placeholder=""
                                                   data-validation-has-keyup-event="true">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="contract_num"> مدة التعاقد </label>
                                            <input data-validation="nullable" required type="text" class="form-control"
                                                   value="2 سنة"
                                                   id="contract_num" name="contract_num" placeholder="">

                                        </div>
                                    </div>


{{--                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">--}}

{{--                                    <div class="form-group">--}}
{{--                                        <br>--}}
{{--                                        <label for="is_cv_out">  هل تريد اضافتها كسيره داخلية فقط ؟</label>--}}
{{--                                            <input id="is_cv_out" type="checkbox" name="is_cv_out">--}}

{{--                                        </div>--}}
{{--                                    </div>--}}


                                </div>


                            </section>

                            <!-- Company Document -->
                            <h3>تفاصيل اكثر </h3>
                            <section>

                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="passport_number">المهنة </label>
                                            <select data-validation="required" required name="job_id"
                                                    class="form-control select2Users default_rer">
                                                @foreach($job as $one)
                                                    <option value="{{$one->id}}">{{$one->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="age">العمر </label>
                                            <input data-validation="required" required type="number"
                                                   class="form-control default_rer"
                                                   value=""
                                                   id="age" name="age" placeholder="العمر">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="passport_number">ديانة العامل </label>
                                            <select data-validation="required" required name="religion_id"
                                                    class="form-control select2Users default_rer">
                                                @foreach($religion as $one)
                                                    <option value="{{$one->id}}">{{$one->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="passport_number">نوع السيرة الذاتية</label>
                                            <select id="cvTypeSelect" data-validation="required" required name="type"
                                                    class="form-control select2Users default_rer">
                                                <option value="admission">استقدام</option>
                                                <option value="transport">نقل خدمات</option>
                                                <option value="rental">ايجار</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div id="showtransporttwo" class="transferReason">
                                                <label for="reasonService">سبب التنازل </label>
                                                <input data-validation="optional" required type="text" class="form-control default_rer"
                                                       value=""
                                                       id="reasonService" name="reasonService" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div id="showtransportone" class="transferReason">
                                                <label for="periodService">مدة العمل عند الكفيل السابق</label>
                                                <input data-validation="optional" required type="text" class="form-control default_rer"
                                                       value=""
                                                       id="periodService" name="periodService" placeholder=" ">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div id="showtransportthree" class="transferReason">
                                                <label for="transferprice">تكلفة نقل الخدمات</label>
                                                <input data-validation="optional" required type="text" class="form-control default_rer"
                                                       value=""
                                                       id="transferprice" name="transferprice" placeholder=" ">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div id="showrentalone" class="rentalSection">
                                                <label for="rentalprice">تكلفة الايجار</label>
                                                <input data-validation="optional" required type="text" class="form-control default_rer"
                                                       value=""
                                                       id="rentalprice" name="rentalprice" placeholder=" ">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="passport_number">اللغة الام</label>
                                            <select data-validation="required" required name="language_title_id"
                                                    class="form-control select2Users default_rer">
                                                @foreach($language_title as  $one)
                                                    <option value="{{$one->id}}">{{$one->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="passport_number"> الحالة الاجتماعية</label>
                                            <select data-validation="required" required name="social_type_id"
                                                    class="form-control select2Users default_rer">
                                                @foreach($social_type as  $one)
                                                    <option value="{{$one->id}}">{{$one->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

{{--                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="contact_number">  رقم التواصل </label>--}}
{{--                                            <input data-validation="nullable"  type="number" class="form-control"--}}
{{--                                                   value=""--}}
{{--                                                   id="contact_number" name="contact_number" placeholder="">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="period_time"> مدة الضمان </label>--}}
{{--                                            <input data-validation="nullable"  type="text" class="form-control"--}}
{{--                                                   value="2"--}}
{{--                                                   id="period_time" name="period_time" placeholder="">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="birth_date"> تاريخ الميلاد </label>
                                            <input data-validation="nullable"  type="date" class="form-control"
                                                   value=""
                                                   id="birth_date" name="birth_date" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="passport_number">حالة العامل</label>
                                            <select id="experience" data-validation="required" required name="type_of_experience"
                                                    class="form-control select2Users default_rer">
                                                <option value="new">قادم جديد</option>
                                                <option value="with_experience">لديه خبرة سابقة</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div id="showwith_experiencetwo" class="previousExperience">
                                                <label for="reasonService">بلد الخبرة </label>
                                                <input data-validation="optional" required type="text" class="form-control default_rer"
                                                       value=""
                                                       id="experience_country" name="experience_country" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <div id="showwith_experienceone" class="previousExperience">
                                                <label for="periodService">عدد سنين الخبرة</label>
                                                <input data-validation="optional" required type="number" class="form-control default_rer"
                                                       value=""
                                                       id="experience_year" name="experience_year" placeholder=" ">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <h3>المهارات</h3>

                            <section>
                                @foreach($skills as $skill)

                                    <div class="row align-items-center g-2 mb-3">

                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                            <div class="form-group">

                                                <input id="{{$skill->id}}" type="checkbox" name="skills[]"
                                                       value="{{$skill->id}}">
                                                <label for="{{$skill->id}}">  {{$skill->title}}</label>
                                                <br>
                                            </div>
                                        </div>

                                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
                                            <div class="form-group">
                                                <select name="{{$skill->id}}" class="form-control select2Users">
                                                    <option value="weak">ضعيف</option>
                                                    <option value="average">متوسط</option>
                                                    <option value="good"> جيد</option>
                                                    <option value="very good"> جيد جدا</option>
                                                    <option value="excellent"> ممتاز</option>
                                                </select>

                                            </div>
                                        </div>


                                    </div>
                                @endforeach


                            </section>

                            <h3>تفاصيل جواز السفر </h3>
                            <section>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="passport_number">رقم جواز السفر </label>
                                        <input data-validation="required" required type="text" class="form-control default_rer"
                                               value=""
                                               id="passport_number" name="passport_number" placeholder="">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="passport_place"> بلد جواز السفر </label>
                                        <input data-validation="optional"  type="text" class="form-control default_rer"
                                               value=""
                                               id="passport_place" name="passport_place" placeholder="">
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="passport_created_at"> تاريخ اصدار جواز السفر </label>
                                        <input data-validation="optional"  type="date" class="form-control default_rer"
                                               value=""
                                               id="passport_created_at" name="passport_created_at" placeholder="">
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="passport_ended_at"> تاريخ انتهاء جواز السفر </label>
                                        <input data-validation="optional"  type="date" class="form-control default_rer"
                                               value=""
                                               id="passport_ended_at" name="passport_ended_at" placeholder="">
                                    </div>
                                </div>

                            </section>

{{--                            <h3>بيانات شخصية</h3>--}}
{{--                            <section>--}}
{{--                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="weight"> الوزن</label>--}}
{{--                                        <input data-validation="required" required type="number" step=".5"--}}
{{--                                               class="form-control default_rer"--}}
{{--                                               value=""--}}
{{--                                               id="weight" name="weight" placeholder="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="height"> الطول</label>--}}
{{--                                        <input data-validation="required" required type="number" step=".5"--}}
{{--                                               class="form-control default_rer"--}}
{{--                                               value=""--}}
{{--                                               id="height" name="height" placeholder="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}




{{--                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="childern_number">عدد الاطفال</label>--}}
{{--                                        <input data-validation="required" required type="number" class="form-control default_rer"--}}
{{--                                               value=""--}}
{{--                                               id="childern_number" name="childern_number" placeholder="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="living_location">مكان الميلاد</label>--}}
{{--                                        <input data-validation="required" required type="text" class="form-control default_rer"--}}
{{--                                               value=""--}}
{{--                                               id="living_location" name="living_location" placeholder="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="notes"> ملاحظات </label>--}}
{{--                                        <input data-validation="nullable"  type="text" class="form-control default_rer"--}}
{{--                                               value=""--}}
{{--                                               id="notes" name="notes" placeholder="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="video"> لينك الفديو</label>--}}
{{--                                        <input data-validation="nullable"  type="text" class="form-control default_rer"--}}
{{--                                               value=""--}}
{{--                                               id="video" name="video" placeholder="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </section>--}}

{{--                            <h3>بيانات علمية</h3>--}}

{{--                            <section>--}}

{{--                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="high_degree"> الدرجة العلمية</label>--}}
{{--                                        <input data-validation="required" required type="text" class="form-control default_rer"--}}
{{--                                               value=""--}}
{{--                                               id="high_degree" name="high_degree" placeholder="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="passport_number">مستوي اجادة اللغة العربية</label>--}}
{{--                                        <select data-validation="required" required name="arabic_degree"--}}
{{--                                                class="form-control select2Users default_rer">--}}
{{--                                            <option value="weak">ضعيف</option>--}}
{{--                                            <option value="average">متوسط</option>--}}
{{--                                            <option value="good"> جيد</option>--}}
{{--                                            <option value="very good"> جيد جدا</option>--}}
{{--                                            <option value="excellent"> ممتاز</option>--}}

{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="passport_number">مستوي اجادة اللغة الانجليزية</label>--}}
{{--                                        <select data-validation="required" required name="english_degree"--}}
{{--                                                class="form-control select2Users default_rer">--}}
{{--                                            <option value="weak">ضعيف</option>--}}
{{--                                            <option value="average">متوسط</option>--}}
{{--                                            <option value="good"> جيد</option>--}}
{{--                                            <option value="very good"> جيد جدا</option>--}}
{{--                                            <option value="excellent"> ممتاز</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                            </section>--}}

                            <h3>الصورة الشخصية</h3>
                            <section>

                                <div class="col-12 p-2">
                                    <input type="file"
                                           data-default-file=""
                                           class="form-control dropify" id="header_logo" name="image"
                                           placeholder="صورة العامل">
                                </div>
                            </section>


                            <h3>صور السيرة الذاتية </h3>
                            <section>

                                <div class="row">

                                    <div id="input-images-2"
                                         class="col-lg-12 col-md-12  mb-3 input-images2-2 input-images-1"
                                         style="height:200px; padding-top: .5rem;"></div>

                                </div>


                            </section>


                        </div>

                    </form>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>

@endsection

@section('js')

    <script src="{{asset('dashboard')}}/assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
            integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/localization/messages_ar.min.js"
            integrity="sha512-bGOftAqe7xfGxaWMsVQR187i+R9E0tXZIUL0idz1NKBBZIW78hoDtFY9gGLEGJFwHPjQSmPiHdm+80QParVi1A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('dashboard/backEndFiles/uploadMultiImages/image-uploader.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("div.transferReason").hide();

            $('#cvTypeSelect').on('change', function(){
                var demovalue = $(this).val();
                $("div.transferReason").hide();
                $("#show"+demovalue+"one").show();
                $("#show"+demovalue+"two").show();
                $("#show"+demovalue+"three").show();
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $("div.rentalSection").hide();

            $('#cvTypeSelect').on('change', function(){
                var demovalue = $(this).val();
                $("div.rentalSection").hide();
                $("#show"+demovalue+"one").show();
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $("div.previousExperience").hide();

            $('#experience').on('change', function(){
                var demovalue = $(this).val();
                $("div.previousExperience").hide();
                $("#show"+demovalue+"one").show();
                $("#show"+demovalue+"two").show();

            });
        });
    </script>

    <script>


        $(document).ready(function() {
            //set initial state.
            // $('#is_cv_out').val(this.checked);

            $('#is_cv_out').change(function() {
                if(this.checked) {
                    $('input').removeAttr('required');
                    $('#cv_name').prop('required',true);
                    $('#nationalitie_id').prop('required',true);
                    $('#passport_number').prop('required',true);
                }else {
                    $('.default_rer').prop('required',true);
                }
            });
        });
        var index = 1;
        // $(function(){
        //
        $("#vertical-example").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slide",
            stepsOrientation: "vertical",
            onStepChanging: function (event, currentIndex, newIndex) {

                $('#vertical-example').find('a[href="#finish"]').remove();
                if (currentIndex == 4 && $('#Form').valid()) {
                    var $input = $('<input id="submit_button" style="border: none !important;background-color: #556ee6;border-radius: 4px;padding: 8px 15px;color: #fff;" type="submit" value="حفظ" />');
                    $input.appendTo($('ul[aria-label=Pagination]'));
                } else {
                    $('ul[aria-label=Pagination] input[value="حفظ"]').remove();
                }

                if(newIndex!==5){
                    $('ul[aria-label=Pagination] input[value="حفظ"]').remove();

                }



                $('#Form').validate().settings.ignore = ":disabled,:hidden";
                return $('#Form').valid();

            }, onFinishing: function (event, currentIndex) {
                $('#Form').validate().settings.ignore = ":disabled,:hidden";
                return $('#Form').valid();

            },
            onFinished: function (event, currentIndex) {
                $('#Form').validate().settings.ignore = ":disabled,:hidden";
            },
            labels:
                {
                    finish: "حفظ",
                    next: "التالى",
                    previous: "السابق",
                },

        })


        $("#select2,.select2Users").select2({
            placeholder: '',
            dropdownAutoWidth: 'true',
            width: '100%'
        });

        $(".dropify").dropify()

        $('.input-images-1').imageUploader({
            'imagesInputName': "images",
        });


        $(document).on('submit', 'form#Form', function (e) {
            e.preventDefault();

            var myForm = $("#Form")[0]
            var formData = new FormData(myForm)
            var url = $('#Form').attr('action');
            $('.loader-ajax').show()

            console.log(formData)
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function () {
                    $('#submit_button').attr('disabled', true)

                },
                complete: function () {

                },
                success: function (data) {

                    console.log(data)
                    window.setTimeout(function () {

                        cuteToast({
                            type: "success", // or 'info', 'error', 'warning'
                            message: "تمت العملية بنجاح",
                            timer: 3000
                        })
                        window.location.href = '{{route('biographies.index')}}';
                        $('.loader-ajax').hide()
                    }, 20);
                },
                error: function (data) {
                    $('.loader-ajax').hide()
                    $('#submit_button').html(`حفظ`)
                    $('#submit_button').attr('disabled', false)
                    if (data.status === 500) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "أنت لا تملك الصلاحية لفعل هذا",
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

        });


    </script>

@endsection
