<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'url_imagen',
        'activo',
        'id_categoria'
    ];
    protected $casts = [
    'stock' => 'integer',
    'precio' => 'decimal:2',
    ];
}
