<?php

namespace App\Http\Middleware;

use App\Exceptions\AccessDeniedException;
use Closure;

class UserMaintenanceAccess
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
        $arrayMenu = array();
        foreach ($request->user()->menu as $userMenu) {
            $arrayMenu[] = $userMenu->menu;
        }
        if (!in_array(config('constants.USER_MENU.user-maintenance'), $arrayMenu)) {
            return AccessDeniedException::getResponse();
        }
        return $next($request);
    }
}
