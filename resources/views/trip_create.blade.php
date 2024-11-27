@extends('layout')
@section('content')
    <div class="row justify-content-center">
        <div class="col-4">
            <h2 class="text-center mb-4">Добавление рейса</h2>
            <form method="post" action="{{ url('trip') }}">
                @csrf
                <div class="mb-3">
                    <label for="start" class="form-label">Начало</label>
                    <input type="text" class="form-control @error('start') is-invalid @enderror"
                           id="start" name="start" value="{{ old('start') }}">
                    @error('start')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="finish" class="form-label">Конец</label>
                    <input type="text" class="form-control @error('finish') is-invalid @enderror"
                           id="finish" name="finish" value="{{ old('finish') }}">
                    @error('finish')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="transport" class="form-label">Транспорт</label>
                    <select class="form-select @error('transport_id') is-invalid @enderror" name="transport_id" id="transport">
                        <option style="display:none"></option>
                        @foreach ($transports as $transport)
                            <option value="{{ $transport->id }}"
                                    @if(old('transport_id') == $transport->id) selected @endif>
                                {{ $transport->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('transport_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="route" class="form-label">Маршрут</label>
                    <select class="form-select @error('route_id') is-invalid @enderror" name="route_id" id="route">
                        <option style="display:none"></option>
                        @foreach ($routes as $route)
                            <option value="{{ $route->id }}"
                                    @if(old('route_id') == $route->id) selected @endif>
                                {{ $route->cities }}
                            </option>
                        @endforeach
                    </select>
                    @error('route_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Добавить</button>
            </form>
        </div>
    </div>
@endsection
