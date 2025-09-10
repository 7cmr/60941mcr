<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Route;
use Illuminate\Http\Request;

class RouteControllerApi extends Controller
{
    public function index()
    {
        return response(Route::all());
    }
    public function show(string $id)
    {
        return response(Route::find($id));
    }

}
