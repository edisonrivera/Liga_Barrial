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

class presidentTeamController extends Controller
{
    public function index(){
        $presidents = DB::table('president_teams')
                        ->join('users', 'users.id', '=', 'president_teams.user_id')
                        ->pluck('users.user_name', 'users.email');

        $teams = DB::table('president_teams')
                        ->join('soccer_teams', 'soccer_teams.president_team', '=', 'president_teams.id')
                        ->pluck('soccer_teams.name_team');

        $data_show = new Collection();
        $init = 0;
        foreach($presidents as $user_name => $email){
            $data_show->put($user_name, [$email, isset($teams[$init]) ? $teams[$init] : 'Sin Equipo']);
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
        ];

        $this->validate($request, $fields, $messages);


        // if($request->image){
        //     $image = $request->image;
        //     $result = Cloudinary::upload($image->getRealPath(),['folder'=>'my_posts','public_id'=>uniqid()]);
        //     $url = $result->getSecurePath();
        // }else{
        //     $url=null;
        // }

        $user = User::create([
            'user_name' => $request->user_name,
            'surname_user' => $request->surname_user,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles_id' => 2
        ]);

        event(new Registered($user));

        $user_previous_created = User::where('email', $user->email);
        $user_id = $user->id;

        $president_team = PresidentTeam::create([
            'user_id' => $user_id,
        ]);       

        event(new Registered($president_team));
        return redirect('president/index')->with("message", "Presidente de Equipo Creado! 👨‍💻");
    }
}