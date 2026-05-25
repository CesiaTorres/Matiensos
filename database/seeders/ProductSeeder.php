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
            'category_id' => 1, //Mates
            'is_active' => true,
        ]);

        Product::create([
            'code' => 'TER-042',
            'name' => 'Termo Media Manija 1L',
            'description' => 'Termo de acero inoxidable con aislamiento de doble capa.',
            'price' => 32000.00,
            'stock' => 0,
            'category_id' => 2, //Termos
            'is_active' => true,
        ]);
    }
}