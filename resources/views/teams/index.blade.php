<!DOCTYPE html>
<html lang="en" data-theme="emerald">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('storage\favicon.svg')}}" type="image/svg">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.46.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- GOOGLE FONTS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+One&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('storage\icon.png')}}">
    <title>Bellavista | Equipos</title>
</head>
 {{-- class='bg-[url({{asset("/storage/form-background.jpg")}})] bg-no-repeat bg-center bg-cover relative min-h-screen' --}}
<body style="font-family: 'Mochiy Pop One', sans-serif;">
  <div class="grid gap-4 place-content-center h-screen grid-cols-4 md:grid-cols-3 lg:grid-cols-2">
    <a href="{{ route('teams.create') }}" class="btn btn-primary transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300">CREAR UN EQUIPO</button>
      <a href="{{ route('admin.index') }}" class="btn btn-primary transition ease-in-out delay-150 bg-green-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300">Volver al Panel Administrativo</a>
    @foreach ($teams as $description_team => $name_team)
    <div class="card w-96 bg-primary shadow-xl">
        <figure><img src="/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" /></figure>
        <div class="card-body">
          <h2 class="card-title">{{ $name_team }}</h2>
          <p>{{ $description_team }}</p>
          <div class="card-actions justify-end">
            <button class="btn btn-secondary">Buy Now</button>
          </div>
        </div>
    </div>
    @endforeach
  <div>
</body>
</html>