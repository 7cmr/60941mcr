<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Route;
use App\Models\Transport;
use Illuminate\Http\Request;

class TransportControllerApi extends Controller
{
    public function index(Request $request)
    {
        return response(Transport::limit($request->perpage ?? 5)
            ->offset(($request->perpage ?? 5) * ($request->page ?? 0))
            ->get());
    }
    public function total()
    {
        return response(Transport::all()->count());
    }
    public function show(string $id)
    {
        return response(Transport::find($id));
    }

}
