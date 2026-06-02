<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Muestra el listado de Administradores
     */
    public function index(Request $request)
    {
        $admins = User::where('role_id', '!=', 2)
            ->latest()
            ->paginate(10);

        $roles = Role::where('id', '!=', 2)->get();

        $metrics = [
            'total_admins' => User::where('role_id', '!=', 2)->count(),
            //lógicamente suspendidos
            'suspended' => User::onlyTrashed()->where('role_id', '!=', 2)->count(),
            'active_now' => User::where('role_id', '!=', 2)->whereNotNull('remember_token')->count(), // Un estimado de activos
        ];

        return view('admin.front.users', compact('admins', 'roles', 'metrics'));
    }

    /**
     * Guarda un nuevo Administrador
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|regex:/^[^\s]+(\s+[^\s]+)*$/max:255',
            'last_name' => 'required|string|regex:/^[^\s]+(\s+[^\s]+)*$/max:255',
            'email'     => 'required|email|regex:/^[^\s]+(\s+[^\s]+)*$/unique:users,email',
            'password'  => 'required|string|regex:/^[^\s]+(\s+[^\s]+)*$/min:6',
            'role_id'   => 'required|exists:roles,id'
        ], [
            'email.unique' => 'Ya existe un usuario registrado con este correo electrónico.'
        ]);

        User::create([
            'name'      => $request->name,
            'last_name' => $request->last_name,
            'email'     => $request->email,
            'password'  => $request->password, 
            'role_id'   => $request->role_id
        ]);

        return redirect()->route('admin.users')->with('success', 'Administrador creado exitosamente.');
    }

    /**
     * Actualiza los datos de un Administrador
     */
    public function update(Request $request, string $id)
    {
        $admin = User::findOrFail($id);

        $request->validate([
            'name'      => 'required|string|regex:/^[^\s]+(\s+[^\s]+)*$/max:255',
            'last_name' => 'required|string|regex:/^[^\s]+(\s+[^\s]+)*$/max:255',
            'email'     => 'required|email|regex:/^[^\s]+(\s+[^\s]+)*$/unique:users,email,' . $admin->id,
            'role_id'   => 'required|exists:roles,id',
            'password'  => 'nullable|string|regex:/^[^\s]+(\s+[^\s]+)*$/min:6' 
        ]);

        $admin->name      = $request->name;
        $admin->last_name = $request->last_name;
        $admin->email     = $request->email;
        $admin->role_id   = $request->role_id;

        if ($request->filled('password')) {
            $admin->password = $request->password;
        }

        $admin->save();

        return redirect()->route('admin.users')->with('success', 'Datos del administrador actualizados.');
    }

    /**
     * Suspende a un Administrador
     */
    public function destroy(string $id)
    {
        $admin = User::findOrFail($id);

        if (Auth::id() == $admin->id) {
            return redirect()->route('admin.users')->with('error', 'No puedes suspender tu propia cuenta por seguridad.');
        }

        $admin->delete(); 

        return redirect()->route('admin.users')->with('success', 'Administrador suspendido correctamente. Ya no tendrá acceso.');
    }
}