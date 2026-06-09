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
}