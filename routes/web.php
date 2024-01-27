<?php

use App\Http\Controllers\Stripe\StripeController;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\RegisterController;
use App\Http\Controllers\User\Auth\ResetPasswordController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\FirebaseController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LoginFbController;
use App\Http\Controllers\User\LoginGoogleController;
use App\Http\Controllers\User\LoginSocialiteController;
use App\Http\Controllers\User\PaymentController;
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
Route::get('portfolio/{id}', [HomeController::class, 'downloadImage'])->name('downloadImage');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/send-email', [HomeController::class, 'sendEmail'])->name('send-email');
//login google
Route::get('auth/google', [LoginGoogleController::class, 'redirectToGoogle'])->name('login-by-google');
Route::get('auth/google/callback', [LoginGoogleController::class, 'handleGoogleCallback']);
//login facebook
Route::get('auth/facebook', [LoginFbController::class, 'redirectToFacebook'])->name('login-by-facebook');
Route::get('auth/facebook/callback', [LoginFbController::class, 'handleFacebookCallback']);

//login twitter
Route::get('auth/twitter', [LoginSocialiteController::class, 'redirectToTwitter'])->name('login-by-twitter');
Route::get('auth/twitter/callback', [LoginSocialiteController::class, 'handleTwitterCallback']);

//login github
Route::get('auth/github', [LoginSocialiteController::class, 'redirectToGithub'])->name('login-by-github');
Route::get('auth/github/callback', [LoginSocialiteController::class, 'handleGithubCallback']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/info-account', [HomeController::class, 'infoAccount'])->name('info-account');
    Route::post('/update-profile', [HomeController::class, 'updateProfile'])->name('update-profile');
    Route::post('/update-avatar', [HomeController::class, 'updateAvatar'])->name('update-avatar');
    Route::post('/blog-comment', [CommentController::class, 'blogComment'])->name('blog-comment');
    Route::post('/reply-comment', [CommentController::class, 'replyComment'])->name('reply-comment');
    Route::post('/comment-favorite', [CommentController::class, 'commentFavorite'])->name('comment-favorite');
});

Route::get('/locale/{locale}', [HomeController::class, 'locale']);
Route::get('/stripe/index', [StripeController::class, 'index'])->name('stripe.index');
Route::post('/stripe/checkout', [StripeController::class, 'checkout'])->name('stripe.checkout');
Route::get('/stripe/success', [StripeController::class, 'success'])->name('stripe.success');
Route::get('/test-query', [HomeController::class, 'testQuery'])->name('test-query');
// Route::get('/firebase', [FirebaseController::class, 'index'])->name('firebase.index');
// Route::get('/firebase/create', [FirebaseController::class, 'create'])->name('firebase.create');
// Route::post('/firebase/create', [FirebaseController::class, 'store'])->name('firebase.post');
Route::resource('firebase', 'User\FirebaseController');
Route::get('/firebase/{id}/delete', [FirebaseController::class, 'delete'])->name('firebase.delete');
Route::get('/test-relationship', [HomeController::class, 'testRelationship'])->name('test-relationship');
Route::post('vn-payment', [PaymentController::class, 'vnpayPayment'])->name('vn-payment');
Route::post('momo-payment', [PaymentController::class, 'momoPayment'])->name('momo-payment');
