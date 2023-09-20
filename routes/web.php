<?php

use App\Http\Controllers\User\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog-detail/{slug}/{id}', [HomeController::class, 'blogDetail'])->name('blog-detail');
Route::get('/service', [HomeController::class, 'service'])->name('service');
Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');