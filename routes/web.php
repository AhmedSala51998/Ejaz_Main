<?php
use App\Http\Controllers\Frontend\CvDesignController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function() {

    #cvDesign

    // Route::get('cvs/{id}',[\App\Http\Controllers\Frontend\Cvs\CvDesignController::class,'index'])->name('frontend.cvDesign');




    Route::get('changeLangFront',function (\Illuminate\Http\Request $request){
        $lang = $request->lang;
        $url = $request->url;
        app()->setLocale($lang);
        session()->put('locale', $lang);
        \LaravelLocalization::setLocale($lang);
        $url = \LaravelLocalization::getLocalizedURL(app()->getLocale(), \URL::previous());

        return redirect($url);
    })->name('changeLangFront');



    ### worker

    Route::get('convert-pdf-to-image', [\App\Http\Controllers\ImageController::class, 'index'])->name('form');

    Route::post('/detect-location', [\App\Http\Controllers\Frontend\Home\HomeFrontController::class,'detectCityAjax'])->name('detect.location.ajax');

    Route::get('/',[\App\Http\Controllers\Frontend\Home\HomeFrontController::class,'index'])->name('home');
    Route::post('contact-us',[\App\Http\Controllers\Frontend\Home\HomeFrontController::class,'contact_us_action'])->name('front.contact_us_action');

    Route::post('/check-phone', function (Illuminate\Http\Request $request) {
        $phone = ltrim($request->phone, '0');
        if (\App\Models\User::where('phone', $phone)->exists()) {
            return response()->json(['exists' => true]);
        }
        return response()->json(['exists' => false]);
    });


    Route::get('register/{id?}',[\App\Http\Controllers\Frontend\Auth\RegisterFrontController::class,'register_view'])->name('register');
    Route::post('checkPhoneToSendOtp',[\App\Http\Controllers\Frontend\Auth\RegisterFrontController::class,'check_phone_to_send_otp'])->name('checkPhoneToSendOtp');
    Route::post('registerAction',[\App\Http\Controllers\Frontend\Auth\RegisterFrontController::class,'register_action'])->name('register_action');

    Route::get('login/{id?}',[\App\Http\Controllers\Frontend\Auth\LoginFrontController::class,'login_view'])
        ->name('auth.login');

    Route::post('loginAction',[\App\Http\Controllers\Frontend\Auth\LoginFrontController::class,'login_action'])
        ->name('auth.login_action');

    Route::get('/blog', [\App\Http\Controllers\Frontend\Blog\BlogController::class,'index'])->name('blog.index');
    Route::get('/blog/{slug}', [\App\Http\Controllers\Frontend\Blog\BlogController::class,'show'])->name('blog.show');


    Route::get('forget-password/{id?}',[\App\Http\Controllers\Frontend\Auth\ForgetPasswordFrontController::class,'forget_password_view'])->name('auth.forget_password_view');
    Route::post('forget-password-action',[\App\Http\Controllers\Frontend\Auth\ForgetPasswordFrontController::class,'forget_password_action'])->name('auth.forget_password_action');
    Route::get('forget-email-sent-successfully',[\App\Http\Controllers\Frontend\Auth\ForgetPasswordFrontController::class,'forget_password_email_successfully_sent'])->name('auth.forget-email-sent-successfully');

    Route::get('reset-password',[\App\Http\Controllers\Frontend\Auth\ResetPasswordFrontController::class,'reset_password_view'])->name('auth.reset_password_view');
    Route::post('reset-password-action',[\App\Http\Controllers\Frontend\Auth\ResetPasswordFrontController::class,'reset_password_action'])->name('auth.reset_password_action');

    Route::get('track-order',[\App\Http\Controllers\Frontend\Worker\WorkerFrontController::class,'track_order_view'])->name('track_order_view');
    Route::post('post-track-order',[\App\Http\Controllers\Frontend\Worker\WorkerFrontController::class,'track_order'])->name('track_order');
    Route::get('order_details/{id}',[\App\Http\Controllers\Frontend\Worker\WorkerFrontController::class,'order_details'])->name('order_details');


    Route::get('countries',[\App\Http\Controllers\Frontend\CountriesController::class,'index'])->name('frontend.show.countries');
    Route::get('ourStaff',[\App\Http\Controllers\Frontend\OurStaffController::class,'index'])->name('frontend.show.ourStaff');
    Route::get('about',[\App\Http\Controllers\Frontend\AbouUsController::class,'index'])->name('frontend.aboutUs');


    Route::get('completeTheRecruitmentRequest/{id}',[\App\Http\Controllers\Frontend\Worker\WorkerFrontController::class,'completeTheRecruitmentRequest'])->name('front.completeTheRecruitmentRequest');
    Route::post('/cancel-reservation/{id}', [\App\Http\Controllers\Admin\CRUD\AdminOrderController::class, 'autoCancelReservation']);

    Route::get('all-workers/{id?}',[\App\Http\Controllers\Frontend\Worker\WorkerFrontController::class,'showAllWorkers'])->whereNumber('id')->name('all-workers');
    Route::get('view-worker/{id}',[\App\Http\Controllers\Frontend\Worker\WorkerFrontController::class,'showWorker'])->name('showWorker');


    Route::get('custom-worker-request',[\App\Http\Controllers\Frontend\Worker\WorkerFrontController::class,'custom_worker_request_view'])
        ->name('custom-worker-request');

    Route::post('makeCustomRecruitmentRequest',[\App\Http\Controllers\Frontend\Worker\WorkerFrontController::class,'makeCustomRecruitmentRequest'])
        ->name('makeCustomRecruitmentRequest');


    Route::get('/sitemap.xml', function () {

        $blogsCount = \App\Models\Blog::where('status', 1)->count();
        $perFile = 1000;
        $totalFiles = ceil($blogsCount / $perFile);

        return response()
            ->view('sitemaps.index', compact('totalFiles'))
            ->header('Content-Type', 'application/xml');
    });

    Route::get('/sitemap-pages.xml', function () {

        $excludePrefixes = [
            'admin',
            'api',
            '_debugbar',
            '_ignition',
            'sanctum',
            'oauth',
            'profile',
            'logout',
            'login',
            'register',
            'password',
            'reset',
            'loadMore',
        ];

        $excludeExact = [
            'changeLangFront',
            'convert-pdf-to-image',
            'invoice-download',
            'get-nationality-id',
            'custom-worker-request',
            'recruitmentContract',
            'employmentArrival',
            'recruitmentPolicy',
            'musanedInitiative',
            'forget-email-sent-successfully',
            'supports',
            'musaned',
            'sitemap.xml',
            'sitemap-pages.xml',
        ];

        $routes = collect(\Route::getRoutes())
            ->filter(function ($route) use ($excludePrefixes, $excludeExact) {

                if (!in_array('GET', $route->methods())) {
                    return false;
                }

                $uri = $route->uri();

                if (str_contains($uri, '{')) {
                    return false;
                }

                foreach ($excludePrefixes as $prefix) {
                    if (str_starts_with($uri, $prefix)) {
                        return false;
                    }
                }

                if (in_array($uri, $excludeExact)) {
                    return false;
                }

                return true;
            })
            ->map(fn ($route) => url($route->uri()))
            ->unique()
            ->values();

        $routes->push(url('all-workers'));

        return response()
            ->view('sitemaps.pages', compact('routes'))
            ->header('Content-Type', 'application/xml');
    });

    Route::get('/sitemap-blogs-{page}.xml', function ($page) {

        $perFile = 1000;

        $blogs = \App\Models\Blog::where('status', 1)
            ->select('slug', 'updated_at')
            ->orderBy('id')
            ->skip(($page - 1) * $perFile)
            ->take($perFile)
            ->get();

        abort_if($blogs->isEmpty(), 404);

        return response()
            ->view('sitemaps.blogs', compact('blogs'))
            ->header('Content-Type', 'application/xml');
    });

    //profile
    Route::get('profile',[\App\Http\Controllers\Frontend\Profile\ProfileFrontController::class,'profile_view'])->name('auth.profile');

    //profile current orders
    Route::get('profileCurrentOrders',[\App\Http\Controllers\Frontend\Profile\ProfileFrontController::class,'get_profile_current_orders'])
        ->name('profile.CurrentOrders');
    Route::get('profileOrderDetails/{id}',[\App\Http\Controllers\Frontend\Profile\ProfileFrontController::class,'get_order_details'])
        ->name('profile.getOrder');
    Route::get('loadMoreCurrentOrders', [\App\Http\Controllers\Frontend\Profile\ProfileFrontController::class,'loadMoreCurrentOrders'])->name('front.loadMoreCurrentOrders');


    //profile orders history
    Route::get('profileOrdersHistory',[\App\Http\Controllers\Frontend\Profile\ProfileFrontController::class,'get_profile_orders_history'])
        ->name('profile.OrdersHistory');
    Route::get('loadMoreOrdersHistory', [\App\Http\Controllers\Frontend\Profile\ProfileFrontController::class,'loadMoreOrdersHistory'])->name('front.loadMoreOrdersHistory');



    //profile notification
    Route::get('profileNotifications',[\App\Http\Controllers\Frontend\Profile\ProfileFrontController::class,'get_profile_Notifications'])->name('profile.Notifications');
    Route::get('loadMoreNotifications',[\App\Http\Controllers\Frontend\Profile\ProfileFrontController::class,'loadMoreNotifications'])->name('profile.loadMoreNotifications');

    //profile editing
    Route::get('profileEditing',[\App\Http\Controllers\Frontend\Profile\ProfileFrontController::class,'get_edit_Profile_form'])->name('profile.editProfile');

    Route::post('changeBasicDataOFProfile',[\App\Http\Controllers\Frontend\Profile\ProfileFrontController::class,'changeBasicDataOFProfile'])->name('profile.changeBasicDataOFProfile');
    Route::post('changePasswordOFProfile',[\App\Http\Controllers\Frontend\Profile\ProfileFrontController::class,'changePasswordOFProfile'])->name('profile.changePasswordOFProfile');

    Route::post('checkPhoneToSendOtpInProfile',[\App\Http\Controllers\Frontend\Profile\ProfileFrontController::class,'check_phone_to_send_otp'])->name('checkPhoneToSendOtpTOChangePhone');
    Route::post('changePhoneInProfile',[\App\Http\Controllers\Frontend\Profile\ProfileFrontController::class,'save_new_phone'])->name('ChangePhoneProfile');




    ### worker

    Route::get('worker/{id}',[\App\Http\Controllers\Frontend\Worker\WorkerFrontController::class,'show'])->name('frontend.show.worker');



    ##recruitmentContract contract

    Route::get('recruitmentContract',[\App\Http\Controllers\Frontend\RecruitmentContract\RecruitmentContractFrontController::class,'index'])->name('frontend.recruitmentContract');

    #employment arrival


    Route::get('employmentArrival',[\App\Http\Controllers\Frontend\EmploymentArrival\EmploymentArrivalFrontController::class,'index'])->name('frontend.employmentArrival');


    #recruitment policy

    Route::get('recruitmentPolicy',[\App\Http\Controllers\Frontend\RecruitmentPolicy\RecruitmentPolicyFrontController::class,'index'])->name('frontend.recruitmentPolicy');

    #musanedinitiative

    Route::get('musanedInitiative',[\App\Http\Controllers\Frontend\MusanedInitiative\MusanedInitiativeFrontController::class,'index'])->name('frontend.musande');



    ### blogs

    Route::get('blogs',[\App\Http\Controllers\Frontend\Support\SupportFrontController::class,'blogs'])->name('frontend.blogs');

    ## support

    Route::get('supports',[\App\Http\Controllers\Frontend\Support\SupportFrontController::class,'supports'])->name('frontend.supports');


    ## contactUs Support

    Route::get('supports/contactUs',[\App\Http\Controllers\Frontend\Support\SupportFrontController::class,'contactUs'])->name('frontend.supports.contactUs');



    ## transfer service

    Route::get('transferService',[\App\Http\Controllers\Frontend\TransferServices\TransferServicesFrontController::class,'transferService'])->name('transferService');

    Route::get('services-single',[\App\Http\Controllers\Frontend\Rental\RentalController::class,'rental'])->name('services-single');


    ### pdf

    Route::get('/invoice-download',[\App\Http\Controllers\InvoiceController::class, 'downloadZip'])->name('frontend.invoice-download');

    Route::get('/get-nationality-id', function (Illuminate\Http\Request $request) {
        $name = $request->query('name');

        // ابحث في قاعدة البيانات مباشرة داخل عمود name->ar
        $record = DB::table('nationalities')
                    ->where('country_name', $name)
                    ->select('id')
                    ->first();

        return $record ? response()->json(['id' => $record->id]) : response()->json(['id' => null], 404);
    });


    #musaned

    Route::get('/musaned',function(){

        return view('frontend.pages.musaned.index');
    })->name('frontend.musaned');


    ### filter bY Countries


        ##

       // Route::get('getMusaned','');





    Route::get('show-worker-details/{id}', [\App\Http\Controllers\Frontend\Worker\WorkerFrontController::class,'show_worker_details'])
        ->name('front.show-worker-details');


    Route::get('logout', function () {
        auth()->logout();
        return redirect()->route('home');
    })->name('auth.logout');
});
