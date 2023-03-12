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
    <div class="h-full">
        @if(Auth::check() && Auth::user()->roles_id == 2)
        <div class="pt-3 text-gray-900 dark:text-gray-100 text-3xl text-center">Listado de Tus Jugadores</div>
        <div class="flex justify-end px-10">
            <a href="{{ route('player.create') }}" class="btn btn-primary transition ease-in-out delay-150 bg-secondary hover:-translate-y-1 hover:scale-110 hover:bg-indigo-200 duration-100 my-10 h-20 border-none rounded-md">
                <img src=" {{ url('/storage/add_player.png') }}"/>
            </a>
        </div>
            @if (count($players) > 0)
            <div class='grid grid-cols-4 gap-3 mx-3'>
                @foreach ($players as $player)
                    <div class='w-96 max-w-md mx-auto bg-white rounded-3xl shadow-xl overflow-hidden '>
                        <div class='max-w-md mx-auto'>
                        <div class='h-[200px]' style='background-image:url({{ $users[$loop->index]->avatar }});background-size:cover;background-position:center'>
                            </div>
                        <div class='p-4 sm:p-6'>
                            <p class='font-bold text-gray-700 text-[22px] leading-7 mb-1 text-center'>{{ $users[$loop->index]->user_name}} {{$users[$loop->index]->surname_user}}</p>
                            <div class='flex flex-row'>
                            <p class='text-[17px] font-bold text-[#0FB478] mt-2'>Datos Personales</p>
                            </div>
                            <div class="flex"><p class="mr-2">CI:</p><p class='text-gray-500 font-[15px]'>{{ $player->ci_player }}</p></div>
                            <div class="flex"><p class="mr-2">Edad:</p><p class='text-gray-500 font-[15px]'>{{ $player->age }}</p></div>
                            <div class="flex"><p class="mr-2">Correo:</p><p class='text-gray-500 font-[15px]'>{{ $users[$loop->index]->email }}</p></div>
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

        @if(Auth::check() && Auth::user()->roles_id == 3)
        <div class="px-3 md:lg:xl:px-40  border-t border-b py-20 bg-opacity-10" style="background-image: url('https://www.toptal.com/designers/subtlepatterns/uploads/dot-grid.png');">
            <div class="grid grid-cols-1 md:lg:xl:grid-cols-3 group bg-white shadow-xl shadow-neutral-100 border ">
                <a href="{{ route('teams.index') }}"">
                    <div class="p-10 flex flex-col items-center text-center group   md:lg:xl:border-b hover:bg-slate-50 cursor-pointer">
                        <span class="p-5 rounded-full bg-yellow-500 text-white shadow-lg shadow-yellow-200"><svg
                                xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                            </svg></span>
                        <p class="text-xl font-medium text-slate-700 mt-3">Equipos</p>
                        <p class="mt-2 text-sm text-slate-500">Ver y Crear nuevos equipos para la Liga Barrial Bellavista</p>
                    </div>
                </a>
              <a href="{{ route('president.index') }}">
                <div
                    class="p-10 flex flex-col items-center text-center group md:lg:xl:border-r md:lg:xl:border-b hover:bg-slate-50 cursor-pointer">
                    <span class="p-5 rounded-full bg-orange-500 text-white shadow-lg shadow-orange-200"><svg
                            xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.5">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg></span>
                    <p class="text-xl font-medium text-slate-700 mt-3">Presidentes de Equipo</p>
                    <p class="mt-2 text-sm text-slate-500">Ver y Crear Presidentes para todos los equipos de la Liga Barrial Bellavista</p>
                </div>
              </a>
            </div>
        </div>
        @endif
    </div>
</x-app-layout>
@endsection