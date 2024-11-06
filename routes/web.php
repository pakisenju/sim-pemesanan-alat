<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AlatBeratController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::resource('home', HomeController::class);
Route::resource('about', AboutController::class);
Route::resource('contact', ContactController::class);
Route::resource('product', ProductController::class);

Route::middleware('guest')->group(function () {
    Route::resource('login', LoginController::class);
    Route::resource('register', RegisterController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('alat-berat', AlatBeratController::class);
    Route::resource('user', UserController::class);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
