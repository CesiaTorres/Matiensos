<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Order_details;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'status',
        'total_amount',
        'shipping_address',
        'tracking_number',
    ];

    /**
     * Un pedido pertenece a un cliente.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Un pedido tiene muchos ítems.
     */
    public function items()
    {
        // Asegurate de que el modelo OrderItem se llame así.
        return $this->hasMany(Order_details::class);
    }
}