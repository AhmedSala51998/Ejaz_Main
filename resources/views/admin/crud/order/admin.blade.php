@extends('admin.layouts.layout')
@section('styles')
    <!-- Data Tables -->
    <!-- DataTables -->
    <link href="{{asset('dashboard')}}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('dashboard')}}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
          rel="stylesheet" type="text/css"/>

    <!-- Responsive datatable examples -->
    <link href="{{asset('dashboard')}}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
          rel="stylesheet" type="text/css"/>


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
    طلبات الاستقدام
@endsection


@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header  d-flex align-items-center bg-orange">
                    <h4 class="card-title mb-0 text-white"> {{__('admin.sSearch')}}</h4>
                    <div class="card-actions ms-auto">
                        <a class="text-dark" data-action="collapse"><i class="ti-minus"></i></a>
                        <a class="btn-close ms-1" data-action="close"></a>
                    </div>
                </div>
                <div class=" card-body collapse show">

{{--                                            <form class="" id="sort_customers" action="" method="GET">--}}
{{--                                                @csrf--}}
                    <div class="row">

                        <div class="col-md-2 ">
                            <div class='input-group mb-3'>
                                <input type="text" class="form-control" id="passport_key" name="passport_key"
                                       @isset($passport_key) value="{{ $passport_key }}"
                                       @endisset placeholder="رقم جواز السفر">
                            </div>
                        </div>

                        <div class="col-md-2 ">
                            <div class='input-group mb-3'>
                                <select class="form-control " name="nationality_id" id="nationality_id">
                                    <option value="" selected> اختيار الجنسية</option>
                                    @foreach ($natinalities as $key => $country)
                                        <option value="{{ $country->id }}"
                                                @if($nationality_id== $country->id ) selected @endif>{{ $country->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 ">
                            <div class='input-group mb-3'>
                                <select class="form-control " name="social_type" id="social_type">
                                    <option value="" selected>الخبرة السابقة</option>
                                    <option value="1" @if($social_type_id==1 ) selected @endif >قادم جديد</option>
                                    <option value="2" @if($social_type_id==2 ) selected @endif >لديه خبرة سابقة</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 ml-auto">
                            <select class="form-control " name="booking_status" id="booking_status">
                                <option value=" " selected>حالة الطلب</option>
                                <option value="under_work" @if ($booking_status == 'under_work') selected @endif>
                                   حجز السيرة الذاتية
                                </option>
                                <option value="contract" @if ($booking_status == 'contract') selected @endif >
                                  تم التعاقد
                                </option>
                                <option value="musaned" @if ($booking_status == 'musaned') selected @endif >
                                   تم الربط في مساند
                                </option>
                                <option value="traning" @if ($booking_status == 'traning') selected @endif >
                                   تحت الاجراء والتدريب
                                </option>
                                <option value="finished" @if ($booking_status == 'finished') selected @endif >
                                   تم وصول العمالة
                                </option>
                                <option value="canceled" @if ($booking_status == 'canceled') selected @endif>طلب ملغي
                                </option>

                            </select>
                        </div>
                        <div class="col-md-2 ">
                            <div class='input-group mb-3'>
                                <select class="form-control" name="selected_staff" id="selected_staff">
                                    <option value=" " selected >المسوقين </option>
                                    @foreach(\App\Models\Admin::where('admin_type',1)->get() as $staff)

                                            <option value="{{$staff->id}}" @if ($selected_staff == $staff->id) selected @endif>{{$staff->name}}</option>

                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="col-md-2 ">
                            <div class='input-group mb-3'>
                                <select class="form-control " name="recruitment_office_id" id="recruitment_office_id">
                                    <option value="" selected>المكتب الخارجي</option>
                                    @foreach ($recruitment_office as $key => $office)
                                        <option value="{{$office->id}}"
                                                @if($recruitment_office_id== $office->id ) selected @endif>{{ $office->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 ml-auto">
                            <select class="form-control " name="type" id="type">
                                <option value=" " selected>نوع الطلب</option>
                                <option value="admission" @if ($type == 'admission') selected @endif >استقدام</option>
                                <option value="transport" @if ($type == 'transport') selected @endif > نقل خدمات</option>
                                <option value="rental" @if ($type == 'rental') selected @endif >ايجار</option>

                            </select>
                        </div>
                        <div class="col-md-2 ">
                            <div class='input-group mb-3' style="width: 228px">
                                <input type='text' class="form-control " id="reportrange" name="datefilter"
                                       @isset($date) value="{{ $date }}" @endisset
                                       placeholder="مدى التاريخ"
                                       data-separator=" - "  autocomplete="off"  data-advanced-range="true" />

                                <span class="input-group-text">
                                            <i class="feather-sm fa fa-calendar"></i>
                                        </span>
                            </div>
                        </div>
                        <div class="col-md-2 text-end">
                            @if(count($_GET)>0 )
                                <a id="cancel_request" href="{{ route('admin-orders.index') }}" class="btn btn-danger">
                                   الغاء البحث</a>
                            @endif
                            <button id="btnSubmit" class="btn btn-info">{{__('admin.sSearch')}}</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">


                    <table id="Datatable" class="table table-striped table-bordered dt-responsive  nowrap w-100">
                        <thead>
                        <tr>
                            {{--   <th>
                                   <input id="checkAll" type='checkbox' class='check-all form-check-input' data-tablesaw-checkall>

                                   <a  id="bulk_delete" href="#"  style="display: none;" class=" text-danger p-2">
                                       <i  class="mdi mdi-trash-can-outline me-1  " style=" width: 50% !important;height: 50% !important;"></i>
                                   </a>
                               </th>--}}
                            <th>العميل</th>
                            <th>رقم الجوال</th>
                            <th> موظف خدمة العملاء</th>
                            <th>السيرة الذاتية</th>
                            <th>رقم جواز السفر</th>
                            <th>رقم العقد </th>
                            <th>الجنسية</th>
                            <th>الحالة</th>
                            <th>الوكيل الخارجي</th>
                            <th>نوع الطلب</th>
                            <th>التاريخ</th>
                            <th>التحكم</th>
                        </tr>
                        </thead>


                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>


@endsection

@section('js')

    <!-- Required datatable js -->
    <script src="{{asset('dashboard')}}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('dashboard')}}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <!-- Responsive examples -->
    <script src="{{asset('dashboard')}}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script
        src="{{asset('dashboard')}}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        /*======================================================*/
        /*======================================================*/
        /*====================Datatable Example=================*/
        /*======================================================*/
        /*======================================================*/

        let datatable_selector;
        datatable_selector = $('#Datatable').DataTable({
            dom: 'Bfrtip',
            responsive: 1,
            "processing": true,
            "lengthChange": true,
            "serverSide": true,
            "ordering": true,
            "searching": false,
            'iDisplayLength': 20,
            "ajax": {
                url: "{{ route('admin-orders.index') }}",
                data: function (d) {

                        d.passport_key = $('#passport_key').val(),
                        d.social_type = $('#social_type').val(),
                        d.selected_staff = $('#selected_staff').val(),
                        d.booking_status = $('#booking_status').val(),
                        // d.cv_type=$('#cv_type').val(),
                        // d.occuption_id=$('#occuption_id').val(),
                        d.nationality_id = $('#nationality_id').val(),
                        d.recruitment_office_id = $('#recruitment_office_id').val(),
                        d.type = $('#type').val(),
                        d.date = $('#reportrange').val()
                }
            },
            "columns": [
                /*   {"data": "delete_all", orderable: false, searchable: false},*/
                {"data": "user", orderable: false, searchable: true},
                {"data": "user_phone", orderable: false, searchable: true},
                {"data": "admin", orderable: false, searchable: true},
                {"data": "image", orderable: false, searchable: false},
                {"data": "passport_number", orderable: false, searchable: true},
                {"data": "contact_num", orderable: false, searchable: true},
                {"data": "nationalitie_id", orderable: false, searchable: true},
                {"data": "status", orderable: false, searchable: true},
                {"data": "recruitment_office_id", orderable: false, searchable: false},
                {"data": "type", orderable: false, searchable: false},
                {"data": "created_at", searchable: false},
                {"data": "actions", orderable: false, searchable: false}
            ],
            "language": {
                "sProcessing": "{{__('admin.sProcessing')}}",
                "sLengthMenu": "{{__('admin.sLengthMenu')}}",
                "sZeroRecords": "{{__('admin.sZeroRecords')}}",
                "sInfo": "{{__('admin.sInfo')}}",
                "sInfoEmpty": "{{__('admin.sInfoEmpty')}}",
                "sInfoFiltered": "{{__('admin.sInfoFiltered')}}",
                "sInfoPostFix": "",
                "sSearch": "{{__('admin.sSearch')}}:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "{{__('admin.sFirst')}}",
                    "sPrevious": "{{__('admin.sPrevious')}}",
                    "sNext": "{{__('admin.sNext')}}",
                    "sLast": "{{__('admin.sLast')}}"
                }
            },
            order: [
                [2, "desc"]
            ],
        });
        $("#btnSubmit").click(function () {
            if ($("#cancel_request").html() == undefined && $('.cancel_request_add').hide()) {
                $('   <a  href="{{route('admin-orders.index')}}" class="btn btn-danger cancel_request_add " style="margin:5px 5px 5px 5px;">  الغاء البحث </a>').insertAfter("#btnSubmit");
            }
            datatable_selector.ajax.reload();
        });

        /*======================================================*/
        /*======================================================*/
        /*====================Delete Single Row=================*/
        /*======================================================*/
        /*======================================================*/


        $(document).on('click', '.delete', function () {
            var id = $(this).attr('id');
            Swal.fire({
                title: "هل أنت متأكد من تنفيذ هذا الإجراء ؟",
                text: "لا يمكنك التراجع بعد ذلك !",
                showCancelButton: true,
                type: "warning",
                confirmButtonColor: '#ff675e',
                confirmButtonText: "موافق",
                cancelButtonText: "إلغاء",
                okButtonText: "موافق",
                closeOnConfirm: false
            }).then((result) => {
                // console.log(result)
                if (result.value) {
                    var url = '{{ route("admin-orders.destroy", ":id")}}';
                    url = url.replace(':id', id);
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {id: id},
                        success: function (data) {
                            cuteToast({
                                type: "success", // or 'info', 'error', 'warning'
                                message: "تم تنفيذ العملية بنجاح",
                                timer: 3000
                            });
                            datatable_selector.draw();
                        }, error: function (data) {
                            swal.close()
                            cuteToast({
                                type: "error", // or 'info', 'error', 'warning'
                                message: "أنت لا تملك الصلاحية لفعل هذا ",
                                timer: 3000
                            });
                        }

                    });
                }
            });

        });

        $(document).on('click', '.update-status', function () {
            var id = $(this).attr('id');
            var status =$(this).attr("data-status");


            Swal.fire({
                title: "هل أنت متأكد من تنفيذ هذا الإجراء ؟",
                text: "لا يمكنك التراجع بعد ذلك !",
                showCancelButton: true,
                type: "info",
                confirmButtonColor: '#ff675e',
                confirmButtonText: "موافق",
                cancelButtonText: "إلغاء",
                okButtonText: "موافق",
                closeOnConfirm: false
            }).then((result) => {
                // console.log(result)
                if (result.value) {
                    var url = '{{ route("admin-orders.update", ":id")}}';
                    url = url.replace(':id', id);
                    $.ajax({
                        url: url,
                        type: 'PUT',
                        data: {id: id,status:status},

                        success: function (data) {
                            cuteToast({
                                type: "success", // or 'info', 'error', 'warning'
                                message: "تم تنفيذ العملية بنجاح",
                                timer: 3000
                            });
                            datatable_selector.draw();
                            //console.log(200)
                        }, error: function (data) {
                            //console.log(500)
                            swal.close()
                            cuteToast({
                                type: "error", // or 'info', 'error', 'warning'
                                message: "أنت لا تملك الصلاحية لفعل هذا ",
                                timer: 3000
                            });
                        }

                    });
                }
            });

        });
        $(document).on('click', '.update-contract-at', function () {
            var id = $(this).attr('id');
            var status =$(this).attr("data-status");


            Swal.fire({
                html: `  <input type="text"  class="swal2-input" id="contact_num" placeholder="رقم التعاقد" name="contact_num" required>` ,
                title: "برجاء ادخال رقم التعاقد",
                text: "لا يمكنك التراجع بعد ذلك !",
                type: "input",
                showCancelButton: true,
                animation: "slide-from-top",
                onOpen: function() {

                },
                confirmButtonColor: '#ff675e',
                confirmButtonText: "موافق",
                cancelButtonText: "إلغاء",
                okButtonText: "موافق",
                closeOnConfirm: false,
                preConfirm: () => {
                    if (document.getElementById('contact_num').value ) {
                        // Handle return value
                    } else {
                        Swal.showValidationMessage('برجاء ادخل الرقم التعاقد')
                    }
                }
            }).then((result) => {
                // console.log(result)
                if (result.value) {
                    console.log( $('input[type=file]')[0].files[0])
                    var contact_num =document.getElementById('contact_num').value;

                    var formData = new FormData();
                    formData.append('contact_num', document.getElementById('contact_num').value);
                    formData.append('status', status);
                    formData.append('id', id);



                    var url = '{{ route("admin-orders.post", ":id")}}';
                    url = url.replace(':id', id);
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data:formData,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            cuteToast({
                                type: "success", // or 'info', 'error', 'warning'
                                message: "تم تنفيذ العملية بنجاح",
                                timer: 3000
                            });
                            datatable_selector.draw();
                            //console.log(200)
                        }, error: function (data) {
                            //console.log(500)
                            swal.close()
                            cuteToast({
                                type: "error", // or 'info', 'error', 'warning'
                                message: "أنت لا تملك الصلاحية لفعل هذا ",
                                timer: 3000
                            });
                        }

                    });
                }
            });

        });

        $(document).on('click', '.update-contract', function () {
            var id = $(this).attr('id');
            var status =$(this).attr("data-status");


            Swal.fire({
                html: `  <input type="text"  class="swal2-input" id="contact_num" placeholder="رقم التعاقد" name="contact_num" required>` ,
                title: "برجاء ادخال رقم التعاقد",
                text: "لا يمكنك التراجع بعد ذلك !",
                type: "input",
                showCancelButton: true,
                animation: "slide-from-top",
                onOpen: function() {

                },
                confirmButtonColor: '#ff675e',
                confirmButtonText: "موافق",
                cancelButtonText: "إلغاء",
                okButtonText: "موافق",
                closeOnConfirm: false,
                preConfirm: () => {
                    if (document.getElementById('contact_num').value ) {
                        // Handle return value
                    } else {
                        Swal.showValidationMessage('برجاء ادخل الرقم التعاقد')
                    }
                }
            }).then((result) => {
                // console.log(result)
                if (result.value) {
                    console.log( $('input[type=file]')[0].files[0])
                    var contact_num =document.getElementById('contact_num').value;

                    var formData = new FormData();
                    formData.append('contact_num', document.getElementById('contact_num').value);
                    formData.append('status', status);
                    formData.append('id', id);



                    var url = '{{ route("contactNum.post", ":id")}}';
                    url = url.replace(':id', id);
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data:formData,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            cuteToast({
                                type: "success", // or 'info', 'error', 'warning'
                                message: "تم تنفيذ العملية بنجاح",
                                timer: 3000
                            });
                            datatable_selector.draw();
                            //console.log(200)
                        }, error: function (data) {
                            //console.log(500)
                            swal.close()
                            cuteToast({
                                type: "error", // or 'info', 'error', 'warning'
                                message: "أنت لا تملك الصلاحية لفعل هذا ",
                                timer: 3000
                            });
                        }

                    });
                }
            });

        });
        $(document).on('click', '.add_note', function () {
            var id = $(this).attr('id');


            Swal.fire({
                html: `  <input type="text"  class="swal2-input" id="note" placeholder="ملحوظه" name="note" required>` ,
                title: "برجاء ادخال ملحوظة الاستعلام",
                text: "لا يمكنك التراجع بعد ذلك !",
                type: "input",
                showCancelButton: true,
                animation: "slide-from-top",
                onOpen: function() {

                },
                confirmButtonColor: '#ff675e',
                confirmButtonText: "موافق",
                cancelButtonText: "إلغاء",
                okButtonText: "موافق",
                closeOnConfirm: false,
                preConfirm: () => {
                    if (document.getElementById('note').value ) {
                        // Handle return value
                    } else {
                        Swal.showValidationMessage('برجاء ادخل  ملحوظة الاستعلام')
                    }
                }
            }).then((result) => {
                // console.log(result)
                if (result.value) {
                    console.log( $('input[type=file]')[0].files[0])
                    var note =document.getElementById('note').value;

                    var formData = new FormData();
                    formData.append('note', document.getElementById('note').value);
                    formData.append('status', status);
                    formData.append('id', id);



                    var url = '{{ route("notes.add", ":id")}}';
                    url = url.replace(':id', id);
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data:formData,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            cuteToast({
                                type: "success", // or 'info', 'error', 'warning'
                                message: "تم تنفيذ العملية بنجاح",
                                timer: 3000
                            });
                            datatable_selector.draw();
                            //console.log(200)
                        }, error: function (data) {
                            //console.log(500)
                            swal.close()
                            cuteToast({
                                type: "error", // or 'info', 'error', 'warning'
                                message: "أنت لا تملك الصلاحية لفعل هذا ",
                                timer: 3000
                            });
                        }

                    });
                }
            });

        });

        /*======================================================*/
        /*======================================================*/
        /*====================Delete Multi Row=================*/
        /*======================================================*/
        /*======================================================*/


        $(document).on('click', '#bulk_delete', function (e) {
            e.preventDefault()
            var id = [];
            $('.delete-all:checked').each(function () {
                id.push($(this).attr('id'));
            });
            if (id.length > 0) {
                Swal.fire({
                    title: "هل أنت متأكد من تنفيذ هذا الإجراء ؟",
                    text: "لا يمكنك التراجع بعد ذلك !",
                    showCancelButton: true,
                    confirmButtonColor: '#ff675e',
                    type: "warning",
                    confirmButtonText: "موافق",
                    cancelButtonText: "إلغاء",
                    okButtonText: "موافق",
                    closeOnConfirm: false

                }).then((result) => {
                    if (result.value) {
                        if (id.length > 0) {

                            $.ajax({
                                url: '{{route('biographies.delete.bulk')}}',
                                type: 'DELETE',
                                data: {id: id},
                                success: function (data) {
                                    $("#bulk_delete").hide()
                                    $("#checkAll").prop('checked', false);
                                    cuteToast({
                                        type: "success", // or 'info', 'error', 'warning'
                                        message: "تم تنفيذ العملية بنجاح",
                                        timer: 3000
                                    });
                                    datatable_selector.draw();


                                }, error: function (data) {
                                    swal.close()
                                    cuteToast({
                                        type: "error", // or 'info', 'error', 'warning'
                                        message: "أنت لا تملك الصلاحية لفعل هذا ",
                                        timer: 3000
                                    });
                                }
                            });
                        }
                    }
                });
            } else {
                Swal.fire({
                    title: "هذه العملية لم تكتمل",
                    text: "من فضلك قم باختيار ما تريد حذفه",
                    type: "error",
                    confirmButtonText: "تم الأمر"
                });
            }

        });


        /*======================================================*/
        /*======================================================*/
        /*====================toggle for checkbox===============*/
        /*======================================================*/
        /*======================================================*/


        $(document).on('click', '#checkAll', function () {
            var check = true;
            $('.delete-all:checked').each(function () {
                check = false;
            });
            if (check == true) $("#bulk_delete").show()
            else $("#bulk_delete").hide()
            $('.delete-all').prop('checked', check);
        });


    </script>
    <script type="text/javascript">
        $(function() {

            $('input[name="datefilter"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            });

            $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });


        });
    </script>
@endsection
