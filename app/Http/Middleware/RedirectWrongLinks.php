<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectWrongLinks
{
    public function handle(Request $request, Closure $next)
    {
        $url = rtrim(strtolower($request->path()), '/');

        $redirects = [
            'all-workers/transferservice' => '/all-workers',
            'all-workers/services-single' => '/all-workers',
            'blog/transferservice' => '/blog',
        ];

        if (isset($redirects[$url])) {
            return redirect($redirects[$url], 301);
        }

        return $next($request);
    }
}



