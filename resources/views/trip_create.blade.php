<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-41</title>
    <style>  .is-invalid {color: red; }  </style>
</head>
<body>
<h2>Добавление рейса</h2>
<form method="post" action={{url('trip')}}>
    @csrf
    <label>Начало</label>
    <input type="text" name="start" value="{{old('start')}}"/>
    @error('start')
    <div class="is-invalid">{{$message}}</div>
    @enderror
    <br>
    <label>Конец</label>
    <input type="text" name="finish" value="{{old('finish')}}"/>
    @error('finish')
    <div class="is-invalid">{{$message}}</div>
    @enderror
    <br>
    <label>Транспорт</label>
    <select name="transport_id" value="{{old('transport_id')}}" >
        <option style=" ">
        @foreach($transports as $transport)
            <option value="{{$transport->id}}"
                    @if(old('transport_id') == $transport->id) selected
                @endif>{{$transport->name}}
            </option>
        @endforeach
    </select>
    @error("transport_id")
    <div class="is-invalid">{{ $message }}</div>
    @enderror
    <br>
    <label>Маршрут</label>
    <select name="route_id" value="{{old('route_id')}}" >
        <option style=" ">
        @foreach($routes as $route)
            <option value="{{$route->id}}"
                    @if(old('route_id') == $route->id) selected
                @endif>{{$route->cities}}
            </option>
        @endforeach
    </select>
    @error("route_id")
    <div class="is-invalid">{{ $message }}</div>
    @enderror
    <br>
    <input type="submit">
</form>
</body>
</html>
