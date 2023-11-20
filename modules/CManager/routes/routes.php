<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Modules\CManager\src\Http\Controllers', 'middleware' => 'web'], function () {
    Route::prefix('manager')->name('manager.')->group(function () {
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('', 'UserController@index')->name('index');
            Route::get('/create', 'UserController@create')->name('create');
            Route::post('/create', 'UserController@store')->name('store');
            Route::get('/edit/{manager}', 'UserController@edit')->name('edit');
            Route::post('/edit/{manager}', 'UserController@update')->name('update');
            Route::post('delete/{manager}', 'UserController@delete')->name('delete');
        });
    });
});
