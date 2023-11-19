<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Modules\Teacher\src\Http\Controllers', 'middleware' => 'web'], function () {
    Route::prefix('manager')->name('manager.')->group(function () {
        Route::prefix('teacher')->name('teachers.')->group(function () {
            Route::get('', 'TeacherController@index')->name('index');
            Route::get('/create', 'TeacherController@create')->name('create');
            Route::post('/create', 'TeacherController@store')->name('store');
            Route::get('/edit/{teacher}', 'TeacherController@edit')->name('edit');
            Route::put('/edit/{teacher}', 'TeacherController@update')->name('update');
            Route::post('delete/{teacher}', 'TeacherController@delete')->name('delete');
        });
    });
});
