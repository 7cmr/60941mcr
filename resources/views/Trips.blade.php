<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-41</title>
</head>
<body>
<h2>Список рейсов</h2>
<table border="1">
    <thead>
    <td>id</td>
    <td>Начало</td>
    <td>Конец</td>
    <td>Маршрут</td>
    <td>Транспорт</td>
    <td>Действия</td>
    </thead>
    @foreach($trips as $trip)
        <tr>
            <td>{{$trip->id}}</td>
            <td>{{$trip->start}}</td>
            <td>{{$trip->finish}}</td>
            <td>{{$trip->routes->cities}}</td>
            <td>{{$trip->transports->name}}</td>
            <td>
                <a href="{{url('trip/destroy/'.$trip->id)}}">Удалить</a>
                <a href="{{url('trip/edit/'.$trip->id)}}">Редактировать</a>
            </td>
        </tr>
    @endforeach
</table>
{{ $trips->links() }}
</body>
</html>


