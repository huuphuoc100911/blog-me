<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Modules\CCategory\src\Http\Controllers', 'middleware' => 'web'], function () {
    Route::prefix('manager')->name('manager.')->group(function () {
        Route::prefix('categories')->name('categories.')->group(function () {
            Route::get('', 'CategoryController@index')->name('index');
            Route::get('/create', 'CategoryController@create')->name('create');
            Route::post('/create', 'CategoryController@store')->name('store');
            Route::get('/edit/{category}', 'CategoryController@edit')->name('edit');
            Route::post('/edit/{category}', 'CategoryController@update')->name('update');
            Route::post('delete/{category}', 'CategoryController@delete')->name('delete');
        });
    });
});
