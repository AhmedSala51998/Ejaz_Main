@extends('frontend.layouts.layout')

@section('title')
    {{__('frontend.Expire Page')}}
@endsection

@section('styles')
    <style></style>
@endsection


@section('content')
    <section class="account">
        <div class="container">
            <div class="formCard row">
                <div class="circleBlur"></div>
                <div class="circleBlur2"></div>
                <div class="col-md-12 p-2 text-center">
                    <img class="loginImg" style="height: 120px!important;width: 120px!important;" src="{{asset('frontend/img/expired.png')}}" alt="">
                    <h6 class="text-center mt-4 mb-4">{{__('frontend.The page has expired')}}</h6>
                </div>
            </div>
        </div>

    </section>
@endsection

@section('js')


@endsection
