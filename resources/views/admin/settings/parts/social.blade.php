<div>

    <h4 class="card-title">مواقع التواصل الإجتماعى</h4>

    <form id="Form_social" method="post" action="{{route('settings.update',$settings->id)}}">
        @csrf
        @method('PUT')
        <input type="hidden" name="form_type" value="social">
        <div class="form-group row mb-4">
            <label for="facebook" class="col-md-2 col-form-label">رابط الفيس بوك</label>
            <div class="col-md-10">

                <input data-validation="required" type="text"
                       value="{{$settings->facebook}}" class="form-control"
                       id="facebook"
                       name="facebook" placeholder="رابط الفيس بوك">

            </div>
        </div>


        <div class="form-group row mb-4">
            <label for="twitter" class="col-md-2 col-form-label">رابط التويتر</label>
            <div class="col-md-10">

                <input data-validation="required" type="text" class="form-control"
                       value="{{$settings->twitter}}" id="twitter" name="twitter"
                       placeholder=" رابط التويتر">

            </div>
        </div>


        <div class="form-group row mb-4">
            <label for="instagram" class="col-md-2 col-form-label">رابط
                الانستجرام</label>
            <div class="col-md-10">

                <input data-validation="required" type="text" class="form-control"
                       value="{{$settings->instagram}}" id="instagram" name="instagram"
                       placeholder=" رابط الانستجرام">

            </div>
        </div>


        <div class="form-group row mb-4">
            <label for="linkedin" class="col-md-2 col-form-label">رابط اللينكدان</label>
            <div class="col-md-10">

                <input data-validation="required" type="text" class="form-control"
                       value="{{$settings->linkedin}}" id="linkedin" name="linkedin"
                       placeholder=" رابط اللينكدان">

            </div>
        </div>


        <div class="form-group row mb-4">
            <label for="telegram" class="col-md-2 col-form-label">رابط التليجرام</label>
            <div class="col-md-10">

                <input data-validation="required" type="text" class="form-control"
                       value="{{$settings->telegram}}" id="telegram" name="telegram"
                       placeholder=" رابط التليجرام">

            </div>
        </div>


        <div class="form-group row mb-4">
            <label for="youtube" class="col-md-2 col-form-label"> رابط اليوتيوب</label>
            <div class="col-md-10">

                <input data-validation="required" type="text" class="form-control"
                       id="youtube" value="{{$settings->youtube}}" name="youtube"
                       placeholder=" رابط اليوتيوب">

            </div>
        </div>


        <div class="form-group row mb-4">
            <label for="google_plus" class="col-md-2 col-form-label">رابط جوجل
                بلس</label>
            <div class="col-md-10">

                <input data-validation="required" type="text" class="form-control"
                       id="google_plus" value="{{$settings->google_plus}}"
                       name="google_plus" placeholder=" رابط جوجل بلس">

            </div>
        </div>


        <div class="form-group row mb-4">
            <label for="snapchat_ghost" class="col-md-2 col-form-label">رابط اسناب
                شات</label>
            <div class="col-md-10">

                <input data-validation="required" type="text" class="form-control"
                       id="snapchat_ghost" value="{{$settings->snapchat_ghost}}"
                       name="snapchat_ghost" placeholder=" رابط اسناب شات">

            </div>
        </div>


        <div class="form-group row mb-4">
            <label for="whatsapp" class="col-md-2 col-form-label">رابط الوتس اب</label>
            <div class="col-md-10">

                <input data-validation="required" type="text" class="form-control"
                       id="whatsapp" value="{{$settings->whatsapp}}" name="whatsapp"
                       placeholder=" رابط الوتس اب">

            </div>
        </div>

        <div class="row mt-4">
            <div class="col-sm-6">

            </div> <!-- end col -->
            @if(checkPermission(4))

            <div class="col-sm-6">
                <div class="text-end">
                    <button form="Form_social" type="submit" class="btn btn-success">
                        <i class="mdi mdi-content-save me-1"></i> حفظ
                    </button>
                </div>
            </div> <!-- end col -->
            @endif
        </div> <!-- end row -->
    </form>
</div>
