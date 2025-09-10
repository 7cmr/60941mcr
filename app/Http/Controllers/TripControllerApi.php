<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transport;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripControllerApi extends Controller
{
    public function index()
    {
        return response(Trip::all());
    }
    public function show(string $id)
    {
        return response(Trip::find($id));
    }
}
