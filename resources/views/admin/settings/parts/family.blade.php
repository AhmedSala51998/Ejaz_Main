<div>
    <h4 class="card-title">جزء العائلة فى الرئيسية </h4>
    <form id="Form_family" method="post" action="{{route('settings.update',$settings->id)}}">
        @csrf
        @method('PUT')
        <input type="hidden" name="form_type" value="family">
        <div class="row ">
            @foreach($languages as $index=>$language)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label
                            for="{{$language->title}}_title"> </label>
                        <input data-validation="required" type="text"
                               class="form-control"
                               value="{{$settings->getTranslation('our_family_title1', $language->title)}}"
                               id="{{$language->title}}_title"
                               name="our_family_title1[]"
                               placeholder="">
                    </div>
                </div>
            @endforeach

            @foreach($languages as $index=>$language)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                    <div class="form-group">
                        <label for="summernote1{{$language->title}}">

                        </label>
                        <textarea data-validation="" rows="6" class="form-control "
                                  name="our_family_desc1[]"
                                  id="summernote1{{$language->title}}"
                                  placeholder=" ">
                                                         {{$settings->getTranslation('our_family_desc1', $language->title)}}
                                                     </textarea>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row ">
            <div class="form-group row mb-4">
                <label for="footer_logo" class="col-md-2 col-form-label">
                    الصورة
                </label>
                <div class="col-md-10">
                    <input type="file"
                           data-default-file="{{get_file($settings->our_family_image1)}}"
                           class="form-control dropify" id="our_family_image1"
                           name="our_family_image1"
                           placeholder="الصورة">

                </div>
            </div>
        </div>
        <div class="row ">
            @foreach($languages as $index=>$language)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="{{$language->title}}_title">

                        </label>
                        <input data-validation="required" type="text"
                               class="form-control"
                               value="{{$settings->getTranslation('our_family_title2', $language->title)}}"
                               id="{{$language->title}}_title"
                               name="our_family_title2[]"
                               placeholder="">
                    </div>
                </div>
            @endforeach

            @foreach($languages as $index=>$language)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                    <div class="form-group">
                        <label for="summernote1{{$language->title}}">

                        </label>
                        <textarea data-validation="" rows="6" class="form-control "
                                  name="our_family_desc2[]"
                                  id="summernote1{{$language->title}}"
                                  placeholder=" ">
                                                         {{$settings->getTranslation('our_family_desc2', $language->title)}}
                                                     </textarea>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row ">
            <div class="form-group row mb-4">
                <label for="footer_logo" class="col-md-2 col-form-label">
                    الصورة
                </label>
                <div class="col-md-10">
                    <input type="file"
                           data-default-file="{{get_file($settings->our_family_image2)}}"
                           class="form-control dropify" id="our_family_image2"
                           name="our_family_image2"
                           placeholder="الصورة">

                </div>
            </div>

        </div>
        <div class="row mt-4">
            <div class="col-sm-6">

            </div> <!-- end col -->
            @if(checkPermission(4))

            <div class="col-sm-6">
                <div class="text-end">
                    <button form="Form_family" type="submit" class="btn btn-success">
                        <i class="mdi mdi-content-save me-1"></i> حفظ
                    </button>
                </div>
            </div> <!-- end col -->
                @endif
        </div> <!-- end row -->
    </form>
</div>
