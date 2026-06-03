<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([    //Campos que se pueden cargar masivamente.
    'name',
    'last_name',
    'email',
    'password',
    'role_id'
])]

#[Hidden([  //Campos que permanecen ocultos
    'password',
    'remember_token'
])]

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;
    
    //Conversion de tipos de datos
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isAdmin(): bool
    {
        return $this->role_id === 1;
    }

    public function isCustomer(): bool
    {
        return $this->role_id === 2;
    }
    
    //Un usuario tiene un rol
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    /**
     * Filtro por barra de búsqueda (Nombre, Apellido o Email)
     */
    public function scopeSearch($query, $term)
    {
        if (!empty($term)) {
            return $query->where(function ($q) use ($term) {
                $q->where('name', 'LIKE', "%{$term}%")
                  ->orWhere('last_name', 'LIKE', "%{$term}%")
                  ->orWhere('email', 'LIKE', "%{$term}%");
            });
        }
        return $query;
    }
    /**
     * Filtro por Rol
     */
    public function scopeByRole($query, $roleId)
    {
        if (!empty($roleId)) {
            return $query->where('role_id', $roleId);
        }
        return $query;
    }
    /**
     * Filtro por Estado (Activos/Suspendidos)
     */
    public function scopeByStatus($query, $status)
    {
        if ($status === 'active') {
            return $query->whereNull('deleted_at'); 
        }
        
        if ($status === 'suspended') {
            return $query->onlyTrashed(); 
        }
        
        return $query;
    }

}