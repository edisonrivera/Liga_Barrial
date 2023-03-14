<?php

namespace App\Http\Controllers;

use App\Models\Matches_Teams;
use Illuminate\Http\Request;

class Matches_TeamsController extends Controller
{
    public function index()
    {
        $matches_teams = Matches_Teams::all();
        //$matches_teams = Matches_Teams::with('match_id')->get();
        return view('matches_teams.index', ['matches_teams' => $matches_teams]);
    }

    public function create()
    {
        return view('matches_teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'match_id' => 'required',
            'name_team_local' => 'required',
            'name_team_visit' => 'required',
            'goals_local' => 'required|integer',
            'goals_visit' => 'required|integer',
            'date_match' => 'required|date',
            'time_match' => 'required',
        ]);

        Matches_Teams::create($request->all());

        return redirect()->route('matches_teams/index')
            ->with('success','Resultado creado exitosamente.');
    }

    public function edit(Matches_Teams $resultado)
    {
        return view('matches_teams.edit',compact('matches_teams'));
    }

    public function update(Request $request, Matches_Teams $resultado)
    {
        $request->validate([
            'match_id' => 'required',
            'name_team_local' => 'required',
            'name_team_visit' => 'required',
            'goals_local' => 'required|integer',
            'goals_visit' => 'required|integer',
            'date_match' => 'required|date',
            'time_match' => 'required',
        ]);

        $resultado->update($request->all());

        return redirect()->route('matches_teams.index')
            ->with('success','Resultado actualizado exitosamente.');
    }

    public function destroy(Matches_Teams $resultado)
    {
        $resultado->delete();

        return redirect()->route('matches_teams.index')
            ->with('success','Resultado eliminado exitosamente.');
    }
}
