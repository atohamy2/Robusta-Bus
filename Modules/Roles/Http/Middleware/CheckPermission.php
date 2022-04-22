<?php

namespace Modules\Roles\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermission
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
        $user = auth()->user();
        $routeName = $request->route()->getName();
        $skipsRoutes = $this->getSkipsRoutes();

        if($user->hasRole('Super Admin'))
        {
            $response = $next($request);
            return $response;
        }

        if(in_array($routeName, $skipsRoutes))
        {
            $response = $next($request);
            return $response;
        }

        if(!$user->hasPermissionTo($routeName))
        {
            return redirect()->route('lockedscreen');
        }

        return $next($request);
    }

    private function getSkipsRoutes()
    {
        return [
            'home.index',
        ];
    }
}
