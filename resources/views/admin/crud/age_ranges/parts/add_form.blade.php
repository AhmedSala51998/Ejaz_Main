<form action="{{route('age-ranges.store')}}" method="post" id="Form">
    @csrf

    <div class="row ">

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                <label for="from">{{__('admin.age_from')}} {{--({{__('admin.'.$language->title)}}
                        )--}} </label>
                <input data-validation="required" type="number" class="form-control" value=""
                       id="from" name="from"
                       placeholder="{{__('admin.age_from')}} {{--({{__('admin.'.$language->title)}}) --}}">
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                <label for="to">{{__('admin.age_to')}} {{--({{__('admin.'.$language->title)}}
                        )--}} </label>
                <input data-validation="required" type="number" class="form-control" value=""
                       id="to" name="to"
                       placeholder="{{__('admin.age_to')}} {{--({{__('admin.'.$language->title)}}) --}}">
            </div>
        </div>

        {{-- @foreach($languages as $index=>$language)
             <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                 <div class="form-group">
                     <label for="summernote1{{$language->title}}">{{__('admin.the_answer')}}
                       --}}{{--  ({{__('admin.'.$language->title)}})--}}{{-- </label>
                     <textarea data-validation="" rows="6" class="form-control " name="desc[]"
                               id="summernote1{{$language->title}}"
                               placeholder="{{__('admin.the_answer')}} --}}{{--({{__('admin.'.$language->title)}}) --}}{{--"></textarea>
                 </div>
             </div>
         @endforeach--}}
    </div>
</form>


