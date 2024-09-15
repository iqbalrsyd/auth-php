<?php

use Illuminate\Support\Facades\Route;

// Penulisan route yang benar
Route::get('/user', [\App\Http\Controllers\AuthController::class, 'user']);
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);