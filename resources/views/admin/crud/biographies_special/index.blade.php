@extends('admin.layouts.layout')
@section('styles')
    <!-- Data Tables -->
    <!-- DataTables -->
    <link href="{{asset('dashboard')}}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashboard')}}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{asset('dashboard')}}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />


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
    طلبات السير الذاتية الخاصة
@endsection


@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">



                    <table id="Datatable" class="table table-striped table-bordered dt-responsive  nowrap w-100">
                        <thead>
                        <tr>
                            <th>
                                <input id="checkAll" type='checkbox' class='check-all form-check-input' data-tablesaw-checkall>

                                <a  id="bulk_delete" href="#"  style="display: none;" class=" text-danger p-2">
                                    <i  class="mdi mdi-trash-can-outline me-1  " style=" width: 50% !important;height: 50% !important;"></i>
                                </a>
                            </th>

                            <th>صاحب العمل</th>
                            <th>الهاتف </th>
                            <th>رقم التأشيرة   </th>
                            <th>الجنسية   </th>
                            <th>الديانة   </th>
                            <th>المهنة   </th>
                            <th>الحالة الاجتماعية   </th>
                            <th>العمر   </th>
                            <th>  تفاصيل الطلب   </th>

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



    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تفاصيل الطلب الخاص</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="content-model" class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
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
    <script src="{{asset('dashboard')}}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>


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
            "ajax": "{{route('biographies-special.index')}}",
            "columns": [
                {"data": "delete_all", orderable: false, searchable: false},
                {"data": "user", orderable: false, searchable: false},
                {"data": "phone",   orderable: false,searchable: true},
                // {"data": "visa_number",   orderable: false,searchable: true},
                {"data": "nationality",   orderable: false,searchable: true},
                {"data":"religion", orderable: false, searchable: false},
                {"data": "job",   orderable: false,searchable: true},
                {"data": "social_type",   orderable: false,searchable: true},
                {"data": "age",   orderable: false,searchable: true},
                {"data": "special_requirement",   orderable: false,searchable: true},

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
        /*====================Delete Single Row=================*/
        /*======================================================*/
        /*======================================================*/


        $(document).on('click', '.delete', function () {
            var id = $(this).attr('id');
            Swal.fire({
                title: "هل أنت متأكد من تنفيذ هذا الإجراء ؟",
                text: "لا يمكنك التراجع بعد ذلك !",
                showCancelButton: true,
                type:"warning",
                confirmButtonColor: '#ff675e',
                confirmButtonText: "موافق",
                cancelButtonText: "إلغاء",
                okButtonText: "موافق",
                closeOnConfirm: false
            }).then((result) => {
                // console.log(result)
                if (result.value) {
                    var url = '{{ route("biographies-special.destroy", ":id")}}';
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
                        },error: function(data) {
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
                    type:"warning",
                    confirmButtonText: "موافق",
                    cancelButtonText: "إلغاء",
                    okButtonText: "موافق",
                    closeOnConfirm: false

                }).then((result) => {
                    if (result.value) {
                        if (id.length > 0) {

                            $.ajax({
                                url: '{{route('biographies-special.delete.bulk')}}',
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
            }else{
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
            var check=true;
            $('.delete-all:checked').each(function () {
                check=false;
            });
            if (check == true)  $("#bulk_delete").show()
            else $("#bulk_delete").hide()
            $('.delete-all').prop('checked', check);
        });



    </script>
    <script>
        $(document).on('click','.showMessage',function (e){

            var text=$(this).attr('data-text');
            $('#exampleModal').modal('toggle');
            $('#content-model').text(text);


        })
    </script>
@endsection
