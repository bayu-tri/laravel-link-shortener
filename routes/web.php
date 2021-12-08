<?php

use App\Http\Controllers\LinkController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route for redirecting the shorten link
Route::get('/{slug}', [LinkController::class, 'redirect']);

// Accessible only where user already logged in
Route::middleware(['auth'])->group(function () {
    // Dashboard route
    Route::get('/', [LinkController::class, 'index'])->name('dashboard');
    // Route for Link CRUD 
    Route::resource('/links', LinkController::class);
    // Route for changing user data
    Route::PUT('/user/{id}', [UserController::class, 'update'])->name('user.update');
    // Route for accessing user data edit page
    Route::get('/user/{id}', [UserController::class, 'index'])->name('user.edit');
});