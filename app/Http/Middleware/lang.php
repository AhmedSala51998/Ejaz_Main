<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class lang
{

    public function handle($request, Closure $next)
    {
        Config::set('auth.defaults.guard', 'api');
        app()->setlocale(request()->header('Accept-Language')??'ar');
        return $next($request);
    }

}
