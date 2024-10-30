<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-41</title>
    <style>  .is-invalid {color: red; }  </style>
</head>
<body>
<h2>Редактирование рейсов</h2>
<form method="post" action={{url('trip/update/'.$trip->id)}}>
    @csrf
    <label>Начало</label>
    <input type="text" name="start" value="@if (old('start')) {{old('start')}} @else {{$trip->start}}@endif "/>
    @error('start')
    <div class="is-invalid">{{$message}}</div>
    @enderror
    <label>Конец</label>
    <input type="text" name="finish" value="@if (old('finish')) {{old('finish')}} @else {{$trip->finish}}@endif "/>
    @error('finish')
    <div class="is-invalid">{{$message}}</div>
    @enderror
    <label>Транспорт</label>
    <select name="transport_id" value="{{old('transport_id')}}" >
        <option style=" ">
        @foreach($transports as $transport)
            <option value="{{$transport->id}}"
                    @if(old('transport_id'))
                        @if(old('transport_id') == $transport->id) selected @endif
                    @else
                         @if($trip->transport_id == $transport->id) selected @endif
                @endif>{{$transport->name}}
            </option>
        @endforeach
    </select>
    @error("transport_id")
    <div class="is-invalid">{{ $message }}</div>
    @enderror
    <label>Маршрут</label>
    <select name="route_id" value="{{old('route_id')}}" >
        <option style=" ">
        @foreach($routes as $route)
            <option value="{{$route->id}}"
                    @if(old('route_id'))
                        @if(old('route_id') == $route->id) selected @endif
                    @else
                        @if($trip->route_id == $route->id) selected @endif
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
