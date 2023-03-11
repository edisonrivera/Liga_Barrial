<!DOCTYPE html>
<html lang="es" class="scroll-smooth" data-theme="bumblebee">
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
        <title>Bellavista | @yield('subtitle')</title>
    </head>
    <body style="font-family: 'Mochiy Pop One', sans-serif;" class="relative min-h-screen pb-40">
        @include('partials.navbar')
        <main class="relative">
            @yield('content')
        </main>
        @include('partials.footer')
    </body>
</html>