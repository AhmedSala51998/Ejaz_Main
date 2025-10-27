<form action="{{route('statistics.update',$obj->id)}}" method="post" id="Form">
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

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label for="icon">{{__('admin.icon')}} {{--({{__('admin.'.$language->title)}}
                        )--}} </label>
                    <input data-validation="required" type="text" class="form-control" value="{{$obj->icon}}"
                           id="icon" name="icon"
                           placeholder="{{__('admin.icon')}} {{--({{__('admin.'.$language->title)}}) --}}">
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label for="number">{{__('admin.number')}} {{--({{__('admin.'.$language->title)}}
                        )--}} </label>
                    <input data-validation="required" type="number" class="form-control" value="{{$obj->number}}"
                           id="number" name="number"
                           placeholder="{{__('admin.number')}} {{--({{__('admin.'.$language->title)}}) --}}">
                </div>
            </div>
      {{--  @foreach($languages as $index=>$language)
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                <div class="form-group">
                    <label for="summernote1{{$language->title}}">{{__('admin.the_answer')}}
                        --}}{{--  ({{__('admin.'.$language->title)}})--}}{{-- </label>
                    <textarea data-validation="" rows="6" class="form-control " name="desc[]"
                              id="summernote1{{$language->title}}"
                              placeholder="{{__('admin.the_answer')}} --}}{{--({{__('admin.'.$language->title)}}) --}}{{--">
                        {{$obj->getTranslation('desc', $language->title)}}
                    </textarea>
                </div>
            </div>
        @endforeach--}}
    </div>
    {{--form--}}

    {{--form--}}
</form>


