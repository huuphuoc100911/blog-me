<?php

use App\Http\Controllers\Api\v1\ApiController;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\CategoryController;
use App\Http\Controllers\Api\v1\MediaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::apiResource('medias', 'Api\v1\MediaController');
    Route::apiResource('customer', 'Api\v1\CustomerController');
    Route::get('categories', [CategoryController::class, 'getListCategory']);
    Route::get('category/{category}', [CategoryController::class, 'getCategory']);
    Route::get('categories/{categoryId}', [MediaController::class, 'getListMediaOfCategory']);
    Route::get('staffs', [ApiController::class, 'getListStaff']);
    Route::get('info-company', [ApiController::class, 'getInfoCompany']);
    Route::get('amount-user', [ApiController::class, 'getUserAmount']);
    Route::get('amount-media', [ApiController::class, 'getMediaAmount']);
    Route::get('amount-blog', [ApiController::class, 'getBlogAmount']);
    Route::get('place-vn', [ApiController::class, 'getPlaceVn']);
    Route::get('stastic-media', [ApiController::class, 'stasticMedia']);
    Route::post('admin-vue/login', [AuthController::class, 'login']);
});
