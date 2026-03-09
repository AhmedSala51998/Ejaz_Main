<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\ApiAuthController;
use App\Http\Controllers\API\ApiPhoneVerificationController;
use App\Http\Controllers\API\ApiUserFirebaseTokenController;
use App\Http\Controllers\API\ApiContactController;
use App\Http\Controllers\API\ApiSettingController;
use App\Http\Controllers\API\ApiSliderController;
use App\Http\Controllers\API\ApiNationalityController;
use App\Http\Controllers\API\ApiSponsorController;
use App\Http\Controllers\API\ApiReligionController;
use App\Http\Controllers\API\ApiJobTitleController;
use App\Http\Controllers\API\ApiJobTypeController;
use App\Http\Controllers\API\ApiMaidController;
use App\Http\Controllers\API\ApiPackageController;
use App\Http\Controllers\API\ApiCustomerController;
use App\Http\Controllers\API\ApiOrderController;
use App\Http\Controllers\API\ApiNotificationController;
use App\Http\Controllers\API\ApiHomeController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'lang'
], function () {

    Route::group(['prefix' => 'auth'], function () {

        Route::post('/register', [ApiPhoneVerificationController::class,'store']);
        Route::post('/confirm-code', [ApiPhoneVerificationController::class,'confirm_code']);
        Route::post('/reset-password', [ApiPhoneVerificationController::class,'reset_password'])->middleware('auth:api');

        Route::post('/login', [ApiAuthController::class,'login']);
        Route::post('/logout', [ApiAuthController::class,'logout']);
        Route::post('/refresh', [ApiAuthController::class,'refresh']);
        Route::post('/update/profile', [ApiAuthController::class,'update']);
        Route::get('/profile', [ApiAuthController::class,'me']);
        Route::delete('/delete/profile', [ApiAuthController::class,'delete']);
        Route::post('/update/password', [ApiAuthController::class,'update_password']);
        Route::post('/firebase/update', [ApiUserFirebaseTokenController::class,'store'])->middleware('auth:api');

    });


    //--------------------------------stores------------------------

    Route::group([
        'middleware' => 'auth:api',
        'prefix' => 'user'
    ], function () {

        Route::apiResource('contact-us', ApiContactController::class);
        Route::apiResource('settings', ApiSettingController::class);
        Route::apiResource('sliders', ApiSliderController::class);
        Route::apiResource('nationalities', ApiNationalityController::class);
        Route::apiResource('sponsors', ApiSponsorController::class);
        Route::apiResource('religions', ApiReligionController::class);
        Route::apiResource('jobs', ApiJobTitleController::class);
        Route::apiResource('job-types', ApiJobTypeController::class);
        Route::apiResource('maids', ApiMaidController::class);

        Route::get('search-maids', [ApiMaidController::class,'search']);

        Route::apiResource('packages', ApiPackageController::class);
        Route::apiResource('customers', ApiCustomerController::class);
        Route::apiResource('orders', ApiOrderController::class);
        Route::apiResource('notifications', ApiNotificationController::class);

    });

});

Route::group([], function () {

    Route::group(['prefix' => 'users'], function () {

        Route::post('login', [ApiAuthController::class,'login']);
        Route::post('register/client', [ApiAuthController::class,'registerClient']);
        Route::post('register/supplier', [ApiAuthController::class,'registerSupplier']);
        Route::post('register/contractor', [ApiAuthController::class,'registerContractor']);

    });

    Route::group(['prefix' => 'home'], function () {

        Route::post('workers', [ApiHomeController::class,'workers']);
        Route::get('recruitmentContract', [ApiHomeController::class,'RecruitmentContractFront']);
        Route::get('age-range', [ApiHomeController::class,'ageRange']);

        Route::get('services', function (Request $request) {
            return response()->json([
                'data' => ['services' => ['transport','admission','rental']],
                'msg' => null,
                'code' => 200
            ], 200);
        });

        Route::post('transfer_service', [ApiHomeController::class,'transferService']);
        Route::post('send_code', [ApiHomeController::class,'send_code']);
        Route::post('verfiy_phone', [ApiHomeController::class,'verfiy_phone']);
        Route::post('send_code_phone_exit', [ApiHomeController::class,'send_code_phone_exit']);
        Route::post('contact_us_action', [ApiHomeController::class,'contact_us_action']);
        Route::post('verify_code', [ApiHomeController::class,'verify_code']);
        Route::post('complete_request/{id}', [ApiHomeController::class,'completeTheRecruitmentRequest_2']);
        Route::post('get_client_orders', [ApiHomeController::class,'getClientOrders']);
        Route::get('get_request_info', [ApiHomeController::class,'getRequestInfo']);

        Route::get('/', [ApiHomeController::class,'index']);
        Route::get('sliders', [ApiHomeController::class,'sliders']);
        Route::get('news', [ApiHomeController::class,'news']);
        Route::get('categories/{level}', [ApiHomeController::class,'categories']);
        Route::get('products', [ApiHomeController::class,'products']);
        Route::get('products/show', [ApiHomeController::class,'oneProduct']);

    });

});
