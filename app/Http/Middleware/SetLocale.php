<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $accept_language = $request->header('Accept-Language', 'en');
        if (!in_array($accept_language, ['ar', 'en'])) {
            $accept_language = 'en';
        }
        App::setLocale($accept_language);

        return $next($request);
    }
}
