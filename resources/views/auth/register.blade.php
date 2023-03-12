@extends('layouts.layout')
@section('subtitle', 'Registro')
@section('content')
<!-- component -->
    <!-- Container -->
    <div class="container mx-auto py-40">
        <div class="flex justify-center px-6">
            <!-- Row -->
            <div class="w-full xl:w-3/4 lg:w-11/12 flex">
                <!-- Col -->
                <div
                    class="w-full h-auto bg-gray-400 hidden lg:block lg:w-5/12 bg-cover rounded-l-lg"
                    style="background-image: url('/storage/form-image.png')"
                ></div>
                <!-- Col -->
                <div class="w-full lg:w-7/12 bg-sky-200 p-5 rounded-lg lg:rounded-l-none bg-opacity-80">
                    <h3 class="pt-4 text-2xl text-center text-sky-900">Crea Una Cuenta!</h3>
                    <form class="px-8 pt-6 pb-8 bg-sky-200 bg-opacity-10 rounded" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-4 md:flex md:justify-between">
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-500" for="user_name">
                                    Nombre
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-black bg-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="user_name"
                                    type="text"
                                    placeholder="Ej. Carlos"
                                    name="user_name"
                                    required
                                    maxlength="10"
                                />
                            </div>

                            <div class="md:ml-1">
                                <label class="block mb-2 text-sm font-bold text-gray-500" for="lastName">
                                    Apellido
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-black bg-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="surname_user"
                                    type="text"
                                    placeholder="Ej. Oliveira"
                                    name="surname_user"
                                    required
                                    maxlength="15"
                                />
                            </div>

                            <div class="md:ml-3">
                                <label class="block mb-2 text-sm font-bold text-gray-500" for="lastName">
                                    Nickname
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-black bg-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="nickname_user"
                                    type="text"
                                    placeholder="Ej. carlos12"
                                    name="nickname_user"
                                    maxlength="10"
                                    required
                                />
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-500" for="email">
                                Correo
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-black bg-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="email"
                                type="email"
                                placeholder="carlos@gmail.com"
                                name="email"
                                required
                            />
                        </div>

                        <div class="mb-4 md:flex md:justify-between">
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-500" for="password">
                                    Contraseña
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-black bg-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    type="password"
                                    placeholder="******************"
                                    name="password"
                                    required
                                />
                                
                            </div>
                            <div class="md:ml-2">
                                <label class="block mb-2 text-sm font-bold text-gray-500" for="c_password">
                                    Confirmar Contraseña
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-black bg-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    type="password"
                                    placeholder="******************"
                                    name="password_confirmation"
                                    required
                                />
                            </div>
                        </div>
                        <div class="mb-6 text-center">
                            <button
                                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                type="submit"
                            >
                                Registra Tu Cuenta
                            </button>
                        </div>
                        <hr class="border-t bg-white" />
                        <div class="py-3 text-center">
                            <a
                                class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                href="{{ route('login') }}"
                            >
                                Ya tienes una cuenta? Inicia Sesión!
                            </a>
                        </div>
                        <hr class="border-t bg-white mb-7" />
                        <div class="text-center">
                            <a
                                class="inline-block text-sm text-teal-600 align-baseline hover:text-teal-800"
                                href="{{ route('posts.index') }}"
                            >
                                Vuelve al Inicio
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection