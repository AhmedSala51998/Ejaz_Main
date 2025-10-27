<div>
    <h4 class="card-title">المعلومات الرئيسية</h4>
    <form id="Form_main" method="post" action="{{route('settings.update',$settings->id)}}">
        @csrf
        @method('PUT')
        <input type="hidden" name="form_type" value="main">
        <div class="row ">

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">

                        <label
                            for="{{$settings->title}}">اسم الموقع</label>
                        <input data-validation="required" type="text"
                               class="form-control"
                               value="{{$settings->title}}"
                               id="address1" name="address1"
                               placeholder="اسم الموقع">
                    </div>

                </div>



                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-2">
                    <div class="form-group">
                        <label for=" {{$settings->footer_desc}}">
                            نبذه بالفوتر
                        </label>
                        <textarea data-validation="" rows="6" class="form-control "
                                  name="footer_desc"
                                  id="footer_desc"
                                  placeholder="{{$settings->footer_desc}}">
                                                      {{$settings->footer_desc}}
                                                     </textarea>
                    </div>
                </div>



                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label
                            for="{{$settings->address1}}">عنوان الفرع الاول </label>
                        <input data-validation="required" type="text"
                               class="form-control"
                               value="{{$settings->address1}}"
                               id="address1" name="address1"
                               placeholder="العنوان">
                    </div>
                </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label
                        for="{{$settings->address2}}">عنوان الفرع الثاني </label>
                    <input data-validation="required" type="text"
                           class="form-control"
                           value="{{$settings->address2}}"
                           id="address2" name="address2"
                           placeholder="العنوان">
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-6">

            </div> <!-- end col -->
            @if(checkPermission(4))

            <div class="col-sm-6">
                <div class="text-end">
                    <button form="Form_main" type="submit" class="btn btn-success">
                        <i class="mdi mdi-content-save me-1"></i> حفظ
                    </button>
                </div>
            </div> <!-- end col -->
            @endif
        </div> <!-- end row -->
    </form>
</div>
