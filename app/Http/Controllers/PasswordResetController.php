<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ResetPasswordMail;

use App\Models\User;

class PasswordResetController extends Controller
{
    public function showForgotForm()
    {
        return view('front.recuperar-contrasenia');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => $token,
                'created_at' => now()
            ]
        );

        Mail::to($request->email)
            ->send(new ResetPasswordMail($token));

        return back()->with(
            'success',
            'Te enviamos un enlace de recuperación.'
        );
    }

    public function showResetForm($token)
    {
        return view('front.cambiar-contraseña', compact('token'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        $reset = DB::table('password_reset_tokens')
            ->where('token', $request->token)
            ->first();

        if (!$reset) {

            return back()->with('error', 'El enlace no es válido');
        }

        $user = User::where('email', $reset->email)->first();

        if (!$user) {

            return back()->with('error', 'Usuario no encontrado');
        }

        $user->password = $request->password;
        $user->save();

        DB::table('password_reset_tokens')
            ->where('email', $reset->email)
            ->delete();

        return redirect('/acceso')
            ->with('success', 'Contraseña actualizada correctamente');
    }
}
