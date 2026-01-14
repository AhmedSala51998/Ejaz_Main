<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectWww
{
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost(); // www.isteqdamejaz.com
        $scheme = $request->getScheme(); // http أو https

        if (str_starts_with($host, 'www.')) {
            $newHost = substr($host, 4);
            $url = $scheme . '://' . $newHost . $request->getRequestUri();

            return redirect()->to($url, 301);
        }

        return $next($request);
    }
}
