<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'code' => 'MAT-001',
            'name' => 'Mate Camionero Premium',
            'description' => 'Mate de calabaza forrado en cuero legítimo con virola de acero.',
            'price' => 18500.00,
            'stock' => 24,
            'image_url' => 'producM3.png',
            'is_featured' => true,
            'category_id' => 1,
        ]);

        Product::create([
            'code' => 'TER-042',
            'name' => 'Termo Media Manija 1L',
            'description' => 'Termo de acero inoxidable con aislamiento de doble capa.',
            'price' => 32000.00,
            'stock' => 10,
            'image_url' => 'producT1.svg',
            'is_featured' => true,
            'category_id' => 2,
        ]);

        Product::create([
            'code' => 'MAT-002',
            'name' => 'Mate Imperial de Alpaca',
            'description' => 'Mate imperial forrado en cuero crudo con virola y base de alpaca cincelada a mano.',
            'price' => 45000.00,
            'stock' => 3,
            'image_url' => 'producM5.webp',
            'is_featured' => true,
            'category_id' => 1,
        ]);

        Product::create([
            'code' => 'BOM-010',
            'name' => 'Bombilla Pico de Loro',
            'description' => 'Bombilla de alpaca maciza con filtro tipo pala.',
            'price' => 12500.00,
            'stock' => 35,
            'image_url' => 'producB2.webp',
            'is_featured' => true,
            'category_id' => 3,
        ]);

        Product::create([
            'code' => 'TER-043',
            'name' => 'Termo Clásico Verde 1.2L',
            'description' => 'Termo de máxima retención térmica con tapón cebador de precisión.',
            'price' => 85000.00,
            'stock' => 15,
            'image_url' => 'producT3.webp',
            'is_featured' => true,
            'category_id' => 2,
        ]);

        Product::create([
            'code' => 'BOM-011',
            'name' => 'Bombilla Chata Acero Inox',
            'description' => 'Bombilla de acero inoxidable 18/8 con filtro ranurado clásico.',
            'price' => 6000.00,
            'stock' => 8,
            'image_url' => 'productB4.jpg',
            'is_featured' => true,
            'category_id' => 3,
        ]);

        Product::create([
            'code' => 'MAT-003',
            'name' => 'Mate Torpedo de Calabaza',
            'description' => 'Mate formato torpedo de calabaza gruesa brasileña.',
            'price' => 16000.00,
            'stock' => 12,
            'image_url' => 'product2M.avif',
            'is_featured' => true,
            'category_id' => 1,
        ]);

        Product::create([
            'code' => 'MAT-009',
            'name' => 'Mate Imperial Grabado',
            'description' => 'Mate imperial grabado artesanalmente.',
            'price' => 28000.00,
            'stock' => 10,
            'image_url' => 'producM3.png',
            'is_featured' => true,
            'category_id' => 1,
        ]);
    }
}
