<?php

namespace App\Http\Middleware;

use App\Exceptions\BadCredentialsException;
use App\User;
use Closure;
use Illuminate\Support\Facades\Response;

class BasicAuthorization
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
        $AUTH_USERNAME = 'kirito';
        $AUTH_PASSWORD = 'alicization';

        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        $hasSuppliedCredentials = !(empty($_SERVER['HTTP_AUTHORIZATION']));
        $basicAuth = base64_encode($AUTH_USERNAME.":".$AUTH_PASSWORD);
        $encode = explode(' ', $_SERVER['HTTP_AUTHORIZATION'])[1];

        $isNotAuthenticated = (
            !$hasSuppliedCredentials ||
            $encode != $basicAuth
        );
        if ($isNotAuthenticated) {
            throw new BadCredentialsException();
        }

        $user = User::where('username', request('username'))->first();

        if ($user == null) {
            throw new BadCredentialsException();
        }

        return $next($request);
    }
}
