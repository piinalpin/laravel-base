<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;

class ValidationErrorException extends Exception
{
    public static function getResponse(ValidationException $exception) {
    	$errors = ValidationErrorException::format($exception->validator);
    	$message = '';
	    if (!empty($errors) && !empty($errors[0])) $message = $errors[0]['message'];
        return Response::json([
            'error' => 'ValidationErrorException',
            'status' => 409,
            'message' => $message,
            'timestamp' => $_SERVER['REQUEST_TIME'],
            'path' => $_SERVER['REQUEST_URI'],
            'errors' => $errors
        ], 409);
    }

    public static function format($validator)
    {
    	$fields = $validator->errors()->toArray();
    	$errors = array();

    	foreach ($fields as $field => $message) {
    		$errorField = ['field' => $field];
    		foreach ($message as $key => $msg) {
    			if ($key) $errorField['message'.$key] = $msg;
    			else $errorField['message'] = $msg;
    		}
    		$errors[] = $errorField;
    	}
    	return $errors;
    }
}
