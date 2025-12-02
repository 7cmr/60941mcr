<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transport;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

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
    public function store(Request $request)
    {
        if (! Gate::allows('create-trip')) {
            return response()->json([
                'code' => 1,
                'message' => 'У вас нет прав на добавление рейса',
            ]);
        }

        $validated = $request->validate([
            'name' => 'required|unique:trips|max:255',
            'image' => 'required|file'
        ]);

        $file = $request->file('image');
        // Генерация уникального имени файла
        $fileName = rand(1, 100000) . '_' . $file->getClientOriginalName();

        try {
            // Загрузка файла в S3
            $path = Storage::disk('s3')->putFileAs('trip_pictures', $file, $fileName);
            // Получение URL загруженного файла
            $fileUrl = Storage::disk('s3')->url($path);
        }
        catch (Exception $e){
            return response()->json([
                'code' => 2,
                'message' => 'Ошибка загрузки файла в хранилище S3',
            ]);
        };

        $trip = new Trip($validated);
        $trip->picture_url = $fileUrl;
        $trip->save();

        return response()->json([
            'code' => 0,
            'message' => 'Категория успешно добавлена',
        ]);
    }
}
