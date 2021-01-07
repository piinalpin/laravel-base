<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Response;

class BadCredentialsException extends Exception
{
    public static function getResponse($message='Bad Credentials')
    {
        return Response::json([
            'error' => 'BadCredentialsException',
            'status' => 400,
            'message' => $message,
            'timestamp' => $_SERVER['REQUEST_TIME'],
            'path' => $_SERVER['REQUEST_URI'],
            'errors' => array()
        ], 400);
    }
}
