@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Resultados</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('matches_teams.create') }}"> Crear nuevo resultado</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Partido</th>
            <th>Equipo Local</th>
            <th>Equipo Visitante</th>
            <th>Marcador Local</th>
            <th>Marcador Visitante</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($matches_teams as $match_teams)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $match_teams->match_id }}</td>
            <td>{{ $match_teams->name_team_local }}</td>
            <td>{{ $match_teams->name_team_visit }}</td>
            <td>{{ $match_teams->goals_local }}</td>
            <td>{{ $match_teams->goals_visit }}</td>
            <td>{{ $match_teams->date_match }}</td>
            <td>{{ $match_teams->time_match }}</td>
            <td>
                <form action="{{ route('matches_teams.destroy',$matches_teams->id) }}" method="POST">

                    <a class="btn btn-primary" href="{{ route('matches_teams.edit',$matches_teams->id) }}">Editar</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $matches_teams->links() !!}

@endsection