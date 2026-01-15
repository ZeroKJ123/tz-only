<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/cars/available', [CarController::class, 'available']);
});
