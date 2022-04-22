<?php

namespace Modules\Language\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetAPILocale
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
        if (!$request->headers->has('Locale')) {
            return responseErrorMessage('The Locale not found');
        }

        if ($request->header('Locale') == '') {
            return responseErrorMessage('Set a value in Locale like ar or en');
        }

        if (strlen($request->header('Locale')) > 2) {
            return responseErrorMessage('The Locale may not be greater than 2 characters.');
        }

        app()->setLocale($request->header('Locale'));

        return $next($request);
    }
}
