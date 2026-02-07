@extends('admin.layouts.layout')

@section('styles')
<link href="{{ asset('dashboard/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('dashboard/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet">
<style>
.switch{position:relative;display:inline-block;width:56px;height:30px}
.switch input{opacity:0;width:0;height:0}
.slider{position:absolute;cursor:pointer;inset:0;background:#ccc;transition:.4s;border-radius:30px}
.slider:before{position:absolute;content:"";height:22px;width:22px;left:4px;bottom:4px;background:white;transition:.4s;border-radius:50%;box-shadow:0 4px 10px rgba(0,0,0,.25)}
.switch input:checked + .slider{background:#D89835}
.switch input:checked + .slider:before{transform:translateX(26px)}
</style>
@endsection

@section('page-title')
أسئلة المقال: {{ $blog->title }}
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row mb-2">
                    <div class="col-sm-4">
                        <button id="addFaqButton" class="btn btn-success">
                            <i class="mdi mdi-plus"></i> أضف سؤال
                        </button>
                    </div>
                    <div class="col-sm-8 text-end">
                        <button id="bulk_toggle" class="btn btn-warning" style="display:none;">
                            <i class="mdi mdi-eye-off-outline"></i> تغيير الحالة
                        </button>
                        <button id="bulk_delete" class="btn btn-danger" style="display:none;">
                            <i class="mdi mdi-trash-can-outline"></i> حذف المحدد
                        </button>
                    </div>
                </div>

                <table id="faqTable" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAll" class="form-check-input"></th>
                            <th>#</th>
                            <th>السؤال</th>
                            <th>الإجابة</th>
                            <th>الحالة</th>
                            <th>التحكم</th>
                        </tr>
                    </thead>
                </table>

            </div>
        </div>
    </div>
</div>

{{-- Modal --}}
<div class="modal fade" id="faqModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="faqModalLabel"></h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="faq-form-container"></div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-bs-dismiss="modal">إغلاق</button>
                <button form="FaqForm" type="submit" class="btn btn-success">حفظ</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('dashboard/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
let table = $('#faqTable').DataTable({
    processing:true,
    serverSide:true,
    ajax:"{{ route('blogs.faqs.index', $blog->id) }}",
    columns:[
        {data:'check',orderable:false,searchable:false},
        {data:'id'},
        {data:'question'},
        {data:'answer'},
        {data:'status'},
        {data:'actions',orderable:false,searchable:false},
    ]
});

/* ADD FAQ */
$('#addFaqButton').click(function(){
    $.get("{{ route('blogs.faqs.create', $blog->id) }}", function(res){
        $('#faq-form-container').html(res.html);
        $('#faqModalLabel').text('إضافة سؤال');
        $('#faqModal').modal('show');
    });
});

/* EDIT FAQ */
$(document).on('click','.editFaq',function(){
    let id = $(this).data('id');
    let url = "{{ url('admin/blogs/'.$blog->id.'/faqs') }}/"+id+"/edit";
    $.get(url,function(res){
        $('#faq-form-container').html(res.html);
        $('#faqModalLabel').text('تعديل سؤال');
        $('#faqModal').modal('show');
    });
});

/* DELETE FAQ */
$(document).on('click','.deleteFaq',function(){
    let id = $(this).data('id');
    Swal.fire({
        title:'هل أنت متأكد؟',
        text:"لن تستطيع التراجع عن الحذف!",
        icon:'warning',
        showCancelButton:true,
        confirmButtonText:'نعم، احذف!',
        cancelButtonText:'إلغاء'
    }).then((result)=>{
        if(result.isConfirmed){
            $.ajax({
                url:"{{ url('admin/blogs/'.$blog->id.'/faqs') }}/"+id,
                type:'DELETE',
                data:{_token:'{{ csrf_token() }}'},
                success:function(){ table.ajax.reload(); Swal.fire('تم الحذف!','','success'); }
            });
        }
    });
});

/* SUBMIT FORM */
$(document).on('submit','#FaqForm',function(e){
    e.preventDefault();
    let formData = $(this).serialize();
    let action = $(this).attr('action');
    $.post(action, formData, function(){
        $('#faqModal').modal('hide');
        table.ajax.reload();
    });
});

/* Checkbox logic */
$(document).on('click','#checkAll',function(){
    let checked = $(this).is(':checked');
    $('.delete-all').prop('checked', checked);
    if(checked) $("#bulk_delete, #bulk_toggle").show();
    else $("#bulk_delete, #bulk_toggle").hide();
});

$(document).on('click','.delete-all',function(){
    if($('.delete-all:checked').length>0) $("#bulk_delete, #bulk_toggle").show();
    else $("#bulk_delete, #bulk_toggle").hide();
});

/* Bulk delete */
$(document).on('click','#bulk_delete',function(){
    let ids = [];
    $('.delete-all:checked').each(function(){ ids.push($(this).val()) });
    if(ids.length){
        Swal.fire({
            title:'هل أنت متأكد من حذف هذه الأسئلة؟',
            icon:'warning',
            showCancelButton:true,
            confirmButtonText:'نعم، احذف!',
            cancelButtonText:'إلغاء'
        }).then((result)=>{
            if(result.isConfirmed){
                $.ajax({
                    url:"{{ route('blogs.faqs.bulk.delete', $blog->id) }}",
                    type:'DELETE',
                    data:{_token:'{{ csrf_token() }}',ids:ids},
                    success:function(){ table.ajax.reload(); Swal.fire('تم الحذف!','','success'); }
                });
            }
        });
    }
});

/* Bulk toggle status */
$(document).on('click','#bulk_toggle',function(){
    let ids = [];
    $('.delete-all:checked').each(function(){ ids.push($(this).val()) });
    if(ids.length){
        $.post("{{ route('blogs.faqs.bulk.toggle', $blog->id) }}",{_token:'{{ csrf_token() }}',ids:ids},function(){
            table.ajax.reload();
        });
    }
});
</script>
@endsection
