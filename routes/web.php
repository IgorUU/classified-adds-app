<?php

use App\Http\Controllers\Admin\AdminAdController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\ProfileAdController;
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
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', AdminUserController::class);
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('ads', AdminAdController::class);
});

// Profile routes.
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Profile ads routes.
Route::middleware(['auth'])->prefix('profile')->name('profile.')->group(function () {
    Route::resource('ads', ProfileAdController::class)->except(['show']);
});

require __DIR__.'/auth.php';
