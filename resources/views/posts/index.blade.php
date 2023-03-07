<!--Ver post-->
@extends('layouts.template')
@section('subtitle', 'Inicio')
@section('content')
<!--Image-->
<div class="h-screen bg-gray-50 flex items-center">
	<section class="w-full bg-cover bg-center py-32" style="background-image: url({{asset('/storage/fono.jpg')}});">
		<div class="container mx-auto text-center text-white">
			<h1 class="text-5xl font-medium mb-6">Bienvenido!</h1>
			<p class="text-xl mb-12">Informate de todos los partidos que vienen</p>
			<a href="#" class="bg-indigo-500 text-white py-4 px-12 rounded-full hover:bg-indigo-600">Ver</a>
		</div>
	</section>
</div>
<!--Section post-->
<div class="p-12">
    <div class="card h-96 card-side glass hover:backdrop-saturate-50 hover:bg-black/30 hover:text-neutral-700 shadow-xl">
        <figure><img class="w-auto h-auto " src=""  alt="image" /></figure>
        <div class="card-body py-4">
            <h2 class="card-title italic text-2xl hover:text-stone-900">Aqui</h2>
            <p class="hover:text-stone-900 italic text-xl">texto</p>
            <h3 class="justify-start text-xl hover:text-stone-900">Publicado por: Secretario de que equipo</h3>
            <div class="card-actions justify-end">
        </div>
    </div>
</div>
@endsection



