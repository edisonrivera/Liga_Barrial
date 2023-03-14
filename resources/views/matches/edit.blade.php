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

    <h1>Editar partido</h1>

    <form action="{{ route('matches.update', $match->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name_team_local">Equipo local:</label>
            <select name="name_team_local">
                @foreach($equipos as $equipo)
                    <option value="{{ $match->id }}" @if($soccer_team->code_soccer_team == $match->name_team_local) selected @endif>{{ $soccer_team->name_team }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="name_team_visit">Equipo visitante:</label>
            <select name="name_team_visit">
                @foreach($matches as $match)
                    <option value="{{ $match->id }}" @if($soccer_team->code_soccer_team == $match->name_team_visit) selected @endif>{{ $soccer_team->name_team }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="goals_local">Goles local:</label>
            <input type="number" name="goals_local" value="{{ $match->goals_local }}">
        </div>
        <div>
            <label for="goals_visit">Goles visitante:</label>
            <input type="number" name="goals_visit" value="{{ $match->goals_visit }}">
        </div>
        <div>
            <label for="date_match">Fecha:</label>
            <input type="date" name="date_match" value="{{ $match->date_match }}">
        </div>
        <div>
            <label for="time_match">Hora:</label>
            <input type="time" name="time" value="{{ $match->time_match }}">
        </div>
        <div>
            <button type="submit">Guardar</button>
            <a href="{{ route('matches.index') }}">Cancelar</a>
        </div>
    </form>

</body>
</html>