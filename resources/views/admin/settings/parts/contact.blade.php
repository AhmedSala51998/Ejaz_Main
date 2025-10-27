<div>

    <h4 class="card-title">معلومات التواصل</h4>

    <form id="Form_contact" method="post" action="{{route('settings.update',$settings->id)}}">
        @csrf
        @method('PUT')
        <input type="hidden" name="form_type" value="contact">
        <div class="form-group row mb-4">
            <label for="email1" class="col-md-2 col-form-label">البريد الإلكترونى
                (الرئيسى)</label>
            <div class="col-md-10">
                <input data-validation="required,email" name="email1" type="email"
                       value="{{$settings->email1}}" class="form-control" id="email1"
                       placeholder="">
            </div>
        </div>

        <div class="form-group row mb-4">
            <label for="email2" class="col-md-2 col-form-label">البريد الإلكترونى
                (الإضافى)</label>
            <div class="col-md-10">
                <input data-validation="required,email" name="email2" type="email"
                       value="{{$settings->email2}}" class="form-control" id="email2"
                       placeholder="">
            </div>
        </div>
        <div class="form-group row mb-4">
            <label for="email2" class="col-md-2 col-form-label">رقم الواتساب
            </label>
            <div class="col-md-10">
                <input data-validation="optional" name="whatsappNumber" type="tel"
                       value="{{$settings->whatsappNumber}}" class="form-control" id="phone2"
                       placeholder="">
            </div>
        </div>
        <div class="form-group row mb-4">
            <label for="email2" class="col-md-2 col-form-label">رقم الاتصال الرئيسي
            </label>
            <div class="col-md-10">
                <input data-validation="optional" name="callNumber" type="tel"
                       value="{{$settings->callNumber}}" class="form-control" id="phone2"
                       placeholder="">
            </div>
        </div>

        <div class="form-group row mb-4">
            <label for="email2" class="col-md-2 col-form-label"> رقم الاتصال المبيعات (١)
            </label>
            <div class="col-md-10">
                <input data-validation="optional" name="phone1" type="tel"
                       value="{{$settings->phone1}}" class="form-control" id="phone1"
                       placeholder="">
            </div>
        </div>
        <div class="form-group row mb-4">
            <label for="email2" class="col-md-2 col-form-label"> رقم الاتصال المبيعات (٢)
            </label>
            <div class="col-md-10">
                <input data-validation="optional" name="phone2" type="tel"
                       value="{{$settings->phone2}}" class="form-control" id="phone2"
                       placeholder="">
            </div>
        </div>
        <div class="form-group row mb-4">
            <label for="email2" class="col-md-2 col-form-label"> رقم الاتصال المبيعات (٣)
            </label>
            <div class="col-md-10">
                <input data-validation="optional" name="phone3" type="tel"
                       value="{{$settings->phone3}}" class="form-control" id="phone3"
                       placeholder="">
            </div>
        </div>
        <div class="form-group row mb-4">
            <label for="email2" class="col-md-2 col-form-label"> رقم الاتصال المبيعات (٤)
            </label>
            <div class="col-md-10">
                <input data-validation="optional" name="phone4" type="tel"
                       value="{{$settings->phone4}}" class="form-control" id="phone4"
                       placeholder="">
            </div>
        </div>



        <div class="row mt-4">
            <div class="col-sm-6">

            </div> <!-- end col -->
            @if(checkPermission(4))

            <div class="col-sm-6">
                <div class="text-end">
                    <button form="Form_contact" type="submit" class="btn btn-success">
                        <i class="mdi mdi-content-save me-1"></i> حفظ
                    </button>
                </div>
            </div> <!-- end col -->
                @endif
        </div> <!-- end row -->
    </form>

</div>
