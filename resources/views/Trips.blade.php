@extends('layout')
@section('content')
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Список рейсов</h2>
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
            <tr>
                <th scope="col">Транспорт</th>
                <th scope="col">Маршрут</th>
                <th scope="col">Начало</th>
                <th scope="col">Конец</th>
                <th scope="col" class="text-center">Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($trips as $trip)
                <tr>
                    <td>{{ $trip->transports->name }}</td>
                    <td>{{ $trip->routes->cities }}</td>
                    <td>{{ $trip->start }}</td>
                    <td>{{ $trip->finish }}</td>
                    <td class="text-center">
                        <!-- Кнопка "Редактировать" -->
                        <a href="{{ url('trip/edit/' . $trip->id) }}" class="btn btn-sm btn-primary mx-1">
                            <i class="fa fa-pencil"></i> Редактировать
                        </a>
                        <form method="POST" action="{{ url('trip/destroy/' . $trip->id) }}" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger mx-1">
                                <i class="fa fa-trash"></i> Удалить
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Данных о рейсах пока нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="pt-4 d-flex justify-content-center">
            {{ $trips->links() }}
        </div>
    </div>
@endsection


