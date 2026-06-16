<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role; // Asegurate de que tu modelo se llame Role

class RoleSeeder extends Seeder
{
    public function run(): void
    {

        Role::create([
            'id' => 1,
            'name' => 'administrador',
            'description' => 'Administrador general del panel (productos, pedidos).'
        ]);

        Role::create([
            'id' => 2,
            'name' => 'Cliente',
            'description' => 'Cliente de la tienda Matiensos.'
        ]);
    }
}