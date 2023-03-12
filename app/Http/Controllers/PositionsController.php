<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use App\Models\Position;
use Illuminate\Support\Facades\DB;
use App\Models\SoccerTeams;
use Illuminate\Http\Request;

class PositionsController extends Controller
{
    public function index()
    {
        $positions = DB::table('positions')->orderBy('puntos_team','asc')->get();
        $positions = Position::with('soccer_team')->get();
        return view('positions.index', ['positions' => $positions]);
    }

    public function update()
   {
       $matches = Matches::whereNotNull('goals_local')->get();

       foreach ($matches as $match) {
           Position::updatePositions($match);
       }

       return redirect()->route('positions.index');
   }
}

