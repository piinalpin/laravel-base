<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Response;

class QueryException extends Exception
{
    public static function getResponse($message)
    {
        return Response::json([
            'error' => 'QueryException',
            'status' => 500,
            'message' => $message,
            'timestamp' => $_SERVER['REQUEST_TIME'],
            'path' => $_SERVER['REQUEST_URI'],
            'errors' => array()
        ], 400);
    }
}
