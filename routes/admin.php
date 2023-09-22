<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'postLogin'])->name('postLogin');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register', [RegisterController::class, 'postRegister'])->name('postRegister');
Route::get('forgot-password', [LoginController::class, 'forgotPassword'])->name('forgot-password');
Route::post('forgot-password', [ResetPasswordController::class, 'sendMail'])->name('send-mail');
Route::get('reset-password', [ResetPasswordController::class, 'resetPassword'])->name('reset-password');
Route::put('reset-password', [ResetPasswordController::class, 'changePassword'])->name('change-password');
Route::post('media/sort', [MediaController::class, 'sortMedia'])->name('media.sort');

Route::group(['middleware' => ['auth.admin']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('jquery', [DashboardController::class, 'jquery'])->name('dashboard.jquery');
    Route::get('/list-suggest-category', [ContactController::class, 'listSuggestCategory'])->name('list-suggest-category');
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('blog', 'Admin\BlogController');
    Route::resource('blog-category', 'Admin\BlogCategoryController');
    Route::resource('media', 'Admin\MediaController');
    Route::resource('user', 'Admin\UserController');
    Route::resource('info-company', 'Admin\InfoCompanyController');
    Route::get('change-status-staff', [UserController::class, 'changeStatusStaff'])->name('staff.change-status-staff');
    Route::get('change-status-media', [MediaController::class, 'changeStatusMedia'])->name('media.change-status-media');
    Route::get('change-status-blog', [BlogController::class, 'changeStatusBlog'])->name('blog.change-status-blog');
    Route::get('change-status-blog-category', [BlogCategoryController::class, 'changeStatusBlogCategory'])->name('blog-category.change-status-blog-category');
    Route::get('category-approve', [ContactController::class, 'approveCategory'])->name('category.approve');
});
