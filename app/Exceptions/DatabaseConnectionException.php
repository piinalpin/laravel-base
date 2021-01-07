<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Response;

class DatabaseConnectionException extends Exception
{
    public static function getResponse()
    {
        return Response::json([
            'error' => 'DatabaseConnectionException',
            'status' => 500,
            'message' => 'Database connection refused.',
            'timestamp' => $_SERVER['REQUEST_TIME'],
            'path' => $_SERVER['REQUEST_URI'],
            'errors' => array()
        ], 500);
    }
}
