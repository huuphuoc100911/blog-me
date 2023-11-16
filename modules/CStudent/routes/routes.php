<?php

use Illuminate\Support\Facades\Route;
use Modules\CStudent\src\Http\Controllers\CStudentController;

Route::prefix('modules')->group(function () {
    Route::prefix('student')->group(function () {
        Route::get('', [CStudentController::class, 'index']);
        Route::get('show/{id}', [CStudentController::class, 'show']);
        Route::get('/create', [CStudentController::class, 'create']);
    });
});
