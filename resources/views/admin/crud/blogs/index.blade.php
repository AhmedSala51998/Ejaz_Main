@extends('admin.layouts.layout')

@section('styles')
<link href="{{ asset('dashboard/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('dashboard/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet">
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
    .featured-box{
    display:flex;
    align-items:center;
    justify-content:space-between;
    background:linear-gradient(135deg,#fff7ea,#ffffff);
    border:1px solid rgba(216,152,53,.25);
    border-radius:18px;
    padding:18px 22px;
    margin-top:15px;
    box-shadow:0 10px 30px rgba(0,0,0,.06);
}

.featured-info{
    display:flex;
    align-items:center;
    gap:14px;
}

.featured-icon{
    width:42px;
    height:42px;
    background:#D89835;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    font-size:20px;
    box-shadow:0 6px 15px rgba(216,152,53,.45);
}

.featured-info h6{
    margin:0;
    font-size:15px;
    font-weight:800;
    color:#222;
}

.featured-info p{
    margin:2px 0 0;
    font-size:13px;
    color:#666;
}

/* Switch */
.switch{
    position:relative;
    display:inline-block;
    width:56px;
    height:30px;
}

.switch input{
    opacity:0;
    width:0;
    height:0;
}

.slider{
    position:absolute;
    cursor:pointer;
    inset:0;
    background:#ccc;
    transition:.4s;
    border-radius:30px;
}

.slider:before{
    position:absolute;
    content:"";
    height:22px;
    width:22px;
    left:4px;
    bottom:4px;
    background:white;
    transition:.4s;
    border-radius:50%;
    box-shadow:0 4px 10px rgba(0,0,0,.25);
}

.switch input:checked + .slider{
    background:#D89835;
}

.switch input:checked + .slider:before{
    transform:translateX(26px);
}

</style>
@endsection

@section('page-title')
المدونة
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row mb-2">
                    <div class="col-sm-4">
                        <button id="addButton" class="btn btn-success">
                            <i class="mdi mdi-plus"></i> أضف مقال
                        </button>
                    </div>
                    <div class="col-sm-8 text-end">
                        <button id="bulk_delete" class="btn btn-danger" style="display:none;">
                            <i class="mdi mdi-trash-can-outline"></i> حذف المحدد
                        </button>
                    </div>
                </div>

                <table id="Datatable" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>
                                <input id="checkAll" type='checkbox' class='check-all form-check-input'
                                    data-tablesaw-checkall>
                            </th>
                            <th>الصورة</th>
                            <th>الصورة الثانية</th>
                            <th>العنوان</th>
                            <th>الحالة</th>
                            <th>التاريخ</th>
                            <th>التمييز</th>
                            <th>المشاهدات</th>
                            <th>التحكم</th>
                        </tr>
                    </thead>
                </table>

            </div>
        </div>
    </div>
</div>

{{-- Modal --}}
<div class="modal fade" id="exampleModalCenter" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="exampleModalLabel"></h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="form-for-addOrDelete"></div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-bs-dismiss="modal">إغلاق</button>
                <button form="Form" type="submit" class="btn btn-success">حفظ</button>
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
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<script>
let table = $('#Datatable').DataTable({
    processing:true,
    serverSide:true,
    ajax:"{{ route('blogs.index') }}",
    columns:[
        {data:'delete_all',orderable:false,searchable:false},
        {data:'image',orderable:false,searchable:false},
        {data:'second_image',orderable:false,searchable:false},
        {data:'title'},
        {data:'status'},
        {data:'created_at'},
        {data:'featured',orderable:false,searchable:false},
        {data:'views', name:'views'},
        {data:'actions',orderable:false,searchable:false},
    ]
});

/* ADD */
$(document).on('click','#addButton',function(){
    $.get("{{ route('blogs.create') }}",function(res){
        $('#form-for-addOrDelete').html(res.html)
        $('#exampleModalLabel').text('إضافة مقال')
        $('#exampleModalCenter').modal('show')
        $('.dropify').dropify()
    })
});

/* EDIT */
$(document).on('click','.editButton',function(){
    let id = $(this).attr('id')
    let url = "{{ route('blogs.edit',':id') }}".replace(':id',id)
    $.get(url,function(res){
        $('#form-for-addOrDelete').html(res.html)
        $('#exampleModalLabel').text('تعديل مقال')
        $('#exampleModalCenter').modal('show')
        $('.dropify').dropify()
    })
});

/* DELETE Single */
$(document).on('click','.delete',function(){
    let id = $(this).attr('id')
    let url = "{{ route('blogs.destroy',':id') }}".replace(':id',id)
    Swal.fire({
        title: 'هل أنت متأكد؟',
        text: "لن تستطيع التراجع عن الحذف!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'نعم، احذف!',
        cancelButtonText: 'إلغاء'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:url,
                type:'DELETE',
                data:{_token:'{{ csrf_token() }}'},
                success:function(){
                    table.draw()
                    Swal.fire('تم الحذف!', 'تم حذف المقال بنجاح.', 'success')
                }
            })
        }
    })
});

