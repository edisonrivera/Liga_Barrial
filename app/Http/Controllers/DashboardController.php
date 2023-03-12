<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PresidentTeam;
use App\Models\Players;
use App\Models\SoccerTeams;
use App\Models\User;
class DashboardController extends Controller
{
    public function index(){
        $loggedUser = Auth::user();
        if($loggedUser->roles_id==2){
            $loggedUserId = $loggedUser->id;
            $presidentTeams = PresidentTeam::where('user_id', $loggedUserId)->pluck('id');
            $team = SoccerTeams::where('president_team', $presidentTeams)->get('code_soccer_team');
            $players = Players::whereIn('code_team', $team)->get();
            $user_ids = $players->pluck('user_id')->unique();
            $users = User::whereIn('id', $user_ids->values())->get();
            return view('/dashboard', ['players' => $players], ['users' => $users]);
        }
        return view('/dashboard');
    }
}