<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\MediaController;
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

Route::apiResource('medias', 'Api\MediaController');
Route::get('categories', [CategoryController::class, 'getListCategory']);
Route::get('category/{category}', [CategoryController::class, 'getCategory']);
Route::get('categories/{categoryId}', [MediaController::class, 'getListMediaOfCategory']);
Route::get('staffs', [ApiController::class, 'getListStaff']);
Route::get('info-company', [ApiController::class, 'getInfoCompany']);
Route::get('amount-user', [ApiController::class, 'getUserAmount']);
Route::get('amount-media', [ApiController::class, 'getMediaAmount']);
Route::get('amount-blog', [ApiController::class, 'getBlogAmount']);
