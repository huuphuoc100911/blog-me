<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function responseErrors($message = '', $statusCode = Response::HTTP_FORBIDDEN)
    {
        return apiErrors($message, $statusCode);
    }

    public function responseSuccess($data, $statusCode = Response::HTTP_OK)
    {
        return apiSuccess($data, $statusCode);
    }
}
