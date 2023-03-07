@extends('layouts.layout')
@section('subtitle', 'Registro')
@section('content')
<div class="container mx-auto py-32">
    <div class="flex justify-center">
        <div class="w-2/3 bg-sky-200 p-1 rounded-lg lg:rounded-l-none bg-opacity-80">
            <h3 class="pt-4 text-2xl text-center text-sky-900">Un Nuevo Post Se Creará</h3>
            <form class="px-8 pt-6 pb-8 bg-sky-200 bg-opacity-10 rounded" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-4">
                    <div class="mb-4 md:mr-2 md:mb-0">
                        <label class="block mb-2 text-sm font-bold text-gray-500" for="user_name">
                            Título
                        </label>
                        <input
                            class="w-full px-3 py-2 text-sm leading-tight text-black bg-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="user_name"
                            type="text"
                            placeholder="Ej. Un Nuevo Campeonato se acerca..."
                            name="user_name"
                            required
                            maxlength="12"
                        />
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-bold text-gray-500" for="email">
                        Contenido
                    </label>
                    <textarea class="textarea w-full bg-white text-black" placeholder="El torneo inicia el ..."></textarea>
                </div>

                <div class="mb-4 mx-auto">
                    <div class="w-full">
                        <label class="label">
                            <span class="block mb-2 text-sm font-bold text-gray-500">Escoge una Imagen</span>
                            <input type="file" class="file-input file-input-bordered w-full max-w-xs" />
                        </label>
                    </div>
                </div>
                
                
                <div class="grid mx-auto mb-6 text-center w-1/4">
                    <button
                        class="w-full px-4 py-2 font-bold text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:outline-none focus:shadow-outline"
                        type="submit"
                    >
                        Sube Tu Post!
                    </button>
                </div>
                <hr class="border-t bg-white" />
                
                <hr class="border-t bg-white mb-7" />
                <div class="text-center">
                    <a
                        class="inline-block text-sm text-teal-600 align-baseline hover:text-teal-800"
                        href="{{ route('welcome') }}"
                    >
                        Vuelve al Inicio
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

