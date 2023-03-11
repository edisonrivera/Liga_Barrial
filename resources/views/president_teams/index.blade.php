<!DOCTYPE html>
<html lang="es" class="scroll-smooth" data-theme="cupcake">
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
    <main>
        <a href="{{ route('admin.index') }}" class="btn btn-primary ml-5 mt-5 bg-green-500 hover:bg-green-400 border-none rounded-md">
            Panel Administrativo
        </a>
        @if (Session::has('message'))
        <div class="mx-96 px-48 pt-3">
            <div class="p-4 mb-4 mt-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
                <span class="font-bold text-1xl">{{ Session::get('message') }} </span> 
            </div>
        </div>
        @endif
        <div class="flex justify-end px-10">
            <a href="{{ route('president.create') }}" class="btn btn-primary transition ease-in-out delay-150 bg-secondary hover:-translate-y-1 hover:scale-110 hover:bg-indigo-200 duration-100 my-10 h-20 border-none rounded-md">
                <img src=" {{ url('/storage/add_president_team.png') }}"/>
            </a>
        </div>
        <h1 class="font-bold text-3xl text-center text-gray-500">Presidentes De Equipos</h1>
        <div class="overflow-x-auto w-full px-10 pt-4">
            <table class="table w-full">
            <thead>
                <tr>
                <th></th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Equipo</th>
                <th>Acciones</th>
                <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($presidents_teams as $user_name => $data)
                    <tr>
                        <td>
                            <div class="flex items-center space-x-3">
                                <div class="avatar">
                                    <div class="mask mask-squircle w-12 h-12">
                                    <img src="/tailwind-css-component-profile-2@56w.png"/>
                                    </div>
                                </div>
                            
                            </div>
                        </td>
                    <td>
                        {{ $data[0] }}
                        <br/>
                        <span class="badge badge-primary bagde-md badge-sm bg-color-secondary">Presidente de $Equipo</span>
                    </td>
                    <td>
                        <div>
                            <div class="font-normal">{{ $user_name }}</div>
                        </div>
                    </td>
                    <th>
                        {{ $data[1] }}
                    </th>
                    <th>
                        <button class="btn btn-ghost btn-xs">$Acciones</button>
                    </th>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </main>
</body>
</html>