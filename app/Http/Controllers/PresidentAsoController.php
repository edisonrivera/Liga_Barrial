<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PresidentAso;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Collection;


class PresidentAsoController extends Controller
{
    public function index(){
        $president_aso = DB::table('president_asos')
                        ->join('users', 'users.id', '=', 'president_asos.user_id')
                        ->pluck(DB::raw("CONCAT(users.user_name, ' ', users.surname_user) AS full_name"), 'users.email');

        $avatars = DB::table('president_asos')
                ->join('users', 'users.id', '=', 'president_asos.user_id')
                ->pluck('users.avatar');

        $data_show = new Collection();
        $init = 0;
        foreach($president_aso as $user_name => $email){
            $data_show->put($user_name, [$email, $avatars[$init]]);
            $init++;
        };

        return view('president_aso.index', ['president_aso' => $data_show]);
    }

    public function create(){
        return view('president_aso.create');
    }

    public function store(Request $request){
        $fields=([
            'user_name' => ['required', 'alpha', 'max:15', 'min:2'],
            'surname_user' => ['required', 'alpha', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'president_image' => ['required', 'image'],
            'password' => ['required', 'confirmed', 'min:8', Rules\Password::defaults()],
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
            'president_image.required' => "El Presidente debe tener un logo",
            'president_image.image' => "El logo debe ser tipo svg, png, jpg o jpeg"
        ];

        $this->validate($request, $fields, $messages);

        $image = request()->file('president_image');
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
            'roles_id' => 3 //? 3 -> Presidente de Asociación
        ]);

        event(new Registered($user));

        $user_previous_created = User::where('email', $user->email)->get();
        $user_id = $user_previous_created[0]->id;

        $president_aso = PresidentAso::create([
            'user_id' => $user_id,
        ]);       

        event(new Registered($president_aso));
        return redirect('presidentaso/index')->with("message", "Presidente de Asociación Creado! 👨‍💻");
    }
}
