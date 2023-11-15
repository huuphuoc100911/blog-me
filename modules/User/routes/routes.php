<?php

use Illuminate\Support\Facades\Route;
use Modules\User\src\Http\Controllers\UserController;

Route::prefix('modules')->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('', [UserController::class, 'index']);
        Route::get('show/{id}', [UserController::class, 'show']);
        Route::get('/create', [UserController::class, 'create']);
    });
});
