<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello World!']);
});
Route::get('/cargos', [\App\Http\Controllers\CargoController::class, 'index']);
Route::get('/routes', [\App\Http\Controllers\RouteConroller::class, 'index']);
Route::get('/route/{id}', [\App\Http\Controllers\RouteConroller::class, 'show']);
Route::get('/trips', [\App\Http\Controllers\TripController::class, 'index']);
Route::get('/transport/{id}', [\App\Http\Controllers\TransportController::class, 'show']);
