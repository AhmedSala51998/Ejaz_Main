<form action="{{route('sponsors.store')}}" method="post" id="Form">
    @csrf

    <div class="row ">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
            <div class="form-group">
                <label for="address1">الصورة </label>
                <input data-validation="required" type="file" data-default-file="" class="form-control dropify"
                       id="image" name="image">
            </div>
        </div>


    </div>
</form>


