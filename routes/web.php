<?php

use App\Http\Controllers\AlatBeratController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::resource('home', HomeController::class);

Route::middleware('guest')->group(function () {
    Route::resource('login', LoginController::class);
    Route::resource('register', RegisterController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('alat-berat', AlatBeratController::class);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
