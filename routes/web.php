<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Categories\CategoryProductController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Product\ProductController;
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

    //middleware admin
    Route::middleware(['admin'])->group(function () {
        //Dashboard Admin
        Route::prefix('dashboard')->group(function () {
            Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard.admin');
        });

        Route::prefix('management')->group(function () {
            // Users Management
            Route::resource('users', UserController::class)->names('management.users');
            // Route::get('users/data', [UserController::class, 'dataTables'])->name('management.users.data');

            // category Products Management
            Route::resource('categories-products', CategoryProductController::class)->names('management.categories-products');

            // Products Management
            Route::resource('products', ProductController::class)->names('management.products');
        });
    });
});
