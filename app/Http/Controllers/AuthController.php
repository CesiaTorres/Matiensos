<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function showRegister()  //Muestra la vista de registro
    {
        return view('front.registro');
    }

    public function register(Request $request) 
    {
        $request->validate([ //Validacion
            'name' => 'required|string|max:150',
            'last_name'  => 'required|string|max:150',
            'email'      => 'required|string|email|max:150|unique:users',
            'password'   => 'required|string|min:8|confirmed', // 'confirmed' busca un campo llamado password_confirmation
            'terms'      => 'accepted',
        ]);
        $user = User::create([  //Creo en BD
            'name' => $request->name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password), //EncriptO la contraseña
            'role'       => 'customer',
        ]);
        Auth::login($user); //Logeo el user inmediatamente

        return redirect()->route('acceso')->with('success', '¡Registro exitoso!');
    }
    
}