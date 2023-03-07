@extends('layouts.layout')
@section('subtitle', 'Recuperar Contraseña')
@section('content')
<div class="container mx-auto pt-56">
    <div class="flex justify-center px-6">
        <!-- Row -->
        <div class="w-full xl:w-3/4 lg:w-11/12 flex">
            <!-- Col -->
            <div
                class="w-full h-auto bg-gray-400 hidden lg:block lg:w-5/12 bg-cover rounded-l-lg"
                style="background-image: url('/storage/form-reset-password.png')"
            ></div>
            <!-- Col -->
            <div class="w-full lg:w-7/12 bg-orange-400 p-5 rounded-lg lg:rounded-l-none bg-opacity-90">
                <h3 class="pt-4 text-2xl text-center text-black py-4">Recuperar Tu Contraseña</h3>
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div>
                        <label class="block mb-2 text-sm font-bold text-gray-100" for="password">Correo Electrónico</label>
                        <x-text-input id="email" class="w-full px-3 py-2 mb-3 text-sm leading-tight text-black bg-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    

                    <!-- Password -->
                    <div class="mt-4">
                        <label class="block mb-2 text-sm font-bold text-gray-100" for="password">Nueva Contraseña</label>
                        <x-text-input id="password" class="w-full px-3 py-2 mb-3 text-sm leading-tight text-black bg-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <label class="block mb-2 text-sm font-bold text-gray-100" for="password">Confirmar Contraseña</label>

                        <x-text-input id="password_confirmation" class="w-full px-3 py-2 mb-3 text-sm leading-tight text-black bg-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            type="password"
                                            name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button>
                            {{ __('Cambiar Constraseña') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection