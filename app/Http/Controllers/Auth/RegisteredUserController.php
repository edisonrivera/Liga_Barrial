<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $fields=([
            'user_name' => ['required', 'string', 'max:15', 'min:2'],
            'nickname_user' => ['required', 'string', 'max:15', 'min:5'],
            'surname_user' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', 'min:8' ,Rules\Password::defaults()],
        ]);

        //! Mensajes de Error
        $messages = [
            'user_name.required' => 'El nombre es requerido',
            'user_name.max' => 'El Nombre debe un máximo de 15 caracteres',
            'user_name.min' => 'El Apellido debe un mínimo de 2 caracteres',
            'surname_user.required' => 'El Apellido es requerido',
            'email.unique' => "El Correo ya está en uso",
            'password.confirmed' => "Las contraseñas no son las mismas",
            'password.min' => "Las contraseña debe ser de 8 o más caracteres"
        ];



        $this->validate($request, $fields, $messages);


        $user = User::create([
            'user_name' => $request->user_name,
            'nickname_user' => $request->nickname_user,
            'surname_user' => $request->surname_user,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles_id' => 6
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}