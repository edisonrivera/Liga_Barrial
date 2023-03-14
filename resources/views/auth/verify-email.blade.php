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
        <title>Bellavista | Verificar Email</title>
    </head>
    <body style="font-family: 'Mochiy Pop One', sans-serif;" class='bg-slate-100'>
        <div class="grid place-content-center py-52">
            <div class="card-body w-96 px-12 md:px-12 bg-slate-200 rounded-lg shadow-xl">
                <h2 class="card-title px-2 text-blue-500">Gracias por registrarte!</h2>
                <div class="mb-4">
                    <div class="mb-4 text-sm text-gray-900 dark:text-gray-800">
                        {{ __('Antes de comenzar, ¿podría verificar su dirección de correo electrónico haciendo clic en el enlace que le acabamos de enviar? Si no recibiste el correo electrónico, con gusto te enviaremos otro.') }}
                    </div>

                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionó durante el registro.') }}
                        </div>
                    @endif

                    <div class="mt-4 flex items-center justify-between">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <div>
                                <button class="btn btn-info text-xs w-48">
                                    {{ __('Reenviar correo de verificación') }}
                                <button>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                {{ __('Salir') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>