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
<body style="font-family: 'Mochiy Pop One', sans-serif; background-image: url('https://www.toptal.com/designers/subtlepatterns/uploads/dot-grid.png');">
    <main class="h-screen">
        @if(Auth::check() && Auth::user()->roles_id == 1)
            <a href="{{ route('admin.index') }}" class="btn btn-primary ml-5 mt-5 bg-green-500 hover:bg-green-400 border-none rounded-md">
            Panel Administrativo
            </a>
            {{-- <div class="flex justify-end px-10">
                <a href="{{ route('president.create') }}" class="btn btn-primary transition ease-in-out delay-150 bg-secondary hover:-translate-y-1 hover:scale-110 hover:bg-indigo-200 duration-100 my-10 h-20 border-none rounded-md">
                    <img src=" {{ url('/storage/add_president_team.png') }}"/>
                </a>
            </div> --}}
        @endif
        @if (Session::has('message'))
            <div class="mx-96 px-48 pt-3">
                <div class="p-4 mb-4 mt-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
                    <span class="font-bold text-1xl">{{ Session::get('message') }} </span> 
                </div>
            </div>
        @endif
        @if(Auth::check() && Auth::user()->roles_id != 1 && Auth::user()->roles_id != 2 && Auth::user()->roles_id != 3)
        <a href="{{ route('teams.index') }}" class="btn btn-primary ml-5 mt-5 bg-green-500 hover:bg-green-400 border-none rounded-md">
            Volver Al Inicio
        </a>
        @endif

        @if(Auth::check() && Auth::user()->roles_id == 2 || Auth::check() && Auth::user()->roles_id == 3)
            <a href="{{ route('dashboard') }}" class="btn btn-primary ml-5 mt-5 bg-green-500 hover:bg-green-400 border-none rounded-md">
                Volver Al Inicio
            </a>
        @endif



        @guest
        <a href="{{ route('teams.index') }}" class="btn btn-primary ml-5 mt-5 bg-green-500 hover:bg-green-400 border-none rounded-md">
            Volver Al Inicio
        </a>
        @endguest
        
        @if(Auth::check() && Auth::user()->roles_id == 3)
        <div class="flex justify-end px-10">
            <a href="{{ route('president.create') }}" class="btn btn-primary transition ease-in-out delay-150 bg-secondary hover:-translate-y-1 hover:scale-110 hover:bg-indigo-200 duration-100 my-10 h-20 border-none rounded-md">
                <img src=" {{ url('/storage/add_president_team.png') }}"/>
            </a>
        </div>
        @endif
        <h1 class="font-bold text-3xl text-center text-gray-500">Presidentes De Equipos</h1>
        @if(count($presidents_teams) > 0)
        <div class="overflow-x-auto w-full px-16 pt-4">
            <table class="table w-full">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Equipo</th>
                    @if(Auth::check() && Auth::user()->roles_id == 1 || Auth::user()->roles_id == 3)
                        <th>Acciones</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($presidents_teams as $user_name => $data)
                    <tr>
                        <td>
                            {{-- <div class="flex pl-8"> --}}
                                <div class="avatar">
                                    <div class="mask mask-squircle w-32 h-32">
                                    <img src="{{ $data[2] }}"/>
                                    </div>
                                </div>
                            
                            {{-- </div> --}}
                        </td>
                        <td>
                            {{ $data[0] }}
                            <br/>
                            <span class="badge badge-primary bagde-md badge-sm bg-color-secondary">Presidente de Equipo</span>
                        </td>
                        <td>
                            <div>
                                <div class="font-normal">{{ $user_name }}</div>
                            </div>
                        </td>
                        <td>
                            {{ $data[1] }}
                        </td>
                        @if(Auth::check() && Auth::user()->roles_id == 1 || Auth::user()->roles_id == 3)
                            <td>
                                <a target='_blank' href='foodiesapp://food/1001' class='block mt-3 w-28 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform bg-blue-400 rounded-[14px] hover:bg-blue-500 focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80'>
                                    Editar
                                </a>
                                <a target='_blank' href="https://apps.apple.com/us/app/id1493631471" class='block mt-1.5 w-28 px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform rounded-[14px] bg-red-500 hover:bg-red-600 hover:text-[#000000dd] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80'>
                                    Eliminar
                                </a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        @else
            <h3 class="font-bold text-3xl text-center text-red-500 py-20">No existen Presidentes de Equipos Aún 🤵</h3>
        @endif
    </main>
</body>
</html>