<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'lang'
], function () {

    Route::group(['prefix' => 'auth'], function () {

        Route::post('/register', 'API\ApiPhoneVerificationController@store');
        Route::post('/forgot-password', 'API\ApiPhoneVerificationController@forgot_password'); //New
        Route::post('/confirm-code', 'API\ApiPhoneVerificationController@confirm_code');
        Route::post('/reset-password', 'API\ApiPhoneVerificationController@reset_password')->middleware('auth:api');

        Route::post('/login', 'API\ApiAuthController@login');
        Route::post('/logout', 'API\ApiAuthController@logout');
        Route::post('/refresh', 'API\ApiAuthController@refresh');
        Route::post('/update/profile', 'API\ApiAuthController@update');
        Route::get('/profile', 'API\ApiAuthController@me');
        Route::delete('/delete/profile', 'API\ApiAuthController@delete');
        Route::post('/update/password', 'API\ApiAuthController@update_password');
        Route::post('/firebase/update', 'API\ApiUserFirebaseTokenController@store')->middleware('auth:api');

    });


    Route::group([
        'prefix' => 'user'
    ], function () {

        Route::apiResource('contact-us', 'API\ApiContactController');
        Route::apiResource('settings', 'API\ApiSettingController');
        Route::apiResource('sliders', 'API\ApiSliderController');
        Route::apiResource('nationalities', 'API\ApiNationalityController');
        Route::apiResource('sponsors', 'API\ApiSponsorController');
        Route::apiResource('religions', 'API\ApiReligionController');
        Route::apiResource('jobs', 'API\ApiJobTitleController');
        Route::apiResource('job-types', 'API\ApiJobTypeController');
        Route::apiResource('maids', 'API\ApiMaidController');

        Route::get('search-maids', 'API\ApiMaidController@search');

        Route::apiResource('packages', 'API\ApiPackageController');

    });


    Route::group([
        'middleware' => 'auth:api',
        'prefix' => 'user'
    ], function () {

        Route::apiResource('customers', 'API\ApiCustomerController');
        Route::apiResource('orders', 'API\ApiOrderController');
        Route::apiResource('notifications', 'API\ApiNotificationController');

    });

});


Route::group([], function () {

    Route::group(['prefix' => 'users'], function () {

        Route::post('login', 'API\ApiAuthController@login');
        Route::post('register/client', 'API\ApiAuthController@registerClient');
        Route::post('register/supplier', 'API\ApiAuthController@registerSupplier');
        Route::post('register/contractor', 'API\ApiAuthController@registerContractor');

    });

    Route::group(['prefix' => 'home'], function () {

        Route::post('workers', 'API\ApiHomeController@workers');
        Route::get('recruitmentContract', 'API\ApiHomeController@RecruitmentContractFront');
        Route::get('age-range', 'API\ApiHomeController@ageRange');

        Route::get('services', function (Request $request) {
            return response()->json([
                'data' => ['services' => ['transport','admission','rental']],
                'msg' => null,
                'code' => 200
            ], 200);
        });

        Route::post('transfer_service', 'API\ApiHomeController@transferService');
        Route::post('send_code', 'API\ApiHomeController@send_code');
        Route::post('verfiy_phone', 'API\ApiHomeController@verfiy_phone');
        Route::post('send_code_phone_exit', 'API\ApiHomeController@send_code_phone_exit');
        Route::post('contact_us_action', 'API\ApiHomeController@contact_us_action');
        Route::post('verify_code', 'API\ApiHomeController@verify_code');
        Route::post('complete_request/{id}', 'API\ApiHomeController@completeTheRecruitmentRequest_2');
        Route::post('get_client_orders', 'API\ApiHomeController@getClientOrders');
        Route::get('get_request_info', 'API\ApiHomeController@getRequestInfo');

        Route::get('/', 'API\ApiHomeController@index');
        Route::get('sliders', 'API\ApiHomeController@sliders');
        Route::get('news', 'API\ApiHomeController@news');
        Route::get('categories/{level}', 'API\ApiHomeController@categories');
        Route::get('products', 'API\ApiHomeController@products');
        Route::get('products/show', 'API\ApiHomeController@oneProduct');

    });

});
