<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('storage\favicon.svg')}}" type="image/svg">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.46.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- GOOGLE FONTS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+One&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('storage\icon.png')}}">
    <title>Bellavista | Presidente Equipo</title>
</head>

<body style="font-family: 'Mochiy Pop One', sans-serif;">

<h1>Agregar partido</h1>

<form action="{{ route('partidos.store') }}" method="POST">
    @csrf
    <div>
        <label for="equipo_local">Equipo local:</label>
        <select name="equipo_local">
            @foreach($equipos as $equipo)
                <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="equipo_visitante">Equipo visitante:</label>
        <select name="equipo_visitante">
            @foreach($equipos as $equipo)
                <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="goles_local">Goles local:</label>
        <input type="number" name="goles_local">
    </div>
    <div>
        <label for="goles_visitante">Goles visitante:</label>
        <input type="number" name="goles_visitante">
    </div>
    <div>
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha">
    </div>
    <div>
        <label for="hora">Hora:</label>
        <input type="time" name="hora">
    </div>
    <div>
        <button type="submit">Guardar</button>
    </div>
    
</form>

</body>
</html>