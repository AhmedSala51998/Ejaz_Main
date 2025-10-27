@extends('admin.layouts.layout')
@section('styles')

    <style>
        .dropify-font-upload:before,
        .dropify-wrapper .dropify-message span.file-icon:before {
            content: "\f382";
            font-weight: 100;
            color: #000;
            font-size: 26px;
        }

        .dropify-wrapper .dropify-message p {
            text-align: center;
            font-size: 15px;
        }

    </style>

@endsection

@section('page-title')
    اضافة عميل
@endsection


@section('content')

<form id="my-form" method="POST" >
    @csrf
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 my-12">
            <label for="header_logo" class="col-md-2 col-form-label"> اللوجو
                </label>
                <input type="file"
                       data-default-file=""
                       class="form-control dropify" id="header_logo" name="logo"
                       placeholder="اللوجو (الرئيسى)">
        </div>


        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 my-4">
            <div class="form-group">
                <label for="biography_number">رقم الهاتف </label>
                <input data-validation="required" required type="number" class="form-control"
                       value=""
                       id="biography_number" name="phone" placeholder="">
            </div>
        </div>


        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 my-4">
            <div class="form-group">
                <label for="salary">الاسم </label>
                <input data-validation="required" required type="text" class="form-control"
                       value=""
                       id="salary" name="name" placeholder="">
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 my-4">
            <div class="form-group">
                <label for="biography_number">البريد الالكتروني </label>
                <input  type="email" class="form-control"
                       value=""
                       id="biography_number" name="email" placeholder="">
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 my-4">
            <label for="biography_number">المدينة </label>

        <select data-validation="required"  name="city_id" required class="form-select" aria-label="Default select example">
            @foreach(\App\Models\City::get() as $city)
            <option value="{{$city->id}}">{{$city->title}}</option>
            @endforeach
        </select>

        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 my-4">
            <div class="form-group">
                <label for="biography_number">الباسورد </label>
                <input data-validation="required" required type="password" class="form-control"
                       value=""
                       id="biography_number" name="password" placeholder="">
            </div>
        </div>

    </div>

    <button type="submit" class="btn btn-success">حفظ</button>
</form>


@endsection


@section('js')

    <script>
        $('.dropify').dropify();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>


    $('#my-form').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        console.log(formData);
        $.ajax({
            type: 'POST',
            url: "{{route('users.store')}}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (res) {

                if (res['status'] == true) {

                    swal(" اضافة مستخدم ", "تمت الاضافة بنجاح", "success", {button: "حسناً",});
                    setTimeout(success, 3000);

                } else if (res['status'] == 'errors') {
                    swal("  ", "يرجي التاكد من البانات والتاكد من الايميل ورقم الهاتف", "error", {button: "حسناً",});

                }
                else if(res['status']=='notmatch'){
                    swal("  ", "لابد ان يكون رقم الهاتف 10 او 9 ارقام ويبداء ب 5 او 05", "error", {button: "حسناً",});

                }
                else {
                    swal("  ", "يرجي المحاولة ف وقت لاحق", "error", {button: "حسناً",});


                }
            },
            error: function (data) {
                swal("  ", "يرجي المحاولة ف وقت لاحق", "error", {button: "حسناً",});


            }
        });
    }));

    function success(){
        window.location="{{route('users.index')}}";
    }


</script>




@endsection
