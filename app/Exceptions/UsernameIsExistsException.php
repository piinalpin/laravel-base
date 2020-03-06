<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Response;

class UsernameIsExistsException extends Exception
{
    public static function getResponse()
    {
        return Response::json([
            'error' => 'Duplicate Data',
            'status' => 404,
            'message' => 'username is already exists',
            'timestamp' => $_SERVER['REQUEST_TIME'],
            'path' => $_SERVER['REQUEST_URI'],
            'errors' => array()
        ], 404);
    }
}
