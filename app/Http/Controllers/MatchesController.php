<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matches;
use App\Models\SoccerTeams;

class MatchesController extends Controller
{
    public function index()
    {
        $matches = Matches::all();
        return view('matches.index', ['matches' => $matches]);
    }

    public function create()
    {
        $soccer_teams = SoccerTeams::all();
        return view('matches.index', ['matches' => $soccer_teams]);
    }

    public function store(Request $request)
    {
        $match = new Matches;
        $match->name_team_local = $request->name_team_local;
        $match->name_team_visit = $request->name_team_visit;
        $match->goals_local = $request->goals_local;
        $match->goals_visit = $request->goals_visit;
        $match->date_match = $request->date_match;
        $match->time_match = $request->time_match;
        $match->save();

        return redirect()->route('matches/index');
    }

    public function edit($id)
    {
        $match = Matches::find($id);
        $soccer_teams = SoccerTeams::all();
        return view('matches.edit', compact('matches', 'soccer_teams'));
    }

    public function update(Request $request, $id)
    {
        $match = Matches::find($id);
        $match->name_team_local = $request->name_team_local;
        $match->name_team_visit = $request->name_team_visit;
        $match->goals_local = $request->goals_local;
        $match->goals_visit = $request->goals_visit;
        $match->date_match = $request->date_match;
        $match->time_match = $request->time_match;
        $match->save();

        return redirect()->route('matches.index');
    }

    public function destroy($id)
    {
        $match = Matches::find($id);
        $match->delete();

        return redirect()->route('matches.index');
    }
}
