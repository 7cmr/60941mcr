@extends('layout')
@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Список транспорта</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($transports as $transport)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('images/transports/transport' . $transport->id . '.jpg') }}" class="card-img-top" alt="Изображение транспорта">
                        <div class="card-body">
                            <h5 class="card-title">{{ $transport->name }}</h5>
                            <p class="card-text">Грузоподъёмность: {{ $transport->capacity }} кг</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