/* SUBMIT */
$(document).on('submit','#Form',function(e){
    e.preventDefault()
    let formData = new FormData(this)
    let action = $(this).attr('action')
    $.ajax({
        url:action,
        type:'POST',
        data:formData,
        contentType:false,
        processData:false,
        success:function(){
            $('#exampleModalCenter').modal('hide')
            table.draw()
        }
    })
});

/* Checkbox logic */
$(document).on('click','#checkAll',function(){
    let checked = $(this).is(':checked');
    $('.delete-all').prop('checked', checked);
    if(checked) $("#bulk_delete").show();
    else $("#bulk_delete").hide();
});

$(document).on('click','.delete-all',function(){
    if($('.delete-all:checked').length>0) $("#bulk_delete").show();
    else $("#bulk_delete").hide();
});

/* Bulk delete */
$(document).on('click','#bulk_delete',function(e){
    e.preventDefault();
    let ids = [];
    $('.delete-all:checked').each(function(){ ids.push($(this).attr('id')) });
    if(ids.length){
        Swal.fire({
            title: "هل أنت متأكد من حذف هذه المقالات؟",
            text: "لا يمكنك التراجع بعد ذلك!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "نعم، احذف!",
            cancelButtonText: "إلغاء"
        }).then((result)=>{
            if(result.isConfirmed){
                $.ajax({
                    url:'{{ route("blogs.delete.bulk") }}',
                    type:'DELETE',
                    data:{id: ids, _token:'{{ csrf_token() }}'},
                    success:function(){
                        $("#checkAll").prop('checked',false);
                        $("#bulk_delete").hide();
                        table.draw();
                        Swal.fire("تم الحذف!","تم حذف المقالات بنجاح.","success");
                    }
                })
            }
        })
    }
});

function initDropify() {
    $('.dropify').dropify();
}

function initCkEditor() {
    if (CKEDITOR.instances.editor) {
        CKEDITOR.instances.editor.destroy(true);
    }

    CKEDITOR.replace('editor', {
        language: 'ar',
        height: 300,
        removePlugins: 'elementspath',
        resize_enabled: false
    });
}

function initFormPlugins() {
    initDropify();
    initCkEditor();
}

$(document).on('click', '#addButton', function(){
    $.get("{{ route('blogs.create') }}", function(res){
        $('#form-for-addOrDelete').html(res.html);
        $('#exampleModalLabel').text('إضافة مقال');
        $('#exampleModalCenter').modal('show');

        initFormPlugins();
    });
});

$(document).on('click', '.editButton', function(){
    let id = $(this).attr('id');
    let url = "{{ route('blogs.edit',':id') }}".replace(':id', id);
    $.get(url, function(res){
        $('#form-for-addOrDelete').html(res.html);
        $('#exampleModalLabel').text('تعديل مقال');
        $('#exampleModalCenter').modal('show');

        initFormPlugins();
    });
});

$(document).ajaxComplete(function () {
    if ($('#editor').length) {
        initFormPlugins();
    }
});

</script>

@endsection
