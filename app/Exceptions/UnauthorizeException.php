<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use Illuminate\Support\Facades\Response;

class UnauthorizeException extends Exception
{
	public static function getResponse($message)
    {
        return Response::json([
            'error' => 'Unauthorized',
            'status' => 401,
            'message' => $message,
            'timestamp' => $_SERVER['REQUEST_TIME'],
            'path' => $_SERVER['REQUEST_URI'],
            'errors' => array()
        ], 401);
    }
}
