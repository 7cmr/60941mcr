<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-41</title>
</head>
<body>
<h2>Список маршрутов</h2>
<table border="1">
    <thead>
    <td>id</td>
    <td>Город-город</td>
    <td>Цена за км</td>
    <td>Расстояние</td>
    </thead>
    @foreach($routes as $route)
        <tr>
            <td>{{$route->id}}</td>
            <td>{{$route->cities}}</td>
            <td>{{$route->rate}}</td>
            <td>{{$route->distance}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
