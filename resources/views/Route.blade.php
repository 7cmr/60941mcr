<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-41</title>
</head>
<body>
<h2>{{$route ? 'Список рейсов на маршруте '.$route->cities : 'Неверный id маршрута'}}</h2>
@if($route)
    <table border="1">
        <thead>
        <td>id</td>
        <td>Старт</td>
        <td>Финишь</td>
        </thead>
        @foreach($route->trips as $trip)
            <tr>
                <td>{{$trip->id}}</td>
                <td>{{$trip->start}}</td>
                <td>{{$trip->finish}}</td>
            </tr>
        @endforeach
    </table>
@endif
</body>
</html>
