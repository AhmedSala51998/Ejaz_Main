<div id="steps" >
    <h4 class="card-title">خطوات الاستقدام </h4>
    <form id="Form_step" method="post" action="{{route('settings.update',$settings->id)}}">
        @csrf
        @method('PUT')
        <input type="hidden" name="form_type" value="step">
        <div class="row ">
            @foreach($languages as $index=>$language)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                    <div class="form-group">
                        <label
                            for="summernote1{{$language->title}}">نبذة عن خطوات
                            الاستقدام </label>
                        <textarea data-validation="" rows="6" class="form-control "
                                  name="recruitment_step_desc[]"
                                  id="summernote1{{$language->title}}"
                                  placeholder="نبذة عن خطوات الاستقدام  ">
                                                         {{$settings->getTranslation('recruitment_step_desc', $language->title)}}
                                                     </textarea>
                    </div>
                </div>
            @endforeach

            @foreach($languages as $index=>$language)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                    <div class="form-group">
                        <label
                            for="summernote1{{$language->title}}">الخطوة الاولى </label>
                        <textarea data-validation="" rows="6" class="form-control "
                                  name="recruitment_step1_desc[]"
                                  id="summernote1{{$language->title}}"
                                  placeholder="الخطوة الاولى   ">
                                                         {{$settings->getTranslation('recruitment_step1_desc', $language->title)}}
                                                     </textarea>
                    </div>
                </div>
            @endforeach

            @foreach($languages as $index=>$language)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                    <div class="form-group">
                        <label
                            for="summernote1{{$language->title}}">الخطوة
                            الثانية </label>
                        <textarea data-validation="" rows="6" class="form-control "
                                  name="recruitment_step2_desc[]"
                                  id="summernote1{{$language->title}}"
                                  placeholder="الخطوة الثانية   ">
                                                         {{$settings->getTranslation('recruitment_step2_desc', $language->title)}}
                                                     </textarea>
                    </div>
                </div>
            @endforeach

            @foreach($languages as $index=>$language)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                    <div class="form-group">
                        <label
                            for="summernote1{{$language->title}}">الخطوة
                            الثالثة </label>
                        <textarea data-validation="" rows="6" class="form-control "
                                  name="recruitment_step3_desc[]"
                                  id="summernote1{{$language->title}}"
                                  placeholder="الخطوة الثالثة   ">
                                                         {{$settings->getTranslation('recruitment_step3_desc', $language->title)}}
                                                     </textarea>
                    </div>
                </div>
            @endforeach

            @foreach($languages as $index=>$language)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                    <div class="form-group">
                        <label
                            for="summernote1{{$language->title}}">الخطوة
                            الرابعة </label>
                        <textarea data-validation="" rows="6" class="form-control "
                                  name="recruitment_step4_desc[]"
                                  id="summernote1{{$language->title}}"
                                  placeholder="الخطوة الرابعة    ">
                                                         {{$settings->getTranslation('recruitment_step4_desc', $language->title)}}
                                                     </textarea>
                    </div>
                </div>
            @endforeach

            @foreach($languages as $index=>$language)
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                    <div class="form-group">
                        <label
                            for="summernote1{{$language->title}}">الخطوة
                            الخامسة </label>
                        <textarea data-validation="" rows="6" class="form-control "
                                  name="recruitment_step5_desc[]"
                                  id="summernote1{{$language->title}}"
                                  placeholder="الخطوة الخامسة    ">
                                                         {{$settings->getTranslation('recruitment_step5_desc', $language->title)}}
                                                     </textarea>
                    </div>
                </div>
            @endforeach


        </div>
        <div class="row mt-4">
            <div class="col-sm-6">

            </div> <!-- end col -->
            @if(checkPermission(4))
            <div class="col-sm-6">
                <div class="text-end">
                    <button form="Form_step" type="submit" class="btn btn-success">
                        <i class="mdi mdi-content-save me-1"></i> حفظ
                    </button>
                </div>
            </div> <!-- end col -->
            @endif
        </div> <!-- end row -->
    </form>
</div>
