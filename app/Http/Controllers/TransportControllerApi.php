<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Route;
use App\Models\Transport;
use Exception;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function store(Request $request)
    {
        if (! Gate::allows('create-transport')) {
            return response()->json([
                'code' => 1,
                'message' => 'У вас нет прав на добавление рейса',
            ]);
        }

        // Указываем, что запрос API, чтобы validate возвращал JSON
        $request->headers->set('Accept', 'application/json');

        $validated = $request->validate([
            'name' => 'required|unique:transports|max:255',
            'capacity' => 'required|integer|min:1',
            'image' => 'required|file'
        ]);

        $file = $request->file('image');
        $fileName = rand(1, 100000) . '_' . $file->getClientOriginalName();

        try {
            $path = Storage::disk('s3')->putFileAs('transport_pictures', $file, $fileName);
            $fileUrl = Storage::disk('s3')->url($path);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 2,
                'message' => 'Ошибка загрузки файла в хранилище S3',
            ]);
        }

        $transport = new Transport($validated);
        $transport->picture_url = $fileUrl;
        $transport->save();

        return response()->json([
            'code' => 0,
            'message' => 'Транспорт успешно добавлен',
        ]);
    }


}
