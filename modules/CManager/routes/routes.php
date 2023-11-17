<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Modules\CManager\src\Http\Controllers', 'middleware' => 'web'], function () {
    Route::prefix('manager')->group(function () {
        Route::prefix('user')->group(function () {
            Route::get('', 'UserController@index')->name('manager.user.index');
            Route::get('/create', 'UserController@create')->name('manager.user.create');
            Route::post('/create', 'UserController@store')->name('manager.user.store');
            Route::get('/edit/{manager}', 'UserController@edit')->name('manager.user.edit');
            Route::post('/edit/{manager}', 'UserController@update')->name('manager.user.update');
        });
    });
});
