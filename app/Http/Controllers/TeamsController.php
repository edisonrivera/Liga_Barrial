<?php

namespace App\Http\Controllers;
use App\Models\SoccerTeams;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\SoccerTeam;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Auth\Events\Registered;


class TeamsController extends Controller
{
    public function index(){
        $teams = DB::table('soccer_teams')->pluck('name_team', 'description_team');
        return view('teams.index', ['teams' => $teams]);
    }

    public function create()
    {
        $presidents = DB::table('president_teams')
                        ->join('users', 'users.id', '=', 'president_teams.user_id')
                        ->pluck('users.user_name', 'president_teams.id');
        return view ('teams.create', ['presidents' => $presidents]);
    }

    public function store(Request $request)
    {
        //! Registro: Usuario
        $fields = ([
            'code_soccer_team' => ['required', 'string', 'max:10'],
            'name_team' => ['required', 'string', 'max:50'],
            'logo_team' => 'required'| 'mimes:jpeg,png,svg,jpg',
            'fundation_date_team' => 'required|date',
            'description_team' => 'required|string|min:10',
        ]);
        //! Mensajes de Error
        $messages = [
            'code_soccer_team.required' => "El equipo debe tener código",
            'name_team.max' => "El nombre de quipo debe ser máximo de 50 caracteres",
            'name_team.required' => "El nombre de quipo es requerido",
            'logo_team.required' => "El equipo debe tener un logo",
            'logo_team.mimes' => "El logo debe ser tipo svg, png, jpg o jpeg",
            'fundation_date_team.required' => "Se requiere la fecha de fundación del equipo",
            'description_team' => "Falta la descripción del equipo"
        ];

    
        //imagen con Cloudinary
        $image = request()->file('logo_team');
        $result = Cloudinary::upload($image->getRealPath(),['folder'=>'my_posts',
                                        'public_id'=>uniqid()]);
        $url = $result->getSecurePath();
        

        $soccer_team = SoccerTeams::create([
            'code_soccer_team' => $request->code_soccer_team,
            'name_team' => $request->name_team,
            'president_team' => $request->input("president_team"),
            'logo_team' => $url,
            'fundation_date_team' => $request->fundation_date_team,
            'description_team' => $request->description_team
        ]);

        event(new Registered($soccer_team));
        return redirect('/teams/index')->with("message", "Equipo Creado! ⚽");
    }
}