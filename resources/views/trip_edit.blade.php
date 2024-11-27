@extends('layout')
@section('content')
    <div class="row justify-content-center">
        <div class="col-4">
            <h2 class="text-center mb-4">Редактирование рейса</h2>
            <form method="post" action="{{ url('trip/update/' . $trip->id) }}">
                @csrf
                <div class="mb-3">
                    <label for="start" class="form-label">Начало</label>
                    <input
                        type="text"
                        class="form-control @error('start') is-invalid @enderror"
                        id="start"
                        name="start"
                        value="{{ old('start', $trip->start) }}">
                    @error('start')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="finish" class="form-label">Конец</label>
                    <input
                        type="text"
                        class="form-control @error('finish') is-invalid @enderror"
                        id="finish"
                        name="finish"
                        value="{{ old('finish', $trip->finish) }}">
                    @error('finish')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="transport_id" class="form-label">Транспорт</label>
                    <select
                        class="form-control @error('transport_id') is-invalid @enderror"
                        id="transport_id"
                        name="transport_id">
                        @foreach($transports as $transport)
                            <option value="{{ $transport->id }}"
                                {{ old('transport_id', $trip->transport_id) == $transport->id ? 'selected' : '' }}>
                                {{ $transport->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('transport_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="route_id" class="form-label">Маршрут</label>
                    <select
                        class="form-control @error('route_id') is-invalid @enderror"
                        id="route_id"
                        name="route_id">
                        @foreach($routes as $route)
                            <option value="{{ $route->id }}"
                                {{ old('route_id', $trip->route_id) == $route->id ? 'selected' : '' }}>
                                {{ $route->cities }}
                            </option>
                        @endforeach
                    </select>
                    @error('route_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Сохранить</button>
            </form>
        </div>
    </div>
@endsection


