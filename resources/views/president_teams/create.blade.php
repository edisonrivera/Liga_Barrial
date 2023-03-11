@extends('layouts.layout')
@section('subtitle', 'Registro')
@section('content')
<!-- component -->
    <div class="absolute px-10 md:px-80 lg:px-auto pt-4">
        @if(count($errors)>0)
            <div class="alert alert-error shadow-lg">
                <div>
                    <ul>
                        @foreach( $errors -> all() as $error)
                        <li class="flex flex-row">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span class="px-4">{{$error}}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>
    <!-- Container -->
    <div class="container mx-auto py-40">
        <div class="flex justify-center px-6">
            <!-- Row -->
            <div class="w-full xl:w-3/4 lg:w-11/12 flex">
                <!-- Col -->
                <div
                    class="w-full h-auto bg-orange-400 hidden lg:block lg:w-5/12 bg-cover rounded-l-lg"
                    style="background-image: url('/storage/form-register-president.png')"
                ></div>
                <!-- Col -->
                <div class="w-full lg:w-7/12 bg-orange-300 p-5 rounded-lg lg:rounded-l-none bg-opacity-80">
                    <h3 class="pt-4 text-2xl text-center text-sky-900 font-bold">Formulario 📄</h3>
                    <form class="px-8 pt-6 pb-8 bg-sky-200 bg-opacity-10 rounded" method="POST" action="{{ route('president.register') }}">
                        @csrf
                        <div class="mb-4 md:flex md:justify-between">
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-black" for="user_name">
                                    Nombre
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-black bg-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="user_name"
                                    type="text"
                                    placeholder="Ej. Carlos"
                                    name="user_name"
                                    required
                                    maxlength="15"
                                    onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122))"
                                />
                            </div>

                            <div class="md:ml-1">
                                <label class="block mb-2 text-sm font-bold text-black" for="lastName">
                                    Apellido
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-black bg-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="surname_user"
                                    type="text"
                                    placeholder="Ej. Oliveira"
                                    name="surname_user"
                                    required
                                    maxlength="20"
                                    onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) )"
                                />
                            </div>

                            <div class="md:mr-1">
                                
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-black" for="email">
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
                                <label class="block mb-2 text-sm font-bold text-black" for="password">
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
                                <label class="block mb-2 text-sm font-bold text-black" for="c_password">
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
                                Registrar
                            </button>
                        </div>
                        <hr class="border-t bg-white" />
                        <div class="text-center my-5">
                            <a
                                class="inline-block text-sm text-blue-500 align-baseline hover:text-teal-800 font-bold"
                                href="{{ route('president.index') }}"
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