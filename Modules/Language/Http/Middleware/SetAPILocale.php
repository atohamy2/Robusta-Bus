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
        if (!$request->headers->has('Accept-Language')) {
            return responseErrorMessage('The Accept-Language not found');
        }

        if ($request->header('Accept-Language') == '') {
            return responseErrorMessage('Set a value in Accept-Language like ar or en');
        }

        if (strlen($request->header('Accept-Language')) > 2) {
            return responseErrorMessage('The Accept-Language may not be greater than 2 characters.');
        }

        app()->setLocale($request->header('Accept-Language'));

        return $next($request);
    }
}
