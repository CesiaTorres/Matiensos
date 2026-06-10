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
            'description' => 'Mates de todo tipo.'
        ]);

        Category::create([
            'id' => 2,
            'name' => 'Termos',
            'description' => 'Termos de todo tipo.'
        ]);

        Category::create([
            'id' => 3,
            'name' => 'Bombillas',
            'description' => 'Bombillas de todo tipo.'
        ]);
    }
}