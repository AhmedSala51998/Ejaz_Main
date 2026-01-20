<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectWrongLinks
{
    public function handle(Request $request, Closure $next)
    {
        $url = $request->path();
        $redirects = [
            'all-workers/transferService' => '/all-workers',
            'blog/transferService' => '/blog',
            'supports/transferService' => '/supports/contactUs',
        ];

        if (isset($redirects[$url])) {
            return redirect($redirects[$url], 301);
        }

        return $next($request);
    }
}
