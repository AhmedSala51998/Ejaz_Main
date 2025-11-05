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

        .btn-orange-glass {
            background: rgba(244, 168, 53, 0.1);
            color: #f4a835;
            border: 1px solid #f4a835;
            padding: 8px 18px;
            border-radius: 30px;
            font-weight: 500;
            font-size: 15px;
            transition: 0.3s ease;
            box-shadow: 0 2px 6px rgba(244, 168, 53, 0.2);
            backdrop-filter: blur(6px);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-orange-glass:hover {
            background: #f4a835;
            color: white;
            box-shadow: 0 4px 12px rgba(244, 168, 53, 0.4);
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            text-align: right !important;
            direction: rtl !important;
        }
        .select2-results__option {
            text-align: right !important;
            direction: rtl !important;
        }

    </style>

@endsection

@section('page-title')
    السير الذاتية
@endsection


@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header  d-flex align-items-center bg-orange">
                    <h4 class="card-title mb-0 text-white"> البحث</h4>
                    <div class="card-actions ms-auto">
                        <a class="text-dark" data-action="collapse"><i class="ti-minus"></i></a>
                        <a class="btn-close ms-1" data-action="close"></a>
                    </div>
                </div>
                <div class=" card-body collapse show">

                    {{--                        <form class="" id="sort_customers" action="" method="GET">--}}
                    {{--                            @csrf--}}
                    <div class="row">

                        <div class="col-md-2 ">
                            <div class='input-group mb-3'>
                                <input type="text" class="form-control" id="passport_key" name="passport_key"
                                       @isset($passport_key) value="{{ $passport_key }}"
                                       @endisset placeholder="رقم الجواز">
                            </div>
                        </div>
                        <div class="col-md-2 ">
                            <div class='input-group mb-3'>
                                <select class="form-control " name="nationality_id" id="nationality_id">
                                    <option value="" selected>الجنسية</option>
                                    @foreach ($natinalities as $key => $country)
                                        <option value="{{ $country->id }}"
                                                @if($nationality_id== $country->id ) selected @endif>{{ $country->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 ">
                            <div class='input-group mb-3'>
                                <select class="form-control " name="recruitment_office_id" id="recruitment_office_id">
                                    <option value="" selected>الوكيل الخارجي</option>
                                    @foreach ($recruitment_office as $key => $office)
                                        <option value="{{$office->id}}"
                                                @if($recruitment_office_id== $office->id ) selected @endif>{{ $office->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 ml-auto">
                            <select class="form-control " name="type" id="type">
                                <option value=" " selected>نوع السيرة الذاتية</option>
                                <option value="admission" @if ($type == 'admission') selected @endif >استقدام</option>
                                <option value="transport" @if ($type == 'transport') selected @endif >نقل خدمات</option>
                                <option value="rental" @if ($type == 'rental') selected @endif >ايجار</option>

                            </select>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group mb-3">
                                <select class="form-control" name="religion_id" id="religion_id">
                                    <option value="" selected>الديانة</option>
                                    @foreach($religions as $religion)
                                        <option value="{{ $religion->id }}" @if($religion_id == $religion->id) selected @endif>
                                            {{ $religion->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 ml-auto">
                            <div class="input-group mb-3">
                                <select class="form-control" name="social_status_id" id="social_status_id">
                                    <option value="" selected>الحالة الاجتماعية</option>
                                    @foreach($social_statuses as $socialStatus)
                                        <option value="{{ $socialStatus->id }}" @if($social_status_id == $socialStatus->id) selected @endif>
                                            {{ $socialStatus->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class='input-group mb-3'>
                                <select class="form-control " name="social_type" id="social_type">
                                    <option value="" selected>الخبرة</option>
                                    <option value="1" @if($social_type_id==1 ) selected @endif >قادم جديد </option>
                                    <option value="2" @if($social_type_id==2 ) selected @endif >لديه خبرة سابقة</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 ml-auto">
                            <select class="form-control " name="booking_status" id="booking_status">
                                <option value=" " selected>حالة السيرة الذاتية</option>
                                <option value="new" @if ($booking_status == 'new') selected @endif >غير محجوز</option>
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
                                   تحت ألأجراء والتدريب
                                </option>
                                <option value="visa" @if ($booking_status == 'visa') selected @endif >
                                    التفييز
                                </option>
                                <option value="finished" @if ($booking_status == 'finished') selected @endif >
                                    وصول العمالة
                                </option>
                                <option value="canceled" @if ($booking_status == 'canceled') selected @endif>
                                    سير ملغية
                                </option>
                                <option value="pending" @if ($booking_status == 'pending') selected @endif>
                                    سير معلقة
                                </option>
                            </select>
                        </div>
                        <div class="col-md-2 ">
                            <div class='input-group mb-3' style="width: 228px">
                                <input type='text' class="form-control " id="reportrange" name="datefilter"
                                       @isset($date) value="{{ $date }}" @endisset
                                       placeholder="مدى التاريخ"
                                       data-separator=" - "  autocomplete="off"  data-advanced-range="true"  />

                                <span class="input-group-text">
                                            <i class="feather-sm fa fa-calendar"></i>
                                        </span>
                            </div>
                        </div>
                        <div class="col-md-2 text-end">
                            <button id="btnSubmit" class="btn btn-info">بحث</button>
                            @if(count($_GET)>0 )
                                <a id="cancel_request" href="{{route('biographies.index')}}" class="btn btn-danger">
                                  إلغاء البحث
                                </a>
                            @endif

                        </div>
                        @if(checkPermission(19))
                            <div class="col-sm-4">
                                <div class="text-sm-start">
                                    <a href="{{route('biographies.create')}}" id="addButton" type="button"
                                       class="btn btn-success  waves-effect waves-light mb-2 me-2">
                                        <i class="mdi mdi-plus me-1"></i> أضف جديد </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    {{---------------------------------}}
                    <div class="row mb-2">

                        <div class="col-sm-8">
                            {{--                            <div class="text-sm-end">--}}
                            {{--                                <button id="bulk_delete" type="button" class="btn btn-danger  waves-effect waves-light mb-2 me-2">--}}
                            {{--                                    </button>--}}
                            {{--                            </div>--}}
                        </div><!-- end col-->
                    </div>

                    {{---------------------------------}}

                    <div class="mb-3 d-flex justify-content-start">
                        <div id="bulk_actions_wrapper" style="display:none;">
                            <div class="dropdown">
                                <button class="btn btn-orange-glass dropdown-toggle"
                                        type="button"
                                        id="bulkActionsBtn"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    <i class="fas fa-cogs"></i> تنفيذ على المحدد
                                </button>

                                <ul class="dropdown-menu shadow-sm border-0" aria-labelledby="bulkActionsBtn">
                                    <li>
                                        <a class="dropdown-item text-warning d-flex align-items-center gap-2" href="#" id="bulk_block">
                                            <i class="fas fa-ban"></i> حظر
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-danger d-flex align-items-center gap-2" href="#" id="bulk_delete">
                                            <i class="fas fa-trash-alt"></i> مسح
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <table id="Datatable" class="table table-striped table-bordered dt-responsive  nowrap w-100">
                        <thead>
                        <tr>
                            <th>
                                <input id="checkAll" type='checkbox' class='check-all form-check-input'
                                       data-tablesaw-checkall>

                                <!--<a id="bulk_delete" href="#" style="display: none;" class=" text-danger p-2">
                                    <i class="mdi mdi-trash-can-outline me-1  "
                                       style=" width: 50% !important;height: 50% !important;"></i>
                                </a>-->
                                <!-- زر الإجراءات الجماعية -->



                            </th>

                            <th>الصورة</th>
                            <th>صور اضافية</th>
                            <th>الحالة</th>
                            <th>الجنسية</th>
                            <th>رقم جواز السفر</th>
                            <th>النوع</th>
                            <th>الديانة</th>
                            <!--<th>الحالة الاجتماعية</th>-->
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


    <!-- حجز العاملة -->
    <div class="modal fade" id="reserveModal" tabindex="-1" aria-labelledby="reserveModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header bg-primary text-white">
            <h5 class="modal-title" style="color:#FFF !important" id="reserveModalLabel">حجز العاملة</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="إغلاق"></button>
        </div>
        <div class="modal-body">
            <form id="reserveForm">
            <input type="hidden" name="cv_id" id="cv_id">

            <div class="mb-3">
                <label class="form-label">اختر العميل</label>
                <select class="form-select select2" id="customer" name="customer" style="width:100%;"></select>
            </div>

            <div class="mb-3">
                <label class="form-label">اختر المسوق</label>
                <select class="form-select select2" id="marketer" name="marketer" style="width:100%;"></select>
            </div>

            <button type="submit" class="btn btn-success w-100">تأكيد الحجز</button>
            </form>
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
            "searching": false,
            'iDisplayLength': 20,
            "ajax":  {
                url: "{{route('biographies.index')}}",
                data: function (d) {
                        d.passport_key = $('#passport_key').val(),
                        d.social_type = $('#social_type').val(),
                        // d.selected_staff = $('#selected_staff').val(),
                        d.booking_status = $('#booking_status').val(),
                        // d.cv_type=$('#cv_type').val(),
                        // d.occuption_id=$('#occuption_id').val(),
                        d.nationality_id = $('#nationality_id').val(),
                        d.recruitment_office_id = $('#recruitment_office_id').val(),
                        d.type = $('#type').val(),
                        d.date = $('#reportrange').val(),
                        d.religion_id = $('#religion_id').val(),
                        d.social_status_id = $('#social_status_id').val()
                }
            },
            "columns": [
                {"data": "delete_all", orderable: false, searchable: false},
                {"data": "image", orderable: false, searchable: false},
                {"data": "smart_image", orderable: false, searchable: false},


                {"data": "status", orderable: false, searchable: true},
                {"data": "nationalitie_id", orderable: false, searchable: true},
                {"data": "passport_number", orderable: false, searchable: true},
                {"data": "type", orderable: false, searchable: true},
                {"data": "religion", orderable: false, searchable: true},        // ✅ جديد

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
                $('   <a  href="{{route('biographies.index')}}" class="btn btn-danger cancel_request_add " style="margin:5px 5px 5px 5px;"> إلغاء البحث </a>').insertAfter("#btnSubmit");
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
                    var url = '{{ route("biographies.destroy", ":id")}}';
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


        /*$(document).on('click', '#checkAll', function () {
            var check = true;
            $('.delete-all:checked').each(function () {
                check = false;
            });
            if (check == true) $("#bulk_delete").show()
            else $("#bulk_delete").hide()
            $('.delete-all').prop('checked', check);
        });*/

        $(document).on('click', '#checkAll', function () {
            const check = this.checked;
            $('.delete-all').prop('checked', check);
            toggleBulkActions();
        });

        $(document).on('change', '.delete-all', function () {
            toggleBulkActions();
        });

        function toggleBulkActions() {
            let selected = $('.delete-all:checked').length;
            if (selected > 0) {
                $('#bulk_actions_wrapper').show();
            } else {
                $('#bulk_actions_wrapper').hide();
            }
        }



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

    <script>
        $(document).on('click', '#bulk_block', function (e) {
            e.preventDefault();

            var ids = [];
            $('.delete-all:checked').each(function () {
                ids.push($(this).attr('id'));
            });

            if (ids.length === 0) {
                Swal.fire("لم يتم التحديد", "يرجى تحديد السير الذاتية أولاً", "warning");
                return;
            }

            Swal.fire({
                title: 'تأكيد الحظر؟',
                text: "سيتم حظر العناصر المحددة",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'نعم، حظر',
                cancelButtonText: 'إلغاء',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('biographies.toggleBlock') }}",
                        type: "POST",
                        data: {
                            id: ids, // array of ids
                            status: 1, // للحظر
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            toastr.success(response.message);
                            datatable_selector.ajax.reload();
                            $('#bulk_actions_wrapper').hide();
                        },
                        error: function() {
                            toastr.error("فشل تنفيذ العملية");
                        }
                    });
                }
            });
        });


        $(document).on('click', '.toggle-block', function(e) {
            e.preventDefault();

            let id = $(this).data('id');
            let status = $(this).data('status');
            let actionText = (status === 1) ? "تأكيد حظر هذا العنصر؟" : "تأكيد إلغاء الحظر؟";

            Swal.fire({
                title: 'هل أنت متأكد؟',
                text: actionText,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'نعم، تأكيد',
                cancelButtonText: 'إلغاء'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('biographies.toggleBlock') }}",
                        type: 'POST',
                        data: {
                            id: id,
                            status: status,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            toastr.success(response.message);
                            $('#Datatable').DataTable().ajax.reload();
                        },
                        error: function(xhr) {
                            toastr.error("حدث خطأ ما أثناء تنفيذ العملية");
                        }
                    });
                }
            });
        });


        $(document).on('click', '.reserve-btn', function() {
            let cv_id = $(this).data('id');
            $('#cv_id').val(cv_id);
            $('#reserveModal').modal('show');
        });

        // تحميل العملاء والمسوقين مرة واحدة
        let loaded = false;
        $('#reserveModal').on('shown.bs.modal', function () {
            if (loaded) return;
            loaded = true;

            // تحميل كل العملاء
            $.get('{{ route("ajax.searchUsers") }}', { all: 1, table: 'users' }, function (data) {
                $('#customer').empty();
                data.forEach(function (item) {
                    let newOption = new Option(item.text, item.id, false, false);
                    $('#customer').append(newOption);
                });
            });

            // تحميل كل المسوقين (admins with admin_type != 0)
            $.get('{{ route("ajax.searchUsers") }}', { all: 1, table: 'admins' }, function (data) {
                $('#marketer').empty();
                data.forEach(function (item) {
                    let newOption = new Option(item.text, item.id, false, false);
                    $('#marketer').append(newOption);
                });
            });
        });

        // تفعيل select2 (بدون Ajax — البحث محلي)
        $('.select2').select2({
            dropdownParent: $('#reserveModal'),
            dir: "rtl",
            placeholder: 'اختر من القائمة أو اكتب للبحث'
        });

        // إرسال الحجز
        $('#reserveForm').on('submit', function(e){
            e.preventDefault();

            $.ajax({
                url: '{{ route("biographies.reserveWorker") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    cv_id: $('#cv_id').val(),
                    customer_id: $('#customer').val(),
                    marketer_id: $('#marketer').val()
                },
                success: function (res) {
                    toastr.success('تم حجز العاملة بنجاح');
                    $('#reserveModal').modal('hide');
                    $('#dataTable').DataTable().ajax.reload();
                },
                error: function (err) {
                    toastr.error('حدث خطأ أثناء الحجز');
                }
            });
        });


    </script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@endsection
