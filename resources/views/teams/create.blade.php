@extends('layouts.layout')
@section('subtitle', 'Registro')
@section('content')

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
<div class="container mx-auto py-20">
    <div class="flex justify-center px-6">
        <!-- Row -->
        <div class="w-full xl:w-3/4 lg:w-11/12 flex">
            <!-- Col -->
            <div
                class="w-full h-auto bg-gray-400 hidden lg:block lg:w-5/12 bg-cover rounded-l-lg"
                style="background-image: url('/storage/form-register-team.png')"
            ></div>
            <!-- Col -->
            
            <div class="w-full lg:w-7/12 bg-sky-200 p-5 rounded-lg lg:rounded-l-none bg-opacity-80">
                <h3 class="pt-4 text-2xl text-center text-sky-900">Registro un Equipo</h3>
                <form class="px-8 pt-6 pb-8 bg-sky-200 bg-opacity-10 rounded" method="POST" enctype='multipart/form-data'  action="{{ route('teams.register') }}">
                    @csrf
                    @include('teams.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
