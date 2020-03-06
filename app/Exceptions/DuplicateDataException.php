<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Response;

class DuplicateDataException extends Exception
{
    public static function getResponse($message)
    {
        return Response::json([
            'error' => 'Duplicate Data',
            'status' => 404,
            'message' => $message,
            'timestamp' => $_SERVER['REQUEST_TIME'],
            'path' => $_SERVER['REQUEST_URI'],
            'errors' => array()
        ], 404);
    }
}
