<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Route;
use App\Models\Transport;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 4;
        return view('trips', [
            'trips' => Trip::paginate($perpage)->withQueryString(),
        ]);
    }
    public function create()
    {
        return view('trip_create', ['transports' => Transport::all(), 'routes' => Route::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'start' => 'required|date',
            'finish' => 'required|date',
            'transport_id' => 'required|exists:App\Models\Transport,id',
            'route_id' => 'required|exists:App\Models\Route,id',
        ]);
        $trip = new Trip;
        $trip->start = $validated['start'];
        $trip->finish = $validated['finish'];
        $trip->transport_id = $validated['transport_id'];
        $trip->route_id = $validated['route_id'];
        $trip->save();
        return redirect('/')->withErrors([
            'success' => 'Рейс был успешно добавлен',
        ]);

    }

    public function edit(string $id)
    {
        return view('trip_edit', [
            'trip' => Trip::all()->where('id', $id)->first(),
            'transports' => Transport::all(),
            'routes' => Route::all()
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'start' => 'required|date',
            'finish' => 'required|date',
            'transport_id' => 'required|exists:App\Models\Transport,id',
            'route_id' => 'required|exists:App\Models\Route,id',
        ]);
        $trip = Trip::all()->where('id', $id)->first();
        $trip->start = $validated['start'];
        $trip->finish = $validated['finish'];
        $trip->transport_id = $validated['transport_id'];
        $trip->route_id = $validated['route_id'];
        $trip->save();
        return redirect('/')->withErrors([
            'success' => 'Рейс был успешно изменен',
        ]);
    }

    public function destroy(string $id)
    {

        if (!\Illuminate\Support\Facades\Gate::allows('destroy-trip', Trip::find($id))) {
            return redirect('/trips')->withErrors(['error' => 'У вас нет прав администрирования!']);
        }

        // Удаление записи
        Trip::destroy($id);
        return redirect('/trips')->withErrors(['success' => 'Запись удалена.']);
    }
}
