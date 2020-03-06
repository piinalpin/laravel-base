<?php

namespace App\Http\Middleware;

use App\Exceptions\AccessDeniedException;
use Closure;

class AdminAccess
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
        if ($request->user()->role != config('constants.USER_ROLE.ADMINISTRATOR')) {
            return AccessDeniedException::getResponse();
        }
        return $next($request);
    }
}
