<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Response;

class DataNotFoundException extends Exception
{
    public static function getResponse($message)
    {
        return Response::json([
            'error' => 'DataNotFoundException',
            'status' => 404,
            'message' => $message,
            'timestamp' => $_SERVER['REQUEST_TIME'],
            'path' => $_SERVER['REQUEST_URI'],
            'errors' => array()
        ], 404);
    }
}
