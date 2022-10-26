<?php

use App\Http\Controllers\Staff\Auth\ForgotPasswordController;
use App\Http\Controllers\Staff\Auth\LoginController;
use App\Http\Controllers\Staff\Auth\RegisterController;
use App\Http\Controllers\Staff\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Staff Routes
|--------------------------------------------------------------------------
|
| This is where you can register staff routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web & staff" middleware group. Now create something great!
|
*/

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register', [RegisterController::class, 'postRegister'])->name('postRegister');
Route::get('forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('forgot-password');
// Route::get('reset-password', [ResetPasswordController::class, 'resetPassword'])->name('reset-password');

Route::group(['middleware' =>  ['auth.staff']], function () {
    Route::get('reset-password', [ResetPasswordController::class, 'resetPassword'])->name('reset-password');
});


