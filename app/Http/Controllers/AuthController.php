<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //Muestra la vista de registro
    public function showRegister()
    {
        return view('front.registro');
    }

    //muestra vista login
    public function showLogin()
    {
        return view('front.acceso');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([

            'email' => 'required|email',

            'password' => 'required'

        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect('/')
                ->with('success', 'Inicio de sesión exitoso');
        }

        return back()
            ->with('error', 'Correo o contraseña incorrectos');
    }

    public function register(Request $request)
    {
        $request->validate([

            'name' => 'required',

            'last_name' => 'required',

            'email' => 'required|email|unique:users',

            'password' => 'required|min:6'
        ]);

        $user = User::create([

            'name' => $request->name,

            'last_name' => $request->last_name,

            'email' => $request->email,

            'password' => $request->password,

            'role_id' => 2
        ]);

        Auth::login($user);

        return redirect('/')->with('success', 'Usuario registrado con éxito');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')
        ->with('success', 'Sesión cerrada correctamente');
    }


    public function updateProfile(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // VALIDACIONES
        $request->validate([

            'name' => 'required',

            'email' => 'required|email',

            'new_password' => 'nullable|min:6|confirmed'

        ]);

        // IMAGEN
        if ($request->hasFile('profile_image')) {

            $path = $request->file('profile_image')
                ->store('profile-images', 'public');

            $user->profile_image = $path;
        }

        // DATOS
        $user->name = $request->name;
        $user->email = $request->email;

        // CAMBIO PASSWORD
        if ($request->filled('current_password')) {

            if (!Hash::check($request->current_password, $user->password)) {

                return back()->with('error', 'La contraseña actual es incorrecta');
            }

            $user->password = $request->new_password;
        }

        $user->save();

        return back()->with('success', 'Perfil actualizado');
    }
}
