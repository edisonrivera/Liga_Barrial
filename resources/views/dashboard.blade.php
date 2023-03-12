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
</x-app-layout>
@endsection