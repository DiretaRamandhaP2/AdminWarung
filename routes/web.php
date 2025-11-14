<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthController::class,'login'])->name('login');
Route::post('/auth',[AuthController::class,'auth'])->name('authecation');

Route::get('/',[DashboardController::class,'index'])->name('dashboard');
