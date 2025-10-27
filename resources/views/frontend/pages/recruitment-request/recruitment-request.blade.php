@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.Application for the recruitmentContract of domestic workers')}}
@endsection

@section('styles')
    <style></style>
@endsection


@section('content')



            <!-- ================ banner ================= -->
            <div class="banner">
                <h1> {{__('frontend.Application for the recruitmentContract of domestic workers')}}  </h1>

                <p class="mt-4">      {{$settings->application_for_the_recruitment??"يسرنا أن نرحب بك للاطلاع على خدماتنا، نحن نسعى جاهدين لتقديم أفضل خدمات الإستقدام للعمالة المنزلية. لتقديم
                    طلب إستقدام العمالة المنزلية نرجو تعبئة كامل البيانات بشكل صحيح"}} </p>
            </div>
            <!-- ================  / banner ================= -->





    <!-- recruitmentContract request -->
    <section class="recruitmentRequest">
        <div class="container">






            <!-- recruitmentContract Request Form -->
            <form action="{{route('makeCustomRecruitmentRequest')}}" method="post" id="Form" class="recruitmentRequestForm">
                @csrf
                <div class="row justify-content-center">
                    @php

                        $user=\Illuminate\Support\Facades\Auth::user();
                        if(!$user){
                            $user='';
                        }
                    @endphp
                    <div class="col-md-4 pb-3 p-2">
                        <!-- formCard -->
                        <div class="formCard ">
                            <div class="head">
                                <h5> {{__('frontend.Employer data')}} </h5>
                            </div>
                            <div class="row">
                                <div class="col-12 pb-3 p-2">
                                    <label for="name" class="form-label"> <i class="fas fa-user me-2"></i> {{__('frontend.FullName')}}* </label>
                                    <input data-validation="required,length" data-validation-length="min2" @if($user!='') value="{{$user->name}}" @endif  type="text" class="form-control" name="name" id="name" placeholder="{{__('frontend.enter FullName')}}">
                                </div>
                                <div class="col-12 pb-3 p-2">
                                    <label for="Phone" class="form-label"> <i class="fas fa-phone-alt me-2"></i>  {{__('frontend.phone')}}* </label>
                                    <input onkeypress="return isNumber(event)"  @if($user!='') value="{{$user->phone}}" @endif  data-validation="required,validatePhoneNumberOfSAR" class="form-control"  id="Phone" name="phone" placeholder="">
                                </div>
                                <div class="col-12 pb-3 p-2">
                                    <label for="city" class="form-label"> <i class="fa-solid fa-city me-2"></i> {{__('frontend.City')}} </label>
                                    <select data-validation="required" name="city_id" id="city" class="select2">
                                        <option value=""> {{__('frontend.selectCity')}} </option>
                                        @foreach($cities as $city)
                                        <option value="{{$city->id}}"> {{$city->title}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 pb-3 p-2">
                        <!-- formCard -->
                        <div class="formCard">
                            <div class="head">
                                <h5> {{__('frontend.HomeWorkerData')}} </h5>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 pb-3 p-2">
                                </div>
                                <div class="col-sm-6 pb-3 p-2">
                                    <label for="nationalitie_id" class="form-label"> {{__('frontend.nationality name')}} </label>
                                    <select data-validation="required" name="nationalitie_id" id="nationalitie_id" class="select2">
                                        <option value="" selected > {{__('frontend.nationality name')}}  </option>
                                        @foreach($nationalities as $nationalitie)
                                            <option value="{{$nationalitie->id}}"> {{$nationalitie->title}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 pb-3 p-2">
                                    <label for="job" class="form-label"> {{__('frontend.requiredJob')}} </label>
                                    <select data-validation="required" name="job_id" id="job" class="select2">
                                        <option value="" selected > {{__('frontend.requiredJob')}}  </option>
                                        @foreach($jobs as $job)
                                            <option value="{{$job->id}}"> {{$job->title}} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-6 pb-3 p-2">
                                    <label for="social_type_id" class="form-label"> {{__('frontend.requiredSocialStatus')}} </label>
                                    <select data-validation="required" name="social_type_id" id="social_type_id"  class="select2">
                                        <option value="" selected > {{__('frontend.requiredSocialStatus')}} </option>
                                        @foreach($social_types as $social_type)
                                            <option value="{{$social_type->id}}"> {{$social_type->title}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 pb-3 p-2">
                                    <label for="order_of_age_id" class="form-label">{{__('frontend.requiredAge')}}  </label>
                                    <select data-validation="required" name="order_of_age_id" id="order_of_age_id" class="select2">
                                        <option value="" selected > {{__('frontend.requiredAge')}} </option>
                                        @foreach($ages as $age)
                                            <option value="{{$age->id}}">{{__('frontend.from')}} {{$age->from}} {{__('frontend.to')}}  {{$age->to}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4 pb-3 p-2">
                                    <label for="" class="form-label"> {{__('frontend.religionWorker')}} </label>
                                    <div class="pt-1">
                                        @foreach($religions as $religion)
                                        <div class="form-check px-4">
                                            <input {{$loop->first?"checked":""}} class="form-check-input" type="radio" name="religion_id" value="{{$religion->id}}" id="religion{{$religion->id}}">
                                            <label class="form-check-label" for="religion{{$religion->id}}">
                                                {{$religion->title}}
                                            </label>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="col-sm-4 pb-3 p-2">
                                    <label for="" class="form-label"> {{__('frontend.The language the worker speaks')}} </label>
                                    <div class="pt-1">

                                        @foreach($languages as $language)
                                            <div class="form-check px-4">
                                                <input {{$loop->first?"checked":""}} class="form-check-input" type="radio" name="language_title_id" value="{{$language->id}}" id="language{{$language->id}}">
                                                <label class="form-check-label" for="language{{$language->id}}">
                                                    {{$language->title}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-sm-4 pb-3 p-2">
                                    <label for="" class="form-label"> {{__('frontend.workerStatus')}} </label>
                                    <div class="pt-1">
                                        <div class="form-check px-4">
                                            <input class="form-check-input" type="radio" value="new" name="type_of_experience" id="status1">
                                            <label class="form-check-label" for="status1">
                                               {{__('frontend.workerNew')}}
                                            </label>
                                        </div>
                                        <div class="form-check px-4">
                                            <input class="form-check-input" type="radio" value="with_experience" name="type_of_experience" id="status2" checked>
                                            <label class="form-check-label" for="status2">
                                                {{__('frontend.workerWithExperience')}}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 pb-3 p-2">
                                    <label for="special_requirement" class="form-label"> {{__('frontend.otherRequirement')}} </label>
                                    <textarea name="special_requirement" id="special_requirement" class="form-control" rows="5"
                                              placeholder="{{__('frontend.Are There OtherRequirement?')}}"></textarea>
                                </div>
                            </div>
                            <!-- submit -->
                            <div class="col-12 pt-4 p-2 text-center">


                                <button id="submit_button"  type="submit" class="animatedLink">
                                {{__('frontend.Send')}}
                                    <i class="fa-regular fa-left-long ms-2"><span></span></i>
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- end recruitmentContract request -->

@endsection

@section('js')

    <script>
        $.formUtils.addValidator({
            name : 'validatePhoneNumberOfSAR',
            validatorFunction : function(value, $el, config, language, $form) {
                return /^(05)[0-9]{8}$|^(966)[0-9]{10}$/.test(value);
            },
            errorMessage : "{{__('frontend.phone format is incorrect')}}",
            errorMessageKey: 'validatePhoneNumberOfSAR'
        });

        $(document).on('submit','form#Form',function(e) {
            e.preventDefault();
            var myForm = $("#Form")[0]
            var formData = new FormData(myForm)
            var url = $('#Form').attr('action');
            $.ajax({
                url:url,
                type: 'POST',
                data: formData,
                beforeSend: function(){
                    $('#submit_button').attr('disabled',true)
                    $('#submit_button').html(`<i class='fa fa-spinner fa-spin '></i>`)
                },
                complete: function(){

                },
                success: function (data) {
                    // var name = `${$("#contact_name").val()}`;
                    cuteAlert({
                        title: "{{__('frontend.Congratulation')}}",
                        message: `{{__('frontend.Thanks ,We will contact you as soon as possible.')}}`,
                        type: "success", // or 'info', 'error', 'warning'
                        buttonText: "{{__('frontend.confirm')}}"
                    });

                    $('#submit_button').attr('disabled',false)
                    $('#submit_button').html(`{{__('frontend.Send Message')}} <i class="fas fa-paper-plane ms-2"></i>
                                <span></span>`)
                    $(".select2").val(null).trigger("change")
                    $('#Form')[0].reset();
                },
                error: function (data) {
                    if (data.status === 500) {

                    }
                    if (data.status === 422) {

                    }
                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });


        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {

                return false;
            }

            return true;
        }
    </script>
@endsection
