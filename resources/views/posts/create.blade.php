@extends('layouts.layout')
@section('subtitle', 'Registro')
@section('content')
<div class="container mx-auto py-32">
    <div class="flex justify-center">
        <div class="w-2/3 bg-sky-200 p-1 rounded-lg lg:rounded-l-none bg-opacity-80">
            <h3 class="pt-4 text-2xl text-center text-sky-900">Un Nuevo Post Se Creará</h3>
            <form class="px-8 pt-6 pb-8 bg-sky-200 bg-opacity-10 rounded" method="POST" enctype='multipart/form-data'  action="{{ route('posts.index') }}">
                @csrf
                @include('posts.form')
            </form>
        </div>
    </div>
</div>
@endsection