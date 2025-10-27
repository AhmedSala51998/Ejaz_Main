<form action="{{route('notes.add',$order_id)}}" method="post" id="Form">


    @csrf

    <div class="row ">
        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                <label >اضافة الملحوظة</label>
                <input data-validation="required" type="text" class="form-control"
                       name="note"
                       placeholder="ملحوظة">
            </div>
        </div>

    </div>
</form>





