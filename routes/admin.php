<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
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

Route::match(['get', 'post'], 'login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register', [RegisterController::class, 'postRegister'])->name('postRegister');
Route::get('forgot-password', [LoginController::class, 'forgotPassword'])->name('forgot-password');
// Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


Route::group(['middleware' => ['auth.admin']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});
