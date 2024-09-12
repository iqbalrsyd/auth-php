<?php

use ...

Route::get(uri: 'user', [\App\Http\Controllers\AuthController::class, 'user']);
Route::post(uri: 'register', [\App\Http\Controllers\AuthController::class, 'register']);