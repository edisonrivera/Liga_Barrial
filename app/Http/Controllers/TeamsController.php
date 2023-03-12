<?php

namespace App\Http\Controllers;
use App\Models\SoccerTeams;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rule;
use App\Models\PresidentTeam;

class TeamsController extends Controller
{
    public function index(){
        $teams = SoccerTeams::all();
        return view('teams.index', ['teams' => $teams]);
    }

    public function create()
    {
        $presidents = DB::table('president_teams')
                        ->where('president_teams.status', 0)
                        ->join('users', 'users.id', '=', 'president_teams.user_id')
                        ->pluck('users.user_name', 'president_teams.id');

        return view ('teams.create', ['presidents' => $presidents]);
    }

    public function store(Request $request)
    {
        //! Registro: Usuario
        $fields = ([
            'code_soccer_team' => ['required', 'string', 'max:10', 'unique:soccer_teams'],
            'name_team' => ['required', 'string', 'max:20'],
            'logo_team' => ['required', 'image'],
            'fundation_date_team' => 'required|date',
            'description_team' => 'required|string|min:10|max:255',
        ]);

        //! Mensajes de Error
        $messages = [
            'code_soccer_team.required' => "El equipo debe tener código",
            'code_soccer_team.unique' => "Código de Equipo ya en uso",
            'code_soccer.max' => "Código de Equipo debe contener máximo 10 caracteres",
            'name_team.max' => "El nombre de quipo debe ser máximo de 50 caracteres",
            'name_team.required' => "El nombre de equipo es requerido",
            'logo_team.required' => "El equipo debe tener un logo",
            'logo_team.image' => "El logo debe ser tipo svg, png, jpg o jpeg",
            'fundation_date_team.required' => "Se requiere la fecha de fundación del equipo",
            'description_team.required' => "Falta la descripción del equipo",
            'description_team.max' => "Descripción de Equipo debe contener menos de 256 caracteres",
            'description_team.min' => "Descripción de Equipo debe contener mínimo 10 caracteres"
        ];

        $this->validate($request, $fields, $messages);

        $image = request()->file('logo_team');
        $result = Cloudinary::upload($image->getRealPath(),['folder'=>'my_post']);
        $url = $result->getSecurePath();
        $public_id = $result->getPublicId();

        $soccer_team = SoccerTeams::create([
            'code_soccer_team' => $request->code_soccer_team,
            'name_team' => $request->name_team,
            'president_team' => $request->input("president_team"),
            'logo_team' => $url,
            'public_id' => $public_id,
            'fundation_date_team' => $request->fundation_date_team,
            'description_team' => $request->description_team
        ]);

        $president_asigned = PresidentTeam::where('id', $soccer_team->president_team)->get();
        $president_id = $president_asigned[0]->id;

        PresidentTeam::where('id','=', $president_id)->update(['status' => 1]);

        event(new Registered($soccer_team));
        return redirect('/teams/index')->with("message", "Equipo Creado! ⚽");
    }
}