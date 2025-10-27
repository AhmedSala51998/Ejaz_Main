<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(
    [
        'middleware' => 'lang'
    ],
    function () {
        Route::group(['prefix' => 'auth', 'namespace' => 'Api'], function ($router) {
            Route::post('/register', 'ApiPhoneVerificationController@store');
            Route::post('/confirm-code', 'ApiPhoneVerificationController@confirm_code');
            Route::post('/reset-password', 'ApiPhoneVerificationController@reset_password')->middleware('auth:api');

            // Route::post('/register', 'ApiAuthController@register');
            Route::post('/login', 'ApiAuthController@login');
            Route::post('/logout', 'ApiAuthController@logout');
            Route::post('/refresh', 'ApiAuthController@refresh');
            Route::post('/update/profile', 'ApiAuthController@update');
            Route::get('/profile', 'ApiAuthController@me');
            Route::delete('/delete/profile', 'ApiAuthController@delete');
            Route::post('/update/password', 'ApiAuthController@update_password');
            Route::post('/firebase/update', 'ApiUserFirebaseTokenController@store')->middleware('auth:api');

            // Route::resource('address', ApiUserAddressController::class)->middleware('auth:api');
        });

        //  //--------------------------------stores------------------------
        Route::group(['middleware' => 'auth:api', 'namespace' => 'Api', 'prefix' => 'user'], function ($router) {
            Route::apiResource('contact-us', ApiContactController::class);
            Route::apiResource('settings', ApiSettingController::class);
            Route::apiResource('sliders', ApiSliderController::class);
            Route::apiResource('nationalities', ApiNationalityController::class);
            Route::apiResource('sponsors', ApiSponsorController::class);
            Route::apiResource('religions', ApiReligionController::class);
            Route::apiResource('jobs', ApiJobTitleController::class);
            Route::apiResource('job-types', ApiJobTypeController::class);
            Route::apiResource('maids', ApiMaidController::class);
            Route::get('search-maids', [App\Http\Controllers\Api\ApiMaidController::class, 'search']);
            Route::apiResource('packages', ApiPackageController::class);
            Route::apiResource('customers', ApiCustomerController::class);
            Route::apiResource('orders', ApiOrderController::class);
            Route::apiResource('notifications', ApiNotificationController::class);
            // Route::apiResource('complaints', ApiComplaintController::class);
            // Route::apiResource('return-requests', ApiReturnRequestController::class);
        });
        //--------------------------------------------------------
    }
);
Route::group(['namespace' => 'Api'], function () {

    Route::group(['prefix' => 'users'], function () {
        Route::post('login', 'ApiAuthController@login'); // users/login
        Route::post('register/client', 'ApiAuthController@registerClient'); // users/register/client
        Route::post('register/supplier', 'ApiAuthController@registerSupplier'); // users/register/supplier
        Route::post('register/contractor', 'ApiAuthController@registerContractor'); // users/register/contractor
    });

    // Route::group(['prefix' => 'settings'], function () {
    //     Route::get('cities', 'ApiSettingsController@cities'); // settings/cities
    //     Route::get('categories', 'ApiSettingsController@categories'); // settings/categories
    // });

    Route::group(['prefix' => 'home'], function () {
        Route::post('workers', 'ApiHomeController@workers'); // home/products
        Route::get('recruitmentContract', 'ApiHomeController@RecruitmentContractFront'); // home/products
        Route::get('age-range', 'ApiHomeController@ageRange'); // home/ageRange
        Route::get('services', function (Request $request) {
        return response()->json(['data' =>  ['services' => ['transport','admission','rental'] ], 'msg' => null, 'code' => 200], 200);
        });
        

        Route::post('transfer_service', 'ApiHomeController@transferService'); // home/products
        Route::post('send_code', 'ApiHomeController@send_code'); // home/products
        Route::post('verfiy_phone', 'ApiHomeController@verfiy_phone'); // home/products


        Route::post('send_code_phone_exit', 'ApiHomeController@send_code_phone_exit'); // home/products
        Route::post('contact_us_action', 'ApiHomeController@contact_us_action'); // home/products



        Route::post('verify_code', 'ApiHomeController@verify_code'); // home/products
        Route::post('complete_request/{id}', 'ApiHomeController@completeTheRecruitmentRequest_2'); // home/products



        Route::post('get_client_orders', 'ApiHomeController@getClientOrders'); // home/products
        Route::get('get_request_info', 'ApiHomeController@getRequestInfo'); // settings/categories


        Route::get('/', 'ApiHomeController@index'); // home
        Route::get('sliders', 'ApiHomeController@sliders'); // home/sliders
        Route::get('news', 'ApiHomeController@news'); // home/news
        Route::get('categories/{level}', 'ApiHomeController@categories'); // home/categories/
        Route::get('products', 'ApiHomeController@products'); // home/products
        Route::get('products/show', 'ApiHomeController@oneProduct'); // home/products/
    });


    // Route::group(['prefix' => 'supplires'], function () {
    //     Route::get('/', 'ApiSupplireController@index'); // supplires
    // });

    // Route::group(['prefix' => 'contractors'], function () {
    //     Route::get('/', 'ApiContractorController@index'); // supplires
    //     Route::get('/show', 'ApiContractorController@show'); // supplires
    // });


    // //Route::middleware('auth:api')->group(function () {

    //     Route::group(['prefix' => 'users'], function () {
    //         Route::post('logout', 'ApiAuthController@logout'); // users/logout
    //     });



    //});


});
