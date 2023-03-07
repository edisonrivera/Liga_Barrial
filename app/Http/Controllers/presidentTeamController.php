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

class presidentTeamController extends Controller
{
    public function index(){
        $presidents = DB::table('president_teams')
                        ->join('users', 'users.id', '=', 'president_teams.user_id')
                        ->pluck('users.user_name', 'users.email');

        return view('president_teams.index', ['presidents_teams' => $presidents]);
    }

    public function create(){
        return view('president_teams.create');
    }

    public function store(Request $request): RedirectResponse
    {
        //! Registro: Usuario
        $fields = ([
            'user_name' => ['required', 'string', 'max:15'],
            'surname_user' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);

        //! Mensajes de Error
        $messages = [
            'email.unique' => "El Correo ya está en uso",
            'password.confirmed' => "Las contraseñas no son las mismas",
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
        return redirect('president/index')->with("message", "Presidente de Equipo Creado Creado! 👨‍💻");
    }
}