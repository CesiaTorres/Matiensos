<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable([    //Campos que se pueden cargar masivamente.
    'name',
    'last_name',
    'email',
    'password',
    'role'
])]

#[Hidden([  //Campos que permanecen ocultos
    'password',
    'remember_token'
])]

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    
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
        return $this->role === 'admin';
    }

    public function isCustomer(): bool
    {
        return $this->role === 'customer';
    }
}