<?php

namespace App\Http\Middleware;

use Closure;

class OpsAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->role != config('constants.USER_ROLE.OPS')) {
            return AccessDeniedException::getResponse();
        }
        return $next($request);
    }
}
