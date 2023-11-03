<?php

use App\Http\Controllers\Customer\Auth\ForgotPasswordController;
use App\Http\Controllers\Customer\Auth\LoginController;
use App\Http\Controllers\Customer\Auth\RegisterController;
use App\Http\Controllers\Customer\Auth\ResetPasswordController;
use App\Http\Controllers\Customer\IndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
|
| This is where you can register staff routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web & staff" middleware group. Now create something great!
|
*/

Route::get('login', [LoginController::class, 'login'])->middleware('guest:customer')->name('login');
Route::post('login', [LoginController::class, 'postLogin'])->middleware('guest:customer')->name('postLogin');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'register'])->middleware('guest:staff')->name('register');
Route::post('register', [RegisterController::class, 'postRegister'])->name('postRegister');
Route::get('forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('forgot-password');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendMail'])->name('send-mail');
Route::get('reset-password', [ResetPasswordController::class, 'resetPassword'])->name('reset-password');
Route::put('reset-password', [ResetPasswordController::class, 'changePassword'])->name('change-password');

Route::group(['middleware' =>  ['auth.customer']], function () {
    Route::get('/', [IndexController::class, 'index'])->name('dashboard.index');
});
