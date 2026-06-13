<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'subject',
        'message',
        'is_read',
    ];

    /**
     * Un mensaje pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Filtra los mensajes sin leer.
     */
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    /**
     * Filtro por estado de lectura
     */
    public function scopeByReadStatus($query, $status)
    {
        if ($status === 'read') {
            return $query->where('is_read', true);
        } elseif ($status === 'unread') {
            return $query->where('is_read', false);
        }
        
        return $query; // Si viene vacío, trae todos
    }
}