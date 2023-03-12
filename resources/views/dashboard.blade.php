@extends('layouts.template')
@section('subtitle', 'Inicio')
@section('content')
<x-app-layout>
    <div class="pt-36 px-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 md:px-4 px-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Bienvenido") }} {{ Auth::user()->user_name }} !
                </div>
            </div>  
        </div>
    </div>
    <div class="pt-3 text-gray-900 dark:text-gray-100 text-3xl text-center"> Listado de Tus Jugadores</div>
    <div class="h-full">
        @if(Auth::check() && Auth::user()->roles_id == 2)
        <div class="flex justify-end px-10">
            <a href="{{ route('player.create') }}" class="btn btn-primary transition ease-in-out delay-150 bg-secondary hover:-translate-y-1 hover:scale-110 hover:bg-indigo-200 duration-100 my-10 h-20 border-none rounded-md">
                <img src=" {{ url('/storage/add_player.png') }}"/>
            </a>
        </div>
            @if (count($players) > 0)
            <div class='grid grid-cols-4 gap-3 mx-2'>
                @foreach ($players as $player)
                    <div class='w-96 max-w-md  mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>
                        <div class='max-w-md mx-auto'>
                        <div class='h-[200px]' style='background-image:url({{ $users[$loop->index]->avatar }});background-size:cover;background-position:center'>
                            </div>
                        <div class='p-4 sm:p-6'>
                            <p class='font-bold text-gray-700 text-[22px] leading-7 mb-1 text-center'>{{ $users[$loop->index]->user_name}} {{$users[$loop->index]->surname_user}}</p>
                            <div class='flex flex-row'>
                            <p class='text-[17px] font-bold text-[#0FB478] mt-2'>Datos Personales</p>
                            </div>
                            <div class="flex"><p class="my-1 mr-2">CI:</p><p class='text-gray-500 font-[15px] my-1'>{{ $player->ci_player }}</p></div>
                            <div class="flex"><p class="my-1 mr-2">Edad:</p><p class='text-gray-500 font-[15px] my-1'>{{ $player->age }}</p></div>
                            <div class="flex"><p class="my-1 mr-2">Correo:</p><p class='text-gray-500 font-[15px] my-1'>{{ $users[$loop->index]->email }}</p></div>
                            <a target='_blank' href='foodiesapp://food/1001' class='block mt-3 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform bg-[#FFC933] rounded-[14px] hover:bg-[#FFC933DD] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80'>
                                Editar
                            </a>
                            <a target='_blank' href="https://apps.apple.com/us/app/id1493631471" class='block mt-1.5 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform rounded-[14px] bg-red-500 hover:text-[#000000dd] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80'>
                                Eliminar
                            </a>
                        </div>
                        </div>
                    </div>
                @endforeach 
            </div>
            @else
                <h3 class="font-bold text-3xl text-center text-red-500 py-20">No existen Jugadores Aún 🛑</h3>
            @endif              
        @endif
    </div>
</x-app-layout>
@endsection