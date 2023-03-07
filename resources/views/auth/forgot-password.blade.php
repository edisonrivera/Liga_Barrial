<!DOCTYPE html>
<html lang="en" class="scroll-smooth" data-theme="forest">
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
    <title>Bellavista | Recuperar Contraseña</title>
</head>
<body style="font-family: 'Mochiy Pop One', sans-serif;" class='bg-[url({{asset("/storage/reset-password-background.jpg")}})] bg-no-repeat bg-center bg-cover relative min-h-screen'>
    <div class="grid place-content-center py-52">
        <div class="card-body w-96 px-12 md:px-12 bg-blue-900 rounded-lg">
            <h2 class="card-title px-2 text-white">Recuperar contraseña!</h2>
            <p class="py-6 text-center text-gray-100">No hay problema si olvidaste la contraseña. Pon tu correo electrónico y te enviaremos un link para cambiarla</p>

            <div class="mb-4">
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="grid justify-center">
                        <label class="block mb-2 text-sm font-bold text-teal-300 text-center" for="firstName">Correo Electrónico</label>
                        <input
                            class="w-60 px-3 py-2 text-sm leading-tight text-black bg-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="email"
                            type="email"
                            required autofocus autocomplete="username"
                            placeholder="Ej. carlos@gmail.com"
                            name="email"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="card-actions justify-center my-2">
                        <button class="btn bg-green-500 text-white hover:bg-green-700 border-none" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>