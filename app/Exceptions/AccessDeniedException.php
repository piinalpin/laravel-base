<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Response;

class AccessDeniedException extends Exception
{
    public static function getResponse() {
    	return Response::json([
            'error' => 'AccessDeniedException',
            'status' => 403,
            'message' => 'Access Denied',
        ], 403);
    }
}
