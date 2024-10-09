<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        return view('trips', [
            'trips' => Trip::all()
        ]);
    }

}
