<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;

//login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth', [AuthController::class, 'auth'])->name('authecation');

//Register
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/auth-register', [AuthController::class, 'authRegister'])->name('register.store');
//logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//landing page
Route::get('/', [MainController::class, 'index'])->name('landing-page');

Route::middleware(['login'])->group(function () {

    //Dashboard Admin
    Route::prefix('dashboard')->group(function () {
        Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard.admin');
    });

    //Users Pages
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.table');
    });
});
