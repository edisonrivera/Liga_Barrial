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

    <h1>Partidos</h1>
    <a href="{{ route('matches.create') }}">Agregar partido</a>

    <table>
        <thead>
            <tr>
                <th>Equipo local</th>
                <th>Equipo visitante</th>
                <th>Goles local</th>
                <th>Goles visitante</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matches as $match)
                <tr>
                    <td>{{ $match->name_team_local }}</td>
                    <td>{{ $match->name_team_visit }}</td>
                    <td>{{ $match->goals_local }}</td>
                    <td>{{ $match->goals_visit }}</td>
                    <td>{{ $match->date_match }}</td>
                    <td>{{ $match->time_match }}</td>
                    <td>
                        <a href="{{ route('matches.edit', $match->id) }}">Editar</a>
                        <form action="{{ route('matches.destroy', $match->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>