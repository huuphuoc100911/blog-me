<?php

use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\RegisterController;
use App\Http\Controllers\User\Auth\ResetPasswordController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LoginFbController;
use App\Http\Controllers\User\LoginGoogleController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog-detail/{slug}/{id}', [HomeController::class, 'blogDetail'])->name('blog-detail');
Route::get('/service', [HomeController::class, 'service'])->name('service');
Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/send-email', [HomeController::class, 'sendEmail'])->name('send-email');
//login google
Route::get('auth/google', [LoginGoogleController::class, 'redirectToGoogle'])->name('login-by-google');
Route::get('auth/google/callback', [LoginGoogleController::class, 'handleGoogleCallback']);
//login facebook
Route::get('auth/facebook', [LoginFbController::class, 'redirectToFacebook'])->name('login-by-facebook');
Route::get('auth/facebook/callback', [LoginFbController::class, 'handleFacebookCallback']);

Route::group(['middleware' => ['auth.user']], function () {
    Route::get('/info-account', [HomeController::class, 'infoAccount'])->name('info-account');
    Route::post('/update-profile', [HomeController::class, 'updateProfile'])->name('update-profile');
    Route::post('/update-avatar', [HomeController::class, 'updateAvatar'])->name('update-avatar');
    Route::post('/blog-comment', [CommentController::class, 'blogComment'])->name('blog-comment');
    Route::post('/reply-comment', [CommentController::class, 'replyComment'])->name('reply-comment');
    Route::post('/comment-favorite', [CommentController::class, 'commentFavorite'])->name('comment-favorite');
});

Route::get('/locale/{locale}', [HomeController::class, 'locale']);
