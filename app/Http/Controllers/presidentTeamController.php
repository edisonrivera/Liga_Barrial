<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PresidentTeam;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class presidentTeamController extends Controller
{
    public function index(){
        $presidents = DB::table('president_teams')
                        ->join('users', 'users.id', '=', 'president_teams.user_id')
                        ->pluck(DB::raw("CONCAT(users.user_name, ' ', users.surname_user) AS full_name"), 'users.email');

        $teams = DB::table('president_teams')
                        ->join('soccer_teams', 'soccer_teams.president_team', '=', 'president_teams.id')
                        ->pluck('soccer_teams.name_team');

        $avatars = DB::table('president_teams')
                    ->join('users', 'users.id', '=', 'president_teams.user_id')
                    ->pluck('users.avatar');

        $data_show = new Collection();
        $init = 0;
        foreach($presidents as $user_name => $email){
            $data_show->put($user_name, [$email, isset($teams[$init]) ? $teams[$init]: 'Sin Equipo', $avatars[$init]]);
            $init++;
        };


        return view('president_teams.index', ['presidents_teams' => $data_show]);
    }

    public function create(){
        return view('president_teams.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $fields=([
            'user_name' => ['required', 'alpha', 'max:15', 'min:2'],
            'surname_user' => ['required', 'alpha', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'logo_team' => ['required', 'image'],
            'password' => ['required', 'confirmed', 'min:8' ,Rules\Password::defaults()],
        ]);

        //! Mensajes de Error
        $messages = [
            'user_name.required' => 'El nombre es requerido',
            'user_name.max' => 'El Nombre debe tener un máximo de 15 caracteres',
            'user_name.min' => 'El Apellido debe tener un mínimo de 2 caracteres',
            'surname_user.required' => 'El Apellido es requerido',
            'email.unique' => "El Correo ya está en uso",
            'password.confirmed' => "Las contraseñas no son iguales",
            'password.min' => "Las contraseña debe ser de 8 o más caracteres",
            'user_name.alpha' => "El Nombre debe contener únicamente letras",
            'surname_user.alpha' => "El Nombre debe contener únicamente letras",
            'logo_team.required' => "El Presidente debe tener un logo",
            'logo_team.image' => "El logo debe ser tipo svg, png, jpg o jpeg"
        ];

        $this->validate($request, $fields, $messages);


        $image = request()->file('logo_team');
        $result = Cloudinary::upload($image->getRealPath(),['folder'=>'my_post']);
        $url = $result->getSecurePath();
        $public_id = $result->getPublicId();

        $user = User::create([
            'user_name' => $request->user_name,
            'surname_user' => $request->surname_user,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $url,
            'public_id' => $public_id,
            'roles_id' => 2 //? 2 -> Presidentes de Equipos
        ]);

        event(new Registered($user));

        $user_previous_created = User::where('email', $user->email)->get();
        $user_id = $user_previous_created[0]->id;

        $president_team = PresidentTeam::create([
            'user_id' => $user_id,
        ]);       

        event(new Registered($president_team));
        return redirect('president/index')->with("message", "Presidente de Equipo Creado! 👨‍💻");
    }
}