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
    مكاتب الاستقدام
@endsection


@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    {{---------------------------------}}
                    <div class="row mb-2">
                        @if(checkPermission(15))
                            <div class="col-sm-4">
                                <div class="text-sm-start">
                                    <button id="addButton" type="button"
                                            class="btn btn-success  waves-effect waves-light mb-2 me-2">
                                        <i class="mdi mdi-plus me-1"></i> أضف جديد
                                    </button>
                                </div>
                            </div>
                        @endif
                        <div class="col-sm-8">
                            {{--                            <div class="text-sm-end">--}}
                            {{--                                <button id="bulk_delete" type="button" class="btn btn-danger  waves-effect waves-light mb-2 me-2">--}}
                            {{--                                    </button>--}}
                            {{--                            </div>--}}
                        </div><!-- end col-->
                    </div>

                    {{---------------------------------}}

                    <table id="Datatable" class="table table-striped table-bordered dt-responsive  nowrap w-100">
                        <thead>
                        <tr>
                            <th>
                                <input id="checkAll" type='checkbox' class='check-all form-check-input'
                                       data-tablesaw-checkall>

                                <a id="bulk_delete" href="#" style="display: none;" class=" text-danger p-2">
                                    <i class="mdi mdi-trash-can-outline me-1  "
                                       style=" width: 50% !important;height: 50% !important;"></i>
                                </a>
                            </th>

                            <th>مكتب الاستقدام</th>
                            <th> الدولة</th>
                            <th>وقت الإضافة</th>
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

    <!-- end row -->
    <div class="modal fade" id="exampleModalCenter" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        {{--        <div class="modal-dialog modal-dialog-centered" role="document">--}}
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">مكاتب الاستقدام </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="form-for-addOrDelete">

                </div>
                <div class="modal-footer justify-content-center align-content-center">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">اغلاق</button>
                    <button form="Form" type="submit" class="btn btn-success">
                        حفظ
                        &nbsp;
                        <i class="fa fa-save"></i>
                    </button>
                </div>
            </div>
        </div>
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
            "searching": true,
            'iDisplayLength': 20,
            "ajax": "{{route('recruitment-offices.index')}}",
            "columns": [
                {"data": "delete_all", orderable: false, searchable: false},
                {"data": "title", orderable: false, searchable: false},
                {"data": "country_id", orderable: false, searchable: false},
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

        /*======================================================*/
        /*======================================================*/
        /*====================Add New Row=======================*/
        /*======================================================*/
        /*======================================================*/

        $(document).on('click', '#addButton', function (e) {
            e.preventDefault()
            var url = '{{route('recruitment-offices.create')}}';
            $.ajax({
                url: url,
                type: 'GET',
                beforeSend: function () {
                    $('.loader-ajax').show()
                },
                success: function (data) {
                    window.setTimeout(function () {
                        $('.loader-ajax').hide()
                        $('#form-for-addOrDelete').html(data.html);
                        $('#exampleModalLabel').html('اضافة مكتب الاستقدام جديد')
                        $('#exampleModalCenter').modal('show')
                        $('.dropify').dropify()
                        $('[data-toggle="tooltip"]').tooltip()
                        $.validate({
                            ignore: 'input[type=hidden]',
                            lang: "ar",
                        });
                    }, 10);
                },
                error: function (jqXHR, error, errorThrown) {
                    $('.loader-ajax').hide()
                    if (jqXHR.status && jqXHR.status == 500) {
                        $('#exampleModalCenter').modal("hide");
                        //save
                        cuteToast({
                            type: "error", // or 'info', 'error', 'warning'
                            message: "أنت لا تملك الصلاحية لفعل هذا",
                            timer: 3000
                        })
                    }


                }
            });
        });


        /*======================================================*/
        /*======================================================*/
        /*====================Form Submit=======================*/
        /*======================================================*/
        /*======================================================*/


        $(document).on('submit', 'form#Form', function (e) {
            e.preventDefault();
            var myForm = $("#Form")[0]
            var formData = new FormData(myForm)
            var url = $('#Form').attr('action');
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
                    $('#exampleModalCenter').modal('hide')
                    $('.loader-ajax').show()
                    window.setTimeout(function () {
                        $('.loader-ajax').hide()
                        $('#exampleModalCenter').modal('hide')
                        cuteToast({
                            type: "success", // or 'info', 'error', 'warning'
                            message: "تمت العملية بنجاح",
                            timer: 3000
                        })

                    }, 20);
                    datatable_selector.draw();
                },
                error: function (data) {
                    $('.loader-ajax').hide()

                    if (data.status === 500) {
                        $('#exampleModalCenter').modal("hide");
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


        /*======================================================*/
        /*======================================================*/
        /*====================Edit=======================*/
        /*======================================================*/
        /*======================================================*/


        $(document).on('click', '.editButton', function (e) {
            e.preventDefault()
            var id = $(this).attr('id');

            var url = '{{route('recruitment-offices.edit',":id")}}';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'GET',
                beforeSend: function () {

                    $('.loader-ajax').show()
                },
                success: function (data) {
                    window.setTimeout(function () {

                        $('#form-for-addOrDelete').html(data.html);
                        $('.loader-ajax').hide()
                        $('#exampleModalLabel').html('تعديل مكتب الاستقدام ')
                        $('#exampleModalCenter').modal('show')
                        $('.dropify').dropify()
                        $('[data-toggle="tooltip"]').tooltip()
                        $.validate({
                            ignore: 'input[type=hidden]',
                            lang: "ar",
                        });
                    }, 10);
                },
                error: function (data) {
                    $('.loader-ajax').hide()
                    cuteToast({
                        type: "error", // or 'info', 'error', 'warning'
                        message: "أنت لا تملك الصلاحية لفعل هذا",
                        timer: 3000
                    });

                }
            });

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
                console.log(result)
                if (result.value) {
                    var url = '{{ route("recruitment-offices.destroy", ":id") }}';
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
                                url: '{{route('recruitment-offices.delete.bulk')}}',
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

        /* الكود الحالي ممتاز، لكن المشكلة أن الزر لا يرسل الطلب إلى السيرفر */

        // 👇 سبب المشكلة الأغلب: أن الزر نفسه غير مفعل عليه event delegation بشكل صحيح
        // في حال كنت تستخدم DataTables يجب استخدام event delegation كما يلي:

        $(document).on('click', '.toggle-hide-btn', function (e) {
            e.preventDefault();

            var button = $(this);
            var id = button.data('id');
            var currentStatus = button.data('status'); // 1 = visible, 0 = hidden

            var confirmTitle = currentStatus === 1 ? "هل أنت متأكد من إخفاء السير الذاتية؟" : "هل أنت متأكد من إظهار السير الذاتية؟";
            var successMessage = currentStatus === 1 ? "تم الإخفاء بنجاح" : "تم الإظهار بنجاح";

            Swal.fire({
                title: confirmTitle,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم، تأكيد',
                cancelButtonText: 'إلغاء'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: '{{ route("recruitment-offices.toggleHide") }}',
                        type: 'POST',
                        data: {
                            id: id,
                            status: currentStatus,
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (res) {
                            if (res.success) {
                                toastr.success(res.message);

                                var newStatus = res.new_status;
                                var newText = newStatus === 0 ? 'إخفاء السير الذاتية' : 'إظهار السير الذاتية';
                                var newClass = newStatus === 0 ? 'btn-warning' : 'btn-success';
                                var newIcon = newStatus === 0 ? 'fa-eye-slash' : 'fa-eye';

                                button
                                    .data('status', newStatus === 0 ? 1 : 0)
                                    .removeClass('btn-success btn-warning')
                                    .addClass(newClass)
                                    .html(`<i class="fa ${newIcon}"></i> ${newText}`);
                            } else {
                                toastr.error("حدث خطأ أثناء تنفيذ العملية");
                            }
                        },
                        error: function () {
                            toastr.error("لم يتم الاتصال بالسيرفر");
                        }
                    });
                }
            });
        });



    </script>
   <!-- ✅ Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- ✅ Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- ✅ SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@endsection
