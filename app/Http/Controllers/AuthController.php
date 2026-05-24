<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Muestra la vista de registro
    public function showRegister()
    {
        return view('front.registro');
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

        return redirect('/') ->with('success', 'Usuario registrado con éxito');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}