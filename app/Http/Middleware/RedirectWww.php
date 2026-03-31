<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectWww
{
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();
        $scheme = $request->getScheme();
        $uri = $request->getRequestUri();

        if (str_starts_with($host, 'www.')) {
            $newHost = substr($host, 4);
            return redirect()->to($scheme . '://' . $newHost . $uri, 301);
        }

        if (str_starts_with($uri, '/public')) {
            $newUrl = str_replace('/public', '', $uri);
            return redirect()->to($scheme . '://' . $host . $newUrl, 301);
        }

        return $next($request);
    }
}
