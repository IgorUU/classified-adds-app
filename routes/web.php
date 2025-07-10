<?php

use App\Http\Controllers\Admin\AdminAdController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Public\AdController;
use App\Http\Controllers\Public\CategoryController;
use App\Http\Controllers\Public\HomeController;
use Illuminate\Support\Facades\Route;

// Public routes.
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/ad/{ad}', [AdController::class, 'show'])->name('ad.show');

// Admin routes.
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('users', AdminUserController::class);
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('ads', AdminAdController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/ads', [ProfileController::class, 'ads'])->name('profile.ads');
});

require __DIR__.'/auth.php';
