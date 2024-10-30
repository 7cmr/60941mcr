<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello World!']);
});
Route::get('/cargos', [\App\Http\Controllers\CargoController::class, 'index']);
Route::get('/routes', [\App\Http\Controllers\RouteController::class, 'index']);
Route::get('/route/{id}', [\App\Http\Controllers\RouteController::class, 'show']);
Route::get('/trips', [\App\Http\Controllers\TripController::class, 'index']);
Route::get('/transport/{id}', [\App\Http\Controllers\TransportController::class, 'show']);


Route::get('/trip/create', [\App\Http\Controllers\TripController::class, 'create']);
Route::post('/trip', [\App\Http\Controllers\TripController::class, 'store']);
Route::get('/trip/edit/{id}', [\App\Http\Controllers\TripController::class, 'edit']);
Route::post('/trip/update/{id}', [\App\Http\Controllers\TripController::class, 'update']);
Route::get('/trip/destroy/{id}', [\App\Http\Controllers\TripController::class, 'destroy']);
