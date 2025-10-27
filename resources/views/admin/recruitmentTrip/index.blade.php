@extends('admin.layouts.layout')

@section('page-title')
    رحلة الاستقدام
@endsection


@section('content')

    <div class="card">
        <div class="card-body">


            <div class="tab-content" id="v-pills-tabContent">
                {{----------------------------------}}

                <div class="tab-pane fade show active" id="v-pills-main" role="tabpanel"
                     aria-labelledby="v-pills-main-tab">


                    <div>
                        <h4 class="card-title">رحلة الاستقدام</h4>
                        <form id="my-form" method="post" action="#">
                            @csrf

                            <div class="row ">


                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label
                                            for="recruitment_contract_title">عنوان عقد الاستقدام </label>
                                        <input data-validation="required" type="text"
                                               class="form-control"
                                               value="{{$trip->recruitment_contract_title}}"
                                               id="recruitment_contract_title" name="recruitment_contract_title"
                                               placeholder="">
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                                    <div class="form-group">
                                        <label for="recruitment_contract_desc">
                                            وصف عقد الاستقدام
                                        </label>
                                        <textarea data-validation="" rows="6" class="form-control "
                                                  name="recruitment_contract_desc"
                                                  id="recruitment_contract_desc"
                                                  placeholder=" ">
                                                         {{$trip->recruitment_contract_desc}}
                                                     </textarea>
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label
                                            for="recruitment_trip_title">عنوان رحلة الاستقدام </label>
                                        <input data-validation="required" type="text"
                                               class="form-control"
                                               value="{{$trip->recruitment_trip_title}}"
                                               id="recruitment_trip_title" name="recruitment_trip_title"
                                               placeholder="">
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                                    <div class="form-group">
                                        <label for="recruitment_trip_desc">
                                            وصف رحلة الاستقدام
                                        </label>
                                        <textarea data-validation="" rows="6" class="form-control "
                                                  name="recruitment_trip_desc"
                                                  id="recruitment_trip_desc"
                                                  placeholder=" ">
                                                         {{$trip->recruitment_trip_desc}}
                                                     </textarea>
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label
                                            for="employment_arrival_title">عنوان وصول العمالة </label>
                                        <input data-validation="required" type="text"
                                               class="form-control"
                                               value="{{$trip->employment_arrival_title}}"
                                               id="employment_arrival_title" name="employment_arrival_title"
                                               placeholder="">
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                                    <div class="form-group">
                                        <label for="employment_arrival_desc">
                                            وصف وصول العمالة
                                        </label>
                                        <textarea data-validation="" rows="6" class="form-control "
                                                  name="employment_arrival_desc"
                                                  id="employment_arrival_desc"
                                                  placeholder=" ">
                                                         {{$trip->employment_arrival_desc}}
                                                     </textarea>
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label
                                            for="customers_service_title">عنوان خدمة العملاء </label>
                                        <input data-validation="required" type="text"
                                               class="form-control"
                                               value="{{$trip->customers_service_title}}"
                                               id="customers_service_title" name="customers_service_title"
                                               placeholder="">
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                                    <div class="form-group">
                                        <label for="customers_service_desc">
                                            وصف خدمة العملاء
                                        </label>
                                        <textarea data-validation="" rows="6" class="form-control "
                                                  name="customers_service_desc"
                                                  id="customers_service_desc"
                                                  placeholder=" ">
                                                         {{$trip->customers_service_desc}}
                                                     </textarea>
                                    </div>
                                </div>


                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-6">

                                </div> <!-- end col -->
                                @if(checkPermission(30))
                                    <div class="col-sm-6">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success">
                                                <i class="mdi mdi-content-save me-1"></i> حفظ
                                            </button>
                                        </div>
                                    </div> <!-- end col -->
                                @endif
                            </div> <!-- end row -->
                        </form>
                    </div>


                </div>


                {{----------------------------------}}
            </div>


        </div>
    </div>

@endsection


@section('js')

    <script>

        $('#my-form').on('submit', (function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            console.log(formData);
            $.ajax({
                type: 'POST',
                url: "{{route('admin.updateRecruitmentTrip')}}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {

                    if (res['status'] == true) {

                        cuteToast({
                            type: "success", // or 'info', 'error', 'warning'
                            message: "تمت العملية بنجاح  ",
                            timer: 3000
                        });
                    } else if (res['status'] == 'erorr') {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "يرجي التاكد من البينات المدخلة  ",
                            timer: 3000
                        });
                    }
                },
                error: function (data) {
                }
            });
        }));


    </script>

@endsection
