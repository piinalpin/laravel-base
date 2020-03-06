<?php

namespace App\Utils;

use Illuminate\Support\Facades\Response;

/**
 * 
 */
class ResponseHandler
{
	
	public static function ok()
    {
        return Response::json([
            'message' => 'ok'
        ], 200);
    }
}