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
        $users = User::whereIn('role_id', [1, 3])
            ->withTrashed()
            ->latest()
            ->paginate(10);

        $roles = Role::whereIn('id', [1, 3])->get();

        $metrics = [
            'total_team'   => User::whereIn('role_id', [1, 3])->count(),
            'total_admins' => User::where('role_id', 1)->count(),
            'total_sellers'=> User::where('role_id', 3)->count(),
            //lógicamente suspendidos
            'suspended'    => User::onlyTrashed()->whereIn('role_id', [1, 3])->count(),
            'active_now'   => User::whereIn('role_id', [1, 3])->whereNotNull('remember_token')->count(),
        ];

        return view('admin.front.users', compact('users', 'roles', 'metrics'));
    }

    /**
     * Guarda un nuevo Administrador
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|regex:/^[^\s]+(\s+[^\s]+)*$/|max:255',
            'last_name' => 'required|string|regex:/^[^\s]+(\s+[^\s]+)*$/|max:255',
            'email'     => 'required|email|regex:/^[^\s]+(\s+[^\s]+)*$/|unique:users,email',
            'password'  => 'required|string|regex:/^[^\s]+(\s+[^\s]+)*$/|min:6',
            'role_id'   => 'required|exists:roles,id'
        ], [
            'email.unique' => 'No se pudo guardar: Ya existe un usuario registrado con este correo electrónico.'
        ]);

        User::create([
            'name'      => $request->name,
            'last_name' => $request->last_name,
            'email'     => $request->email,
            'password'  => $request->password, 
            'role_id'   => $request->role_id
        ]);

        return redirect()->route('admin.users')->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Actualiza los datos de un Administrador
     */
    public function update(Request $request, string $id)
    {
        $admin = User::findOrFail($id);

        $request->validate([
            'name'      => 'required|string|regex:/^[^\s]+(\s+[^\s]+)*$/|max:255',
            'last_name' => 'required|string|regex:/^[^\s]+(\s+[^\s]+)*$/|max:255',
            'email'     => 'required|email|regex:/^[^\s]+(\s+[^\s]+)*$/|unique:users,email,' . $admin->id,
            'role_id'   => 'required|exists:roles,id',
            'password'  => 'nullable|string|regex:/^[^\s]+(\s+[^\s]+)*$/|min:6' 
        ], [
            'email.unique' => 'No se pudo guardar: Ya existe un usuario registrado con este correo electrónico.'
        ]);

        $admin->name      = $request->name;
        $admin->last_name = $request->last_name;
        $admin->email     = $request->email;
        $admin->role_id   = $request->role_id;

        if ($request->filled('password')) {
            $admin->password = $request->password;
        }

        $admin->save();

        return redirect()->route('admin.users')->with('success', 'Datos del usuario actualizados.');
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

    /**
     * Reactiva un usuario suspendido
     */
    public function restore(string $id)
    {
        $admin = User::withTrashed()->findOrFail($id);
        $admin->restore(); 

        return redirect()->route('admin.users')->with('success', 'Usuario reactivado exitosamente. Ya puede volver a ingresar al panel.');
    }
}