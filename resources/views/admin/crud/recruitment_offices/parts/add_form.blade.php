<form action="{{route('recruitment-offices.store')}}" method="post" id="Form">
    @csrf

    <div class="row ">
        @foreach($languages as $index=>$language)
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label for="{{$language->title}}_title">{{__('admin.recruitment office')}} {{--({{__('admin.'.$language->title)}}
                        )--}} </label>
                    <input data-validation="required"  type="text" class="form-control" value=""
                           id="{{$language->title}}_title" name="title[]"
                           placeholder="{{__('admin.recruitment office')}} {{--({{__('admin.'.$language->title)}}) --}}">
                </div>
            </div>
        @endforeach
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <label for="_title">الدولة</label>

            <select name="country_id" data-validation="required"   required  class="form-select" aria-label="Default select example">
                @foreach(\App\Models\Nationalitie::get() as $country)
                    <option value="{{$country->id}}">{{$country->country_name}}</option>

                @endforeach
            </select>
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


