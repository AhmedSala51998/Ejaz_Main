<div>
    <h4 class="card-title">اللوجو</h4>
    <form id="Form_logo" method="post" action="{{route('settings.update',$settings->id)}}">
        @csrf
        @method('PUT')
        <input type="hidden" name="form_type" value="logo">
        <div class="form-group row mb-4">
            <label for="header_logo" class="col-md-2 col-form-label"> اللوجو
                (الرئيسى)</label>
            <div class="col-md-10">
                <input type="file"
                       data-default-file="{{get_file($settings->header_logo)}}"
                       class="form-control dropify" id="header_logo" name="header_logo"
                       placeholder="اللوجو (الرئيسى)">
            </div>
        </div>

        <div class="form-group row mb-4">
            <label for="footer_logo" class="col-md-2 col-form-label">لوجو
                (الفوتر)</label>
            <div class="col-md-10">
                <input type="file"
                       data-default-file="{{get_file($settings->footer_logo)}}"
                       class="form-control dropify" id="footer_logo" name="footer_logo"
                       placeholder="لوجو (الفوتر)">

            </div>
        </div>

        <div class="form-group row mb-4">
            <label for="header_logo" class="col-md-2 col-form-label"> اللوجو
                (الاضافى)</label>
            <div class="col-md-10">
                <input type="file" data-default-file="{{get_file($settings->tap_logo)}}"
                       class="form-control dropify" id="tap_logo" name="tap_logo"
                       placeholder="اللوجو (الاضافى)">

            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-6">

            </div> <!-- end col -->
            @if(checkPermission(4))

            <div class="col-sm-6">
                <div class="text-end">
                    <button form="Form_logo" type="submit" class="btn btn-success">
                        <i class="mdi mdi-content-save me-1"></i> حفظ
                    </button>
                </div>
            </div> <!-- end col -->
            @endif
        </div> <!-- end row -->
    </form>
</div>
