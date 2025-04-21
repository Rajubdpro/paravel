<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;

/**
 * Frontend Routes
 */
    Route::get('/', [FrontendController::class, 'welcome']);

/**
 * Auth Routes
 */
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

/**
 * Profile Routes
 */
    Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


/**
 * Admin Routes
 */
    Route::get('/users', [HomeController::class, 'users'])->name('users.list');
    Route::get('/user/delete/{id}', [HomeController::class, 'userDelete'])->name('users.delete');
    Route::get ('/users/edit/{id}', [HomeController::class, 'userEdit'])->name('users.edit');
    Route::post('/user/update', [HomeController::class, 'userUpdate'])->name('users.update');

});


require __DIR__.'/auth.php';
