<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    /**
     * Trả về JSON thành công.
     */
    protected function respondWithSuccess($data = [], $statusCode = Response::HTTP_OK)
    {
        return response()->json(['status' => $statusCode, 'data' => $data]);
    }

    /**
     * Trả về JSON khi có lỗi.
     */
    protected function respondWithError($errorMessage, $statusCode = 400)
    {
        return response()->json(['status' => $statusCode, 'error' => $errorMessage]);
    }
}