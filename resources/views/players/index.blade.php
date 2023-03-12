<!DOCTYPE html>
<html lang="es" data-theme="cupcake">
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
    <title>Bellavista | Registro Jugador</title>
</head>
{{--? class='bg-[url({{asset("/storage/form-background.jpg")}})] bg-no-repeat bg-center bg-cover relative min-h-screen --}}
<body style="font-family: 'Mochiy Pop One', sans-serif; background-image: url('https://www.toptal.com/designers/subtlepatterns/uploads/dot-grid.png');">
    <main class="h-screen">
        @if(Auth::check() && Auth::user()->roles_id == 1)
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
            {{-- <div class="flex justify-end px-10">
                <a href="{{ route('player.create') }}" class="btn btn-primary transition ease-in-out delay-150 bg-secondary hover:-translate-y-1 hover:scale-110 hover:bg-indigo-200 duration-100 my-10 h-20 border-none rounded-md">
                    <img src=" {{ url('/storage/add_player.png') }}"/>
                </a>
            </div> --}}
        @endif
        @if(Auth::check() && Auth::user()->roles_id != 1 && Auth::user()->roles_id != 2 && Auth::user()->roles_id != 3)
        <a href="{{ route('posts.index') }}" class="btn btn-primary ml-5 mt-5 bg-green-500 hover:bg-green-400 border-none rounded-md">
            Volver Al Inicio
        </a>
        @endif

        @if(Auth::check() && Auth::user()->roles_id == 2 || Auth::user()->roles_id == 3)
        <a href="{{ route('dashboard') }}" class="btn btn-primary ml-5 mt-5 bg-green-500 hover:bg-green-400 border-none rounded-md">
            Volver Al Inicio
        </a>
        @endif

        @guest
        <a href="{{ route('posts.index') }}" class="btn btn-primary ml-5 mt-5 bg-green-500 hover:bg-green-400 border-none rounded-md">
            Volver Al Inicio
        </a>
        @endguest
        <h1 class="font-bold text-3xl text-center text-gray-500 py-5">Jugadores</h1>
        @if (count($players) > 0)
            <div class='grid grid-cols-4 gap-1'>
            @foreach ($players as $username => $data)
                <div class='w-96 max-w-md  mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>
                    <div class='max-w-md mx-auto'>
                      <div class='h-[200px]' style='background-image:url({{ $data[1] }});background-size:cover;background-position:center'>
                        </div>
                      <div class='p-4 sm:p-6'>
                        <p class='font-bold text-gray-700 text-[22px] leading-7 mb-1 text-center'>{{ $data[0] }}</p>
                        <div class='flex flex-row'>
                          <p class='text-[17px] font-bold text-[#0FB478] mt-2'>Datos Personales</p>
                        </div>
                        <div class="flex"><p class="my-1 mr-2">CI:</p><p class='text-gray-500 font-[15px] my-1'>{{ $data[2] }}</p></div>
                        <div class="flex"><p class="my-1 mr-2">Edad:</p><p class='text-gray-500 font-[15px] my-1'>{{ $data[3] }}</p></div>
                        <div class="flex"><p class="my-1 mr-2">Correo:</p><p class='text-gray-500 font-[15px] my-1'>{{ $username }}</p></div>
                        @if(Auth::check() && Auth::user()->roles_id == 1)
                            <a target='_blank' href='foodiesapp://food/1001' class='block mt-3 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform bg-[#FFC933] rounded-[14px] hover:bg-[#FFC933DD] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80'>
                                Editar
                            </a>
                            <a target='_blank' href="https://apps.apple.com/us/app/id1493631471" class='block mt-1.5 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform rounded-[14px] bg-red-500 hover:text-[#000000dd] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80'>
                                Eliminar
                            </a>
                        @endif
                      </div>
                    </div>
                </div>
            @endforeach 
            </div>
        @else
            <h3 class="font-bold text-3xl text-center text-red-500 py-20">No existen Jugadores Aún 🛑</h3>
        @endif
    </main>
</body>
</html>