<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Secretaries;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SecretaryController extends Controller
{
    public function index(){
        $secretaries = DB::table('secretaries')
                        ->join('users', 'users.id', '=', 'secretaries.user_id')
                        ->pluck('users.user_name', 'users.email');

        return view('secretaries.index', ['secretaries' => $secretaries]);
    }


    public function create(){
        $teams = DB::table('soccer_teams')->pluck('name_team', 'code_soccer_team');
        return view('secretaries.create', ['teams' => $teams]);
    }

    public function store(Request $request): RedirectResponse
    {
        //! Registro: Usuario
        $fields = ([
            'user_name' => ['required', 'string', 'max:15'],
            'surname_user' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'code_team' => ['required'],
        ]);

        //! Mensajes de Error
        $messages = [
            'email.unique' => "El Correo ya está en uso",
            'password.confirmed' => "Las contraseñas no son las mismas",
            'code_team.required' => "Eliga Un Equipo",
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

        $secretary = Secretaries::create([
            'user_id' => $user_id,
            'code_team' => $request->input("teams"),
        ]);       

        event(new Registered($secretary));
        return redirect('secretaries/index')->with("message", "Secretario Creado! 👨‍💻");
    }

}