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

    /**
     * Filtro de búsqueda por código o cliente
     */
    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where(function ($q) use ($search) {
                $q->where('code', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($userQuery) use ($search) {
                      $userQuery->where('name', 'like', "%{$search}%")
                                ->orWhere('last_name', 'like', "%{$search}%");
                  });
            });
        }
        return $query;
    }

    /**
     * Filtro por estado del pedido
     */
    public function scopeByStatus($query, $status)
    {
        if ($status) {
            return $query->where('status', $status);
        }
        return $query;
    }

    /**
     * Filtro por rango de fechas
     */
    public function scopeByDateRange($query, $from, $to)
    {
        if ($from) {
            $query->whereDate('created_at', '>=', $from);
        }
        if ($to) {
            $query->whereDate('created_at', '<=', $to);
        }
        return $query;
    }

    /**
     * Filtro por rango de precios
     */
    public function scopeByPriceRange($query, $min, $max)
    {
        if ($min) {
            $query->where('total_amount', '>=', $min);
        }
        if ($max) {
            $query->where('total_amount', '<=', $max);
        }
        return $query;
    }
}