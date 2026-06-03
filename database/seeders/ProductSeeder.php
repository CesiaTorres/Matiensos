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
            'category_id' => 1,
            'is_active' => true,
        ]);
        Product::create([
            'code' => 'TER-042',
            'name' => 'Termo Media Manija 1L',
            'description' => 'Termo de acero inoxidable con aislamiento de doble capa.',
            'price' => 32000.00,
            'stock' => 0,
            'category_id' => 2,
            'is_active' => true,
        ]);
        Product::create([
            'code' => 'MAT-002',
            'name' => 'Mate Imperial de Alpaca',
            'description' => 'Mate imperial forrado en cuero crudo con virola y base de alpaca cincelada a mano.',
            'price' => 45000.00,
            'stock' => 3, 
            'category_id' => 1,
            'is_active' => true,
        ]);
        Product::create([
            'code' => 'BOM-010',
            'name' => 'Bombilla Pico de Loro',
            'description' => 'Bombilla de alpaca maciza con filtro tipo pala, ideal para yerba despalada.',
            'price' => 12500.00,
            'stock' => 35,
            'category_id' => 3, 
            'is_active' => true,
        ]);
        Product::create([
            'code' => 'BOL-001',
            'name' => 'Mochila Matera de Cuero',
            'description' => 'Mochila 100% cuero vacuno con compartimento especial para termo de hasta 1.2L.',
            'price' => 55000.00,
            'stock' => 4,
            'category_id' => 4, 
            'is_active' => true,
        ]);
        Product::create([
            'code' => 'TER-043',
            'name' => 'Termo Clásico Verde 1.2L',
            'description' => 'Termo de máxima retención térmica con tapón cebador de precisión.',
            'price' => 85000.00,
            'stock' => 15,
            'category_id' => 2,
            'is_active' => true,
        ]);
        Product::create([
            'code' => 'YER-001',
            'name' => 'Yerba Mate Orgánica 1Kg',
            'description' => 'Yerba mate de secanza barbacuá, estacionamiento natural por 24 meses.',
            'price' => 4500.00,
            'stock' => 50,
            'category_id' => 5, 
            'is_active' => true,
        ]);
        Product::create([
            'code' => 'BOM-011',
            'name' => 'Bombilla Chata Acero Inox',
            'description' => 'Bombilla de acero inoxidable 18/8 con filtro ranurado clásico.',
            'price' => 6000.00,
            'stock' => 0,
            'category_id' => 3,
            'is_active' => true,
        ]);
        Product::create([
            'code' => 'MAT-003',
            'name' => 'Mate Torpedo de Calabaza',
            'description' => 'Mate formato torpedo de calabaza gruesa brasileña, virola lisa.',
            'price' => 16000.00,
            'stock' => 12,
            'category_id' => 1,
            'is_active' => true,
        ]);
        Product::create([
            'code' => 'BOL-002',
            'name' => 'Bolso Matero Rígido',
            'description' => 'Bolso matero de eco-cuero con base rígida para mayor estabilidad.',
            'price' => 28000.00,
            'stock' => 2,
            'category_id' => 4,
            'is_active' => true,
        ]);
    }
}