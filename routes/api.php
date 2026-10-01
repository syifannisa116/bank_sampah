<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NasabahController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::middleware('auth:sanctum')->get(
    '/nasabah/me',
    [NasabahController::class, 'me']
);
});