<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\DashboardController;

// Route::inertia('/', 'Welcome')->name('home');

// Route::get('/dashboard', [DashboardController::class, 'index'])
//     ->middleware(['auth'])
//     ->name('dashboard');

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');



