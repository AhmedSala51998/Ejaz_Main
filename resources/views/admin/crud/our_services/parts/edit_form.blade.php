<form action="{{route('our-services.update',$obj->id)}}" method="post" id="Form">
    @csrf
    @method('PUT')

    <div class="row ">
        @foreach($languages as $index=>$language)
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label for="{{$language->title}}_title">{{__('admin.title')}} {{--({{__('admin.'.$language->title)}}
                        )--}} </label>
                    <input data-validation="required" type="text" class="form-control"
                           value="{{$obj->getTranslation('title', $language->title)}}"
                           id="{{$language->title}}_title" name="title[]"
                           placeholder="{{__('admin.title')}} {{--({{__('admin.'.$language->title)}}) --}}">
                </div>
            </div>
        @endforeach

        @foreach($languages as $index=>$language)
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                <div class="form-group">
                    <label for="summernote1{{$language->title}}">{{__('admin.siteDetails')}}
                        {{--  ({{__('admin.'.$language->title)}})--}} </label>
                    <textarea data-validation="" rows="6" class="form-control " name="desc[]"
                              id="summernote1{{$language->title}}"
                              placeholder="{{__('admin.siteDetails')}} {{--({{__('admin.'.$language->title)}}) --}}">
                        {{$obj->getTranslation('desc', $language->title)}}
                    </textarea>
                </div>
            </div>
        @endforeach
    </div>
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


