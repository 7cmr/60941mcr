<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Tests\Integration\Database\EloquentHasManyThroughTest\Category;

class RouteController extends Controller
{
    public function index()
    {
        return view('routes', ['routes' => Route::all()]);
    }
    public function show(string $id)
    {
        return view('route', ['route' => Route::all()->where('id', $id)->first()]);
    }

}
