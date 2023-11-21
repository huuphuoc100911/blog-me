<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\src\Http\Controllers\Manager\LoginController;
use Modules\CCategory\src\Http\Controllers\CategoryController;
use Modules\CManager\src\Http\Controllers\UserController;
use Modules\Course\src\Http\Controllers\CourseController;
use Modules\Dashboard\src\Http\Controllers\DashboardController;
use Modules\Lesson\src\Http\Controllers\LessonController;
use Modules\Teacher\src\Http\Controllers\TeacherController;

Route::prefix('manager')->name('manager.')->group(function () {
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [LoginController::class, 'postLogin'])->name('postLogin');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'auth.manager'], function () {
    Route::prefix('manager')->name('manager.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::prefix('users')->name('users.')->group(function () {
            Route::get('', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/create', [UserController::class, 'store'])->name('store');
            Route::get('/edit/{manager}', [UserController::class, 'edit'])->name('edit');
            Route::post('/edit/{manager}', [UserController::class, 'update'])->name('update');
            Route::post('delete/{manager}', [UserController::class, 'delete'])->name('delete');
        });

        Route::prefix('categories')->name('categories.')->group(function () {
            Route::get('', [CategoryController::class, 'index'])->name('index');
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::post('/create', [CategoryController::class, 'store'])->name('store');
            Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('edit');
            Route::post('/edit/{category}', [CategoryController::class, 'update'])->name('update');
            Route::post('delete/{category}', [CategoryController::class, 'delete'])->name('delete');
        });

        Route::prefix('courses')->name('courses.')->group(function () {
            Route::get('', [CourseController::class, 'index'])->name('index');
            Route::get('/create', [CourseController::class, 'create'])->name('create');
            Route::post('/create', [CourseController::class, 'store'])->name('store');
            Route::get('/edit/{course}', [CourseController::class, 'edit'])->name('edit');
            Route::put('/edit/{course}', [CourseController::class, 'update'])->name('update');
            Route::post('delete/{course}', [CourseController::class, 'delete'])->name('delete');
        });

        Route::prefix('teachers')->name('teachers.')->group(function () {
            Route::get('', [TeacherController::class, 'index'])->name('index');
            Route::get('/create', [TeacherController::class, 'create'])->name('create');
            Route::post('/create', [TeacherController::class, 'store'])->name('store');
            Route::get('/edit/{teacher}', [TeacherController::class, 'edit'])->name('edit');
            Route::put('/edit/{teacher}', [TeacherController::class, 'update'])->name('update');
            Route::post('delete/{teacher}', [TeacherController::class, 'delete'])->name('delete');
        });

        Route::prefix('lessons')->name('lessons.')->group(function () {
            Route::get('/{courseId}', [LessonController::class, 'show'])->name('show');
            Route::get('/create', [LessonController::class, 'create'])->name('create');
            Route::post('/create', [LessonController::class, 'store'])->name('store');
            Route::get('/edit/{lesson}', [LessonController::class, 'edit'])->name('edit');
            Route::put('/edit/{lesson}', [LessonController::class, 'update'])->name('update');
            Route::post('delete/{lesson}', [LessonController::class, 'delete'])->name('delete');
        });
    });
});
