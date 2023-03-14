@extends('layouts.template')

<div style="display: flex; align-items: center; justify-content: center; height: 100vh;">
    <table class="table mx-auto">
        <thead>
            <tr>
                <th>Posición</th>
                <th>Equipo</th>
                <th>Puntos</th>
                <th>PJ</th>
                <th>PG</th>
                <th>PE</th>
                <th>PP</th>
                <th>GF</th>
                <th>GC</th>
                <th>DG</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($positions as $position)
            <tr>
                <td>{{ $position->position_team }}</td>
                <td>{{ $position->soccer_team->name_team }}</td>
                <td>{{ $position->puntos_team }}</td>
                <td>{{ $position->pjugados_team }}</td>
                <td>{{ $position->pg_team }}</td>
                <td>{{ $position->pe_team }}</td>
                <td>{{ $position->pp_team }}</td>
                <td>{{ $position->gf_team }}</td>
                <td>{{ $position->gc_team }}</td>
                <td>{{ $position->gd_team }}</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

