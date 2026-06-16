<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ActivityLog;


class UserController extends Controller
{
    /**
     * Info a page
     */
    public function index(Request $request)
    {
        $roles = Role::all();

        $users = User::query()
            ->withTrashed() //todos (activos y suspendidos)
            ->search($request->input('search'))
            ->byRole($request->input('role_filter'))
            ->byStatus($request->input('status_filter'))
            ->latest()
            ->paginate(10);

        $metrics = [
            'total_team'   => User::where('role_id', '!=', 2)->count(),
            'total_admins' => User::where('role_id', 1)->count(),
            'total_customer' => User::where('role_id', 2)->count(),
            'total_sellers' => User::where('role_id', 3)->count(),

            'suspended'    => User::onlyTrashed()->count(),
            'active_now'   => User::whereNotNull('remember_token')->count(),
        ];
        
        $logs = ActivityLog::with('user')->latest('created_at')->take(15)->get();

        return view('admin.front.users', compact('users', 'roles', 'metrics', 'logs'));
    }

    /**
     * Guarda un nuevo usuario
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

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'create',
            'description' => "registró un nuevo usuario: <strong>{$request->name} {$request->last_name}</strong>"
        ]);

        return redirect()->route('admin.users')->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Actualiza los datos de un usuario
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'      => 'required|string|regex:/^[^\s]+(\s+[^\s]+)*$/|max:255',
            'last_name' => 'required|string|regex:/^[^\s]+(\s+[^\s]+)*$/|max:255',
            'email'     => 'required|email|regex:/^[^\s]+(\s+[^\s]+)*$/|unique:users,email,' . $user->id,
            'role_id'   => 'required|exists:roles,id',
            'password'  => 'nullable|string|regex:/^[^\s]+(\s+[^\s]+)*$/|min:6'
        ], [
            'email.unique' => 'No se pudo guardar: Ya existe un usuario registrado con este correo electrónico.'
        ]);

        $user->name      = $request->name;
        $user->last_name = $request->last_name;
        $user->email     = $request->email;
        $user->role_id   = $request->role_id;

        if ($request->filled('password')) {
            $user->password = $request->password;
        }

        $user->save();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'update',
            'description' => "actualizó al usuario <strong>{$user->name} {$user->last_name}</strong>"
        ]);

        return redirect()->route('admin.users')->with('success', 'Datos del usuario actualizados.');
    }

    /**
     * Suspende a un usuario
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if (Auth::id() == $user->id) {
            return redirect()->route('admin.users')->with('error', 'No puedes suspender tu propia cuenta por seguridad.');
        }

        $user->delete();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'suspend',
            'description' => "suspendió al usuario <strong>{$user->name} {$user->last_name}</strong>"
        ]);

        return redirect()->route('admin.users')->with('success', 'Administrador suspendido correctamente. Ya no tendrá acceso.');
    }

    /**
     * Reactiva un usuario suspendido
     */
    public function restore(string $id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'restore',
            'description' => "reactivó al usuario <strong>{$user->name} {$user->last_name}</strong>"
        ]);

        return redirect()->route('admin.users')->with('success', 'Usuario reactivado exitosamente. Ya puede volver a ingresar al panel.');
    }

}
