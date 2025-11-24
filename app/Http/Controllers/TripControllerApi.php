<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transport;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TripControllerApi extends Controller
{
    public function index(Request $request)
    {
        return response(
            Trip::join('routes', 'trips.route_id', '=', 'routes.id')
                ->join('transports', 'trips.transport_id', '=', 'transports.id')
                ->select(
                    'trips.id',
                    'routes.cities as route_cities',
                    'transports.name as transport_name',
                    DB::raw("DATE_FORMAT(trips.start, '%d.%m.%Y %H:%i') as start"),
                    DB::raw("DATE_FORMAT(trips.finish, '%d.%m.%Y %H:%i') as finish")
                )
                ->limit($request->perpage ?? 5)
                ->offset(($request->perpage ?? 5) * ($request->page ?? 0))
                ->get()
        );
    }
    public function total()
    {
        return response(Trip::all()->count());
    }
    public function show(string $id)
    {
        return response(Trip::find($id));
    }
}
