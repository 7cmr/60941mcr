<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Route;
use Illuminate\Http\Request;

class RouteControllerApi extends Controller
{
    public function index(Request $request)
    {
        return response(Route::limit($request->perpage ?? 5)
                ->offset(($request->perpage ?? 5) * ($request->page ?? 0))
                ->get());
    }
    public function total()
    {
        return response(Route::all()->count());
    }
    public function show(string $id)
    {
        return response(Route::find($id));
    }

}
