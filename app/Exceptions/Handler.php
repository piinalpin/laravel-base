<?php

namespace App\Exceptions;

use App\Exceptions\AccessDeniedException;
use App\Exceptions\BadCredentialsException;
use App\Exceptions\DataNotFoundException;
use App\Exceptions\DuplicateDataException;
use App\Exceptions\UnauthorizeException;
use App\Exceptions\UsernameIsExistsException;
use App\Exceptions\ValidationErrorException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof AccessDeniedException) {
            return AccessDeniedException::getResponse();
        }
        if ($exception instanceof BadCredentialsException) {
            return BadCredentialsException::getResponse($exception->getMessage());
        }
        if ($exception instanceof DataNotFoundException) {
            return DataNotFoundException::getResponse($exception->getMessage());
        }
        if ($exception instanceof DuplicateDataException) {
            return DuplicateDataException::getResponse($exception->getMessage());
        }
        if ($exception instanceof UnauthorizeException) {
            return UnauthorizeException::getResponse($exception->getMessage());
        }
        if ($exception instanceof UsernameIsExistsException) {
            return UsernameIsExistsException::getResponse();
        }
        if ($exception instanceof ValidationException) {
            return ValidationErrorException::getResponse($exception);
        }

        return parent::render($request, $exception);
    }
}
