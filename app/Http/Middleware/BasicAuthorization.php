<?php

namespace App\Http\Middleware;

use App\Exceptions\AccessDeniedException;
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
        header('Cache-Control: no-cache, must-revalidate, max-age=0');

        if (empty($_SERVER['HTTP_AUTHORIZATION'])) {
            throw new AccessDeniedException();
        }

        $basicAuth = base64_encode(env('AUTH_USERNAME').":".env('AUTH_PASSWORD'));
        $encode = explode(' ', $_SERVER['HTTP_AUTHORIZATION'])[1];

        $isNotAuthenticated = (
            $encode != $basicAuth
        );
        
        if ($isNotAuthenticated) {
            throw new BadCredentialsException("Invalid authorization");
        }

        $user = User::where('username', request('username'))->first();

        if ($user == null) {
            throw new BadCredentialsException("username or password not match");
        }

        return $next($request);
    }
}
