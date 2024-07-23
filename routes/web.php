<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\EmailVerifyController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.save');

    Route::get('logout', 'logout')->name('logout');

});

Route::get('verify/{id}', [EmailVerifyController::class, 'verifyEmail']);


Route::get('dashboard',[App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
