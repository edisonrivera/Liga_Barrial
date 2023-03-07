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
    <title>Bellavista | Secretarios</title>
</head>
<body style="font-family: 'Mochiy Pop One', sans-serif;">
    <main>
        @if (Session::has('message'))
            <div class="p-4 mb-4 mx-12 mt-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
                <span class="font-medium">{{ Session::get('message') }} </span> 
            </div>
        @endif
        <a href="{{ route('secretaries.create') }}" class="btn btn-primary transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300">CREAR UN SECRETARIO</a>
        <a href="{{ route('admin.index') }}" class="btn btn-primary transition ease-in-out delay-150 bg-green-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300">Volver al Panel Administrativo</a>
        <div class="overflow-x-auto w-full">
            <table class="table w-full">
            <thead>
                <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Equipo</th>
                <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($secretaries as $user_name => $email)
                    <tr>
                    <td>
                        <div class="flex items-center space-x-3">
                        <div class="avatar">
                            <div class="mask mask-squircle w-12 h-12">
                            <img src="/tailwind-css-component-profile-2@56w.png" alt="Avatar Tailwind CSS Component" />
                            </div>
                        </div>
                        <div>
                            <div class="font-bold">{{ $user_name }}</div>
                        </div>
                        </div>
                    </td>
                    <td>
                        {{ $email }}
                        <br/>
                        <span class="badge badge-ghost badge-sm">Secretario en $Equipo</span>
                    </td>
                    <td>
                        <div>
                            <div class="font-bold">$NOMBRE EQUIPO</div>
                        </div>
                    </td>
                    <th>
                        <button class="btn btn-ghost btn-xs">Acciones</button>
                    </th>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </main>
</body>
</html>