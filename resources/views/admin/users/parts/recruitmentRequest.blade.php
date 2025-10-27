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
    طلب استقدام
@endsection


@section('content')

    <form action="" method="GET" class="row align-items-center align-items-md-end">
        <div class="row g-2">
    <div class="col-md-3">
        <div class='input-group mb-3'>
            <select class="form-control " name="nationality_id" id="nationality_id">
                <option value="" selected>الجنسية</option>
                @foreach($nationalities as $nationalitie)
                    <option value="{{$nationalitie->id}}" @isset($country_id)@if( $country_id == $nationalitie->id) selected   @endif @endisset > {{$nationalitie->title}} </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <input type="text" class="form-control" id="passport_key" name="passport_key" @isset($passport_key) value="{{ $passport_key }}" @endisset placeholder="رقم جواز السفر">
    </div>


    <div class="col-md-3">
        <button id="SearchWorkerButton" class="btn btn-info">بحث</button>
        @if(count($_GET)>0 )
            <a id="cancel_request" href="{{route('admins.selectOrderForUser',$user->id)}}" class="btn btn-danger">
                إلغاء البحث
            </a>
        @endif

    </div>
        </div>
    </form>
    <div class="row g-2">


        @foreach($cvs as $cv)
            <div class="col-md-4">
                <div class="workerCv card p-2 rounded-3">
                    <a href="{{route('admins.selectCustomerServiceForCv',[$cv->id,$user->id])}}" class="d-block">
                        <img src="{{get_file($cv->new_image)}}" style=" height: 300px; max-width: 100% ; object-fit: cover" alt="">
                    </a>
                    <ul class="info p-0 row g-2">
                        <li style="display: flex; align-items: center" class="col-6 p-2">
                            <h6 class="mb-0 "> الجنسية : </h6>
                            <p class="mb-0 mx-2">{{$cv->nationalitie->title??''}} </p>
                        </li>
                        <li style="display: flex; align-items: center" class="col-6 p-2">
                            <h6 class="mb-0 "> المهنة : </h6>
                            <p class="mb-0 mx-2"> {{$cv->job->title??''}}</p>
                        </li>
                        <li style="display: flex; align-items: center" class="col-6 p-2">
                            <h6 class="mb-0 "> الديانة : </h6>
                            <p class="mb-0 mx-2"> {{$cv->religion->title??''}} </p>
                        </li>
                        <li style="display: flex; align-items: center" class="col-6 p-2">
                            <h6 class="mb-0 "> الخبرة العملية : </h6>
                            <p class="mb-0 mx-2"> {{$cv->high_degree}} </p>
                        </li>
                        <li style="display: flex; align-items: center" class="col-6 p-2">
                            <h6 class="mb-0 "> الحالة الاجتماعية : </h6>
                            <p class="mb-0 mx-2"> {{$cv->social_type->title??''}} </p>
                        </li>
                        <li style="display: flex; align-items: center" class="col-6 p-2">
                            <h6 class="mb-0 "> راتب العاملة : </h6>
                            <p class="mb-0 mx-2"> {{$cv->salary??''}} </p>
                        </li>
                        <li style="display: flex; align-items: center" class="col-6 p-2">
                            <h6 class="mb-0 "> سعر الاستقدام : </h6>
                            <p class="mb-0 mx-2"> {{$cv->nationalitie->price??''}} ريال </p>
                        </li>
                        <li style="display: flex; align-items: center" class="col-6 p-2">
                            <h6 class="mb-0 "> رقم الجواز : </h6>
                            <p class="mb-0 mx-2"> {{$cv->passport_number??''}} </p>
                        </li>
                    </ul>
                    <a href="{{route('admins.selectCustomerServiceForCv',[$cv->id,$user->id])}}" class="btn btn-success"> طلب استقدام </a>

                </div>
            </div>
        @endforeach

    </div>

@endsection
<script>
    $(document).on('click', '#SearchWorkerButton', function (e) {
        e.preventDefault();


        nationality = $("#nationality").val();
        url = link_only  + "&nationality=" + nationality
        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function () {
                $("#hereWillDisplayAllWorker").html(loader_html)
                $('#SearchWorkerButton').attr('disabled', true)
                $('#SearchWorkerButton').html(`<i class='fa fa-spinner fa-spin '></i>`)
            },
            complete: function () {

            },
            success: function (data) {

                window.setTimeout(function () {
                    $("#hereWillDisplayAllWorker").html(data.html)
                    $('#SearchWorkerButton').attr('disabled', false)
                    $('#SearchWorkerButton').html(`  <span></span> {{__('frontend.Apply')}}`)
                    console.log(data.last_page, data.current_page)
                    if (data.last_page == data.current_page) {
                        document.getElementById("load_more_button").remove();
                    } else {
                        $("#buttonOfFilter").html(` <button id="load_more_button" class="animatedLink" type="button">
                            {{__('frontend.load more')}}
                        <i class="fa-regular fa-left-long ms-2"><span></span></i>

                        </button>`)
                    }

                }, 2000);

            },
            error: function (data) {
                $('#SearchWorkerButton').attr('disabled', false)
                $('#SearchWorkerButton').html(`  <span></span> {{__('frontend.Apply')}}`)

            }, //end error method

            cache: false,
            contentType: false,
            processData: false
        }); //end ajax
    }); //end submit


</script>
