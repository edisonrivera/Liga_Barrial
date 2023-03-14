@extends('layouts.layout')
@section('subtitle', 'Inicia Sesión')
@section('content')
<x-auth-session-status class="mb-4" :status="session('status')" />
<!-- component -->
    <!-- Container -->
    <div class="container mx-auto pt-48">
        <div class="flex justify-center px-6">
            <!-- Row -->
            <div class="w-full xl:w-3/4 lg:w-11/12 flex">
                <!-- Col -->
                <div
                    class="w-full h-auto bg-gray-400 hidden lg:block lg:w-5/12 bg-cover rounded-l-lg"
                    style="background-image: url('/storage/form-login.png')"
                ></div>
                <!-- Col -->
                <div class="w-full lg:w-7/12 bg-sky-300 p-5 rounded-lg lg:rounded-l-none bg-opacity-90">
                    <h3 class="pt-4 text-2xl text-center text-sky-900">Inicia Sesión</h3>
                    <form method="POST" action="{{ route('login') }}" class="px-8 pt-6 pb-8 bg-sky-200 bg-opacity-10 rounded">
                        @csrf

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-500" for="email">
                                Correo Electrónico
                            </label>
                            <input
                                class="w-full px-3 py-2 text-sm leading-tight text-black bg-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                name="email"
                                type="email"
                                required
                                placeholder="Ej. carlos@gmail.com"
                            />
                        </div>

                        
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-500" for="password">
                                Contraseña
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-black bg-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                type="password"
                                name="password"
                                placeholder="******************"
                                required
                            />
                        </div>

                        
                        <div class="mb-6 text-center">
                            <button
                                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                type="submit"
                            >
                                Iniciar Sesión
                            </button>
                        </div>

                        <hr class="border-t bg-white" />
                        <div class="text-center my-4">
                            @if (Route::has('password.request'))
                                <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800" href="{{ route('password.request') }}">
                                    Olvidaste la contraseña?
                                </a>
                            @endif
                            
                        </div>
                        <hr class="border-t bg-white mb-7" />
                        <div class="text-center">
                            <a class="inline-block text-sm text-teal-600 align-baseline hover:text-teal-800" href="{{ route('posts.index') }}">
                                Vuelve al Inicio
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection