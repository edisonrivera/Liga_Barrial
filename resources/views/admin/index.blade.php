<!DOCTYPE html>
<html lang="es">
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
    <title>Bellavista | Administrador</title>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-400">
        <main>
            <a href="{{ route('dashboard') }}" class="btn">Página de Inicio</a>
            <div class="grid h-screen place-content-center">
                  <div class="bg-white rounded-lg shadow-lg">
                    <div class="p-4">
                      <a href="{{ route('president.index') }}" class="text-lg font-semibold">Presidentes de Equipos</h2>
                      <p class="text-gray-600">Contenido de la tarjeta 1.</p>
                    </div>
                  </div>
                
                  <div class="bg-white rounded-lg shadow-lg">
                    <div class="p-4">
                        <a href="{{ route('player.index') }}" class="text-lg font-semibold">Jugadores</h2>
                      <p class="text-gray-600">Contenido de la tarjeta 2.</p>
                    </div>
                  </div>
                
                  <div class="bg-white rounded-lg shadow-lg">
                    <div class="p-4">
                        <a href="{{ route('teams.index') }}" class="text-lg font-semibold">Equipos</h2>
                      <p class="text-gray-600">Contenido de la tarjeta 3.</p>
                    </div>
                  </div>
                
                  <div class="bg-white rounded-lg shadow-lg">
                    <div class="p-4">
                        <a href="#Posts" class="text-lg font-semibold">Presidente de Asociación</h2>
                      <p class="text-gray-600">Contenido de la tarjeta 4.</p>
                    </div>
                  </div>
                
                  <div class="bg-white rounded-lg shadow-lg">
                    <div class="p-4">
                        <a href="#Presidente Asosiación" class="text-lg font-semibold">Posts</h2>
                      <p class="text-gray-600">Contenido de la tarjeta 5.</p>
                    </div>
                  </div>
              </div>
        </main>
    </body>
</html>