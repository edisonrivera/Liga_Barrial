<!DOCTYPE html>
<html lang="en" data-theme="emerald">
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
    <title>Bellavista | Equipos</title>
</head>
 {{-- class='bg-[url({{asset("/storage/form-background.jpg")}})] bg-no-repeat bg-center bg-cover relative min-h-screen' --}}
<body style="font-family: 'Mochiy Pop One', sans-serif;">
<table>
    <thead>
        <tr>
            <th>Posición</th>
            <th>Equipo</th>
            <th>Puntos</th>
            <th>PJ</th>
            <th>PG</th>
            <th>PE</th>
            <th>PP</th>
            <th>GF</th>
            <th>GC</th>
            <th>DG</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($positions as $position)
        <tr>
            <td>{{ $position->position_team }}</td>
            <td>{{ $position->soccer_team->name_team }}</td>
            <td>{{ $position->puntos_team }}</td>
            <td>{{ $position->pjugados_team }}</td>
            <td>{{ $position->pg_team }}</td>
            <td>{{ $position->pe_team }}</td>
            <td>{{ $position->pp_team }}</td>
            <td>{{ $position->gf_team }}</td>
            <td>{{ $position->gc_team }}</td>
            <td>{{ $position->gd_team }}</td>
            
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>