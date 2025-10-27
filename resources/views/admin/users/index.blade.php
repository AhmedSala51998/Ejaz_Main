@extends('admin.layouts.layout')
@section('styles')
    <!-- Data Tables -->
    <!-- DataTables -->
    <link href="{{asset('dashboard')}}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('dashboard')}}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
    {{--    {{asset('dashboard')}}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css--}}

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
    العملاء
@endsection


@section('content')

    @if(checkPermission(23))

        <a href="{{route('users.create')}}" class="btn btn-success">اضافة عميل</a>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

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

                            {{--  <th>الصورة</th>--}}
                            <th>الإسم</th>
                            <th>رقم الجوال</th>
                            <th>الحالة</th>
                            <th>وقت الإضافة</th>
                            <th>طلب استقدام</th>
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

    {{--    <!-- Required datatable js -->--}}
    <script src="{{asset('dashboard')}}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('dashboard')}}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    {{--    <!-- Buttons examples -->--}}
    {{--    <!-- Responsive examples -->--}}
    {{--    <script src="{{asset('dashboard')}}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>--}}
    {{--    <script src="{{asset('dashboard')}}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>--}}
    <script src="{{asset('dashboard')}}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    {{--    <script src="{{asset('dashboard')}}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>--}}
    {{--    <script src="{{asset('dashboard')}}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>--}}
    {{--    <script src="{{asset('dashboard')}}/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>--}}

    {{--<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>--}}
    {{--<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
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
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            responsive: 1,
            "processing": true,
            "lengthChange": true,
            "serverSide": true,
            "ordering": true,
            "searching": true,
            'iDisplayLength': 20,
            "ajax": "{{route('users.index')}}",

            "columns": [
                {"data": "delete_all", orderable: false, searchable: false},
                /*  {"data": "logo", orderable: false, searchable: false},*/
                {"data": "name", orderable: false, searchable: true},
                {"data": "phone", orderable: false, searchable: false},
                {"data": "is_blocked", orderable: false, searchable: false},
                {"data": "created_at", searchable: false},

                {"data": "Recruitment request", orderable: false, searchable: false},

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
                    var url = '{{ route("users.destroy", ":id") }}';
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
        /*====================Change Status Single Row=================*/
        /*======================================================*/
        /*======================================================*/


        $(document).on('click', '.status', function () {
            var id = $(this).attr('id');
            var status = $(this).attr('attr_type');
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
                    var url = '{{ route("users.changeBlock", ":id") }}'
                    url = url.replace(':id', id);
                    $.ajax({
                        url: url,
                        type: 'GET',
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
                                url: '{{route('users.delete.bulk')}}',
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

@endsection
