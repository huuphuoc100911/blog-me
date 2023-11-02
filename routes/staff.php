<?php

use App\Http\Controllers\Staff\Auth\ForgotPasswordController;
use App\Http\Controllers\Staff\Auth\LoginController;
use App\Http\Controllers\Staff\Auth\RegisterController;
use App\Http\Controllers\Staff\Auth\ResetPasswordController;
use App\Http\Controllers\Staff\ContactController;
use App\Http\Controllers\Staff\DashboardController;
use App\Http\Controllers\Staff\MediaController;
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

Route::get('login', [LoginController::class, 'login'])->middleware('guest:staff')->name('login');
Route::post('login', [LoginController::class, 'postLogin'])->name('postLogin');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'register'])->middleware('guest:staff')->name('register');
Route::post('register', [RegisterController::class, 'postRegister'])->name('postRegister');
Route::get('forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('forgot-password');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendMail'])->name('send-mail');
Route::get('reset-password', [ResetPasswordController::class, 'resetPassword'])->name('reset-password');
Route::put('reset-password', [ResetPasswordController::class, 'changePassword'])->name('change-password');

Route::group(['middleware' =>  ['auth.staff']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/contact-admin', [ContactController::class, 'contactAdmin'])->name('contact-admin');
    Route::get('/list-suggest-category', [ContactController::class, 'listSuggestCategory'])->name('list-suggest-category');
    Route::post('/contact-admin', [ContactController::class, 'postContactAdmin'])->name('post-contact-admin');
    Route::resource('category', 'CategoryController');
    Route::resource('blog-category', 'BlogCategoryController');
    Route::resource('info-staff', 'InfoStaffController');
    Route::resource('media', 'MediaController');
    Route::get('media-table', [MediaController::class, 'mediaTable'])->name('media-table.index');
    Route::resource('blog', 'BlogController');
});
