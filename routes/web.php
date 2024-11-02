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
Route::get('/trips', [\App\Http\Controllers\TripController::class, 'index'])->name('trips');
Route::get('/transport/{id}', [\App\Http\Controllers\TransportController::class, 'show']);

Route::post('/trip', [\App\Http\Controllers\TripController::class, 'store']);

Route::get('/trip/create', [\App\Http\Controllers\TripController::class, 'create'])->middleware('auth');
Route::get('/trip/edit/{id}', [\App\Http\Controllers\TripController::class, 'edit'])->middleware('auth');
Route::post('/trip/update/{id}', [\App\Http\Controllers\TripController::class, 'update'])->middleware('auth');
Route::get('/trip/destroy/{id}', [\App\Http\Controllers\TripController::class, 'destroy'])->middleware('auth');

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout']);
Route::post('/auth', [\App\Http\Controllers\LoginController::class, 'authenticate']);

Route::get('/error', function (){
    return view('error', ['message' => session('message')]);
});
