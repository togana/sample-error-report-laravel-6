<?php

namespace App\Http\Controllers;

use App\Exceptions\AppException;

class ErrorController extends Controller
{
    public function __invoke()
    {
        throw AppException::BadRequest();
    }
}
