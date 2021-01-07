<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Response;

class InvalidActionException extends Exception
{
    public static function getResponse($message)
    {
        return Response::json([
            'error' => 'InvalidActionException',
            'status' => 400,
            'message' => $message,
            'timestamp' => $_SERVER['REQUEST_TIME'],
            'path' => $_SERVER['REQUEST_URI'],
            'errors' => array()
        ], 400);
    }
}
