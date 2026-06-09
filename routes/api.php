<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// ENDPOINT PROTEGIDO POR SANCTUM
// este middleware inspecciona el Token Bearer SHA-256 en las cabeceras HTTP
Route::middleware('auth:sanctum')->post('/fetch', [TaskController::class, 'apiFetch']);