<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Route;
use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function show(string $id)
    {
        return view('transport', ['transport' => Transport::all()->where('id', $id)->first()]);
    }
    public function index(Request $request)
    {
        return view('transport', ['transports' => Transport::all()]);
    }
}
