<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'user_id',
        'status',
        'total_amount',
        'shipping_address',
        'tracking_number',
    ];
    /**
     * Genera un codigo aleatorio único
     */
    protected static function booted()
    {
        static::creating(function ($order) {
            do {
                $randomCode = 'OR-' . strtoupper(Str::random(5));
            } while (self::where('code', $randomCode)->exists());

            $order->code = $randomCode;
        });
    }

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
        return $this->hasMany(OrderDetails::class);
    }
}