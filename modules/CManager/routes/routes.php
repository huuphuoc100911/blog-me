<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Modules\CManager\src\Http\Controllers'], function () {
    Route::prefix('manager')->group(function () {
        Route::prefix('user')->group(function () {
            Route::get('/', 'UserController@index')->name('manager.user.index');
            Route::get('/create', 'UserController@create')->name('manager.user.create');
        });
    });
});
