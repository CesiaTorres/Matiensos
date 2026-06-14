<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'description',
        'price',
        'stock',
        'image_url',
        'category_id',
        'is_active',
        'is_featured',
        'category_id',
    ];

    /**
     * Un producto pertenece a una categoría.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Scope para filtrar por nombre o código.
     */
    public function scopeSearch($query, $term)
    {
        if (!empty($term)) {
            return $query->where(function($q) use ($term) {
                $q->where('name', 'LIKE', "%{$term}%")
                ->orWhere('code', 'LIKE', "%{$term}%");
            });
        }

        return $query;
    }
    /**
     * Scope para filtrar por estado de Stock.
     */
    public function scopeByStockStatus($query, $status)
    {
        if (empty($status)) {
            return $query;
        }
        if ($status === 'no_stock') {
            return $query->where('stock', 0);
        }
        if ($status === 'low_stock') {
            return $query->where('stock', '>', 0)->where('stock', '<=', 5);
        }
        if ($status === 'custom') {
            $value = request('stock_value');

            if ($value !== null && $value !== '') {
                return $query->where('stock', '>', $value);
            }
        }

        return $query;
    }

    /**
     * Scope para filtrar por ID de Categoría.
     */
    public function scopeByCategory($query, $categoryId)
    {
        if (!empty($categoryId)) {
            return $query->where('category_id', $categoryId);
        }

        return $query;
    }
}