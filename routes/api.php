<?php

use App\Http\Controllers\RouteControllerApi;
use App\Http\Controllers\TransportControllerApi;
use App\Http\Controllers\TripControllerApi;
use Illuminate\Support\Facades\Route;

Route::get('routes', [RouteControllerApi::class, 'index']);
Route::get('route/{id}', [RouteControllerApi::class, 'show']);

Route::get('trips', [TripControllerApi::class, 'index']);
Route::get('trip/{id}', [TripControllerApi::class, 'show']);

Route::get('transports', [TransportControllerApi::class, 'index']);
Route::get('transport/{id}', [TransportControllerApi::class, 'show']);
