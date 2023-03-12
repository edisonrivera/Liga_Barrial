<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Players;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PlayerAuthController extends Controller
{
    public function create(){
        $teams = DB::table('soccer_teams')->pluck('name_team', 'code_soccer_team');
        return view('players.create', ['teams' => $teams]);
    }

    public function index(){
        $players = DB::table('players')
                        ->join('users', 'users.id', '=', 'players.user_id')
                        ->pluck('users.user_name', 'users.email');

        return view('players.index', ['players' => $players]);
    }


    public function store(Request $request): RedirectResponse
    {
        //! Registro: Usuario
        $fields = ([
            'user_name' => ['required', 'string', 'max:15'],
            'nickname_user' => ['required', 'string', 'max:15'],
            'surname_user' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'ci_player' => 'required|unique:players,ci_player|min:10|max:10',
            'age' => ['required', 'numeric', 'min:18'],
            'born_date_player' => 'required|date',
        ]);

        //! Mensajes de Error
        $messages = [
            'ci_player.required' => "CI Del Jugador Requerido",
            'ci_player.min' => "CI Del Jugador Incorrecto",
            'ci_player.max' => "CI Del Jugador Incorrecto",
            'ci_player.unique' => "CI Ya Está En Uso",
            'code_team.required' => "Code Team Del Jugador Requerido",
            'age.required' => "El Jugador Tiene Que Ser Mayor De Edad",
            'age.min' => "El Jugador Tiene Que Ser Mayor De Edad",
            'born_date_player.required' => "Fecha N. Del Jugador Requerido",
            'email.unique' => "El Correo ya está en uso",
            'password.confirmed' => "Las contraseñas no son las mismas"
        ];

        $this->validate($request, $fields, $messages);


        if($request->image){
            $image = $request->image;
            $result = Cloudinary::upload($image->getRealPath(),['folder'=>'my_posts','public_id'=>uniqid()]);
            $url = $result->getSecurePath();
        }else{
            $url=null;
        }

        $user = User::create([
            'user_name' => $request->user_name,
            'nickname_user' => $request->nickname_user,
            'surname_user' => $request->surname_user,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $url,
            'roles_id' => 3
        ]);

        event(new Registered($user));

        $user_previous_created = User::where('email', $user->email);
        $user_id = $user->id;

        $player = Players::create([
            'ci_player' => $request->ci_player, 
            'user_id' => $user_id,
            'code_team' => $request->input("teams"),
            'age' => $request->age,
            'born_date_player' => $request->born_date_player,
        ]);       

        event(new Registered($player));
        return redirect('player/index')->with("message", "Jugador Creado");
    }
}