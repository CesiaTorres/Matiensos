<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'price',
        'stock',
        'image_url',
        'category_id',
        'is_active'
    ];

    /**
     * Un producto pertenece a una categoría.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}