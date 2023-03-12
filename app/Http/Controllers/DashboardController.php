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
        // $players = DB::table('players')
        //                 ->join('users', 'users.id', '=', 'players.user_id')
        //                 ->join('president_teams', Auth::user()->id, '=', 'users.id')
        //                 ->pluck(DB::raw("CONCAT(users.user_name, ' ', users.surname_user) AS full_name"), 'users.email');

        // $images = DB::table('users')
        //                 ->join('players', 'players.user_id', '=', 'users.id')
        //                 ->pluck('users.avatar');

        // $player_ci = DB::table('players')->pluck('ci_player');
        // $player_age = DB::table('players')->pluck('age');

        // $data_show = new Collection();
        // $init = 0;
        // foreach($players as $user_name => $email){
        //     $data_show->put($user_name, [$email, $images[$init], $player_ci[0], $player_age[0]]);
        //     $init++;
        // };

        $loggedUser = Auth::user();
        $loggedUserId = $loggedUser->id;
        $presidentTeams = PresidentTeam::where('user_id', $loggedUserId)->pluck('id');
        $team = SoccerTeams::where('president_team', $presidentTeams)->get('code_soccer_team');
        $players = Players::whereIn('code_team', $team)->get();
        
        $user_ids = $players->pluck('user_id')->unique();
        
        $users = User::whereIn('id', $user_ids->values())->get();


        return view('/dashboard', ['players' => $players], ['users' => $users]);
    }
}
