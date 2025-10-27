<form action="{{route('sponsors.update',$obj->id)}}" method="post" id="Form">
    @csrf
    @method('PUT')


    {{--form--}}
    <div class="row ">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="form-group">
                <label for="address1">الصورة </label>
                <input  type="file" data-default-file="{{get_file($obj->image)}}" class="form-control dropify" id="image" name="image" >
            </div>
        </div>


    </div>
    {{--form--}}
</form>


