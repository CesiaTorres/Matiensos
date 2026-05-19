<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role)
    {
        // Si el usuario no está logueado o su rol no coincide con el necesario...
        if (!auth()->check() || auth()->user()->role !== $role) {
            return redirect('/')->with('error', 'No tenés permisos para entrar acá.');
        }

        return $next($request);
    }
}
