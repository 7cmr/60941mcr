<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Route;
use App\Models\Transport;
use Illuminate\Http\Request;

class TransportControllerApi extends Controller
{
    public function index()
    {
        return response(Transport::all());
    }
    public function show(string $id)
    {
        return response(Transport::find($id));
    }

}
