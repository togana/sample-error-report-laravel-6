<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    protected $internalDontReport = [];

    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    public function render($request, Exception $exception)
    {
        if ($exception instanceof AppException) {
            $error = [
                'message' => $exception->errorMessage,
                'code' => $exception->errorCode,
            ];
            return response()->errorJson($error);
        }

        return response()->errorJson([
            'message' => 'Unknown Error',
            'code' => 999,
        ]);
    }
}
