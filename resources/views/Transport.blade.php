<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-41</title>
</head>
<body>
<h2>{{$transport ? 'Список маршрутов транспорта: '.$transport->name : 'Неверный id трнаспорта'}}</h2>
@if($transport)
    <table border="1">
        <thead>
        <td>id</td>
        <td>Города</td>
        <td>Цена за 1 км</td>
        <td>Расстояние</td>
        <td>Начало</td>
        <td>Конец</td>
        </thead>
        @foreach($transport->routes as $route)
            <tr>
                <td>{{$route->id}}</td>
                <td>{{$route->cities}}</td>
                <td>{{$route->rate}}</td>
                <td>{{$route->distance}}</td>
                <td>{{$route->pivot->start}}</td>
                <td>{{$route->pivot->finish}}</td>
            </tr>
        @endforeach
    </table>
@endif
</body>
</html>

