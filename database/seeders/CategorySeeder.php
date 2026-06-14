<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'id' => 1,
            'name' => 'Mates',
            'image_url' => 'mate.svg',
            'description' => 'Mates de todo tipo.'
        ]);

        Category::create([
            'id' => 2,
            'name' => 'Termos',
            'image_url' => 'termos1.0.svg',   
            'description' => 'Termos de todo tipo.'
        ]);

        Category::create([
            'id' => 3,
            'name' => 'Bombillas',
            'image_url' => 'bombillas1.0.svg',
            'description' => 'Bombillas de todo tipo.'
        ]);
    }
}