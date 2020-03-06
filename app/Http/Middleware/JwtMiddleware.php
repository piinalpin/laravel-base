<?php

namespace App\Http\Middleware;

use App\Exceptions\BadCredentialsException;
use App\Exceptions\UnauthorizeException;
use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware
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
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $exception) {
            if ($exception instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return UnauthorizeException::getResponse('expired token');
            } else if ($exception instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return UnauthorizeException::getResponse('invalid token');
            } else if ($exception instanceof \Tymon\JWTAuth\Exceptions\TokenBlacklistedException) {
                 return UnauthorizeException::getResponse('token blacklisted');
            } else {
                return UnauthorizeException::getResponse('token not provided');
            }
        }
        return $next($request);
    }
}
