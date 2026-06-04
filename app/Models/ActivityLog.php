<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'action',
        'description',        
    ];

    /**
     * Un registro pertenece a un usuario
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}