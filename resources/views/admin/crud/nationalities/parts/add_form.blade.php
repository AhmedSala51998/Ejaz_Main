<form action="{{ route('nationalities.store') }}" method="post" id="Form">
    @csrf

    <div class="row ">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="form-group">

                <label for="name" class="form-control-label">علم الدولة</label>
                <input type="file" class="dropify" name="image" data-default-file=""
                    accept="image/png, image/gif, image/jpeg,image/jpg" />
                <span class="form-text text-danger text-center">مسموح فقط بالصيغ التالية : png, gif, jpeg, jpg</span>
            </div>
        </div>



        @foreach ($languages as $index => $language)
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label for="{{ $language->title }}_title">{{ __('admin.nationalities') }} {{-- ({{__('admin.'.$language->title)}}
                        ) --}}
                    </label>
                    <input data-validation="required" type="text" class="form-control" value=""
                        id="{{ $language->title }}_title" name="title[]"
                        placeholder="{{ __('admin.nationalities') }} {{-- ({{__('admin.'.$language->title)}}) --}}">
                </div>
            </div>
        @endforeach

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                <label for="recruitment_price">سعر الاستقدام </label>
                <input data-validation="required" type="text" class="form-control" value=""
                    id="recruitment_price" name="price" placeholder="سعر الاستقدام ">
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                <label for="recruitment_price2">سعر نقل الخدمات </label>
                <input data-validation="required" type="text" class="form-control" value=""
                    id="recruitment_price2" name="price_service" placeholder="سعر نقل الخدمات ">
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                <label for="name">اسم الدولة</label>
                <input data-validation="required" type="text" class="form-control" value="" id="name"
                    name="country_name" placeholder="اسم الدولة ">
            </div>
        </div>


        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="form-group">
                <label for="desc"> الوصف </label>
                <input data-validation="required" type="text" class="form-control" value="" id="desc"
                    name="desc" placeholder="الوصف">
            </div>
        </div>


        {{-- @foreach ($languages as $index => $language)
             <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                 <div class="form-group">
                     <label for="summernote1{{$language->title}}">{{__('admin.the_answer')}}
                       --}}{{--  ({{__('admin.'.$language->title)}}) --}}{{-- </label>
                     <textarea data-validation="" rows="6" class="form-control " name="desc[]"
                               id="summernote1{{$language->title}}"
                               placeholder="{{__('admin.the_answer')}} --}}{{-- ({{__('admin.'.$language->title)}}) --}}{{-- "></textarea>
                 </div>
             </div>
         @endforeach --}}
    </div>
</form>


<link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script>
    $('.dropify').dropify()
</script>
