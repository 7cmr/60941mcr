<?php

use App\Http\Controllers\RouteControllerApi;
use App\Http\Controllers\TransportControllerApi;
use App\Http\Controllers\TripControllerApi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;

Route::get('/routes', [RouteControllerApi::class, 'index']);
Route::get('/route/{id}', [RouteControllerApi::class, 'show']);

Route::get('/trips', [TripControllerApi::class, 'index']);
Route::get('/trip/{id}', [TripControllerApi::class, 'show']);

Route::get('/transports', [TransportControllerApi::class, 'index']);
Route::get('/transport/{id}', [TransportControllerApi::class, 'show']);

Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/transports', [TransportControllerApi::class, 'index']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/logout', [AuthController::class, 'logout']);
});
