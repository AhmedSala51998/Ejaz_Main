@extends('admin.layouts.layout')

@section('page-title')
    ملفات الحقوق والواجبات
@endsection

@section('content')

    <div class="card">
        <div class="card-body">


            <div class="tab-content" id="v-pills-tabContent">
                {{----------------------------------}}

                <div class="tab-pane fade show active" id="v-pills-main" role="tabpanel"
                     aria-labelledby="v-pills-main-tab">


                    <div>
                        <h4 class="card-title">    ملفات الحقوق والواجبات</h4>
                        <form id="my-form" method="post" action="#" enctype="multipart/form-data">
                            @csrf

                            <div class="row ">


                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">

                                        <label for="name" class="form-control-label">حقوق وواجبات صاحب العمل</label>
                                        <input type="file" class="dropify" name="employer_rights_and_duties" @if($pdf) data-default-file="{{get_file($pdf->employer_rights_and_duties)}}" @else  data-default-file=""   @endif accept=""/>
                                        <span class="form-text text-danger text-center">مسموح فقط بالصيغ التالية : Pdf</span>
                                    </div>
                                </div>


                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">

                                        <label for="name" class="form-control-label">حقوق وواجبات العمالة المنزلية</label>
                                        <input type="file" class="dropify" name="rights_and_duties_of_domestic_workers" @if($pdf) data-default-file="{{get_file($pdf->rights_and_duties_of_domestic_workers)}}" @else  data-default-file=""   @endif accept=""/>
                                        <span class="form-text text-danger text-center">مسموح فقط بالصيغ التالية : pdf</span>
                                    </div>
                                </div>





                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-6">

                                </div> <!-- end col -->
                                @if(checkPermission(28))
                                <div class="col-sm-6">
                                    <div class="text-end">
                                        <button  type="submit" class="btn btn-success">
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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $('.dropify').dropify()

    </script>




    <script>

        $('#my-form').on('submit',(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            console.log(formData);
            $.ajax({
                type: 'POST',
                url: "{{route('admin.updatePDF')}}",
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
                    } else if (res['status'] == false) {
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "يرجي التاكد من صيغة الملف  ",
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
