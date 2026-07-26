<?php

namespace App\Providers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use Laravel\Passport\Passport;

use App\Http\Resources\WorkersCollection;
use Illuminate\Support\Facades\Cache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

      // if(!in_array(request()->path(),['/','ar','en'])){
        //   abort(403);
       //}

        Schema::defaultStringLength(191);
        Passport::routes();
        /*view()->share('settings', Cache::rememberForever('settings', function () {
            return Setting::first();
        }));*/
        $settings = Setting::first();

        dd([
            'database' => config('database.connections.mysql.database'),
            'host' => config('database.connections.mysql.host'),
            'settings_id' => $settings?->id,
            'footer_desc' => $settings?->footer_desc,
        ]);

        view()->share('settings', $settings);
    }
}
