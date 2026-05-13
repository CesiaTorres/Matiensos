<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'cantidad',
        'total',
        'id_usuario',
        'id_producto',
    ];
    protected $casts = [
    'cantidad' => 'integer',
    'total' => 'decimal:2',
    ];
}
