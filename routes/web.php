<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

// rutas publicas web
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// rutas protegidas web
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [TaskController::class, 'index'])->name('dashboard');
    Route::get('/search', [TaskController::class, 'search'])->name('tasks.search');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // ruta protegida authen. + author. (admin)
    Route::get('/admin', function () {
        return "Bienvenid@ al panel de administración";
    })->middleware('can:admin');
});