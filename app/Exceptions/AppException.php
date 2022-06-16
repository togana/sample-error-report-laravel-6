<?php

namespace App\Exceptions;

use Exception;

class AppException extends Exception
{
    public string $errorMessage;
    public int $errorCode;

    private function __construct($errorMessage, $errorCode) {
        parent::__construct($errorMessage, $errorCode);

        $this->$errorMessage = $errorMessage;
        $this->$errorCode = $errorCode;
    }

    public static function BadRequest(
        string $message = 'Bad Request',
        int $errorCode = 400
    ): AppException {
        return new AppException($message, $errorCode);
    }
}
