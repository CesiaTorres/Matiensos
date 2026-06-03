<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //admins    
        User::create([
            'name'      => 'Admin',
            'last_name' => 'First',
            'email'     => 'firstAdmin@matiensos.com',
            'password'  => Hash::make('1234'),
            'role_id'   => 1,
        ]);
        User::create([
            'name'      => 'Valentina',
            'last_name' => 'Ríos',
            'email'     => 'vrios@matiensos.com',
            'password'  => Hash::make('1234'),
            'role_id'   => 1,
        ]);
        User::create([
            'name'      => 'Enzo',
            'last_name' => 'Gómez',
            'email'     => 'egomez@matiensos.com',
            'password'  => Hash::make('1234'),
            'role_id'   => 1,
        ]);
        User::create([
            'name'      => 'Camila',
            'last_name' => 'Sosa',
            'email'     => 'csosa@matiensos.com',
            'password'  => Hash::make('1234'),
            'role_id'   => 1,
        ]);
        User::create([
            'name'      => 'Lucas',
            'last_name' => 'Benítez',
            'email'     => 'lbenitez@matiensos.com',
            'password'  => Hash::make('1234'),
            'role_id'   => 1,
        ]);

        // clientes
        User::create([
            'name'      => 'Cliente',
            'last_name' => 'Uno',
            'email'     => 'cliente1@matiensos.com',
            'password'  => Hash::make('1234'),
            'role_id'   => 2,
        ]);
        User::create([
            'name'      => 'Facundo',
            'last_name' => 'Romero',
            'email'     => 'facu.romero@gmail.com',
            'password'  => Hash::make('1234'),
            'role_id'   => 2,
        ]);
        User::create([
            'name'      => 'Sofía',
            'last_name' => 'Alonso',
            'email'     => 'sofi_alonso99@hotmail.com',
            'password'  => Hash::make('1234'),
            'role_id'   => 2,
        ]);
        User::create([
            'name'      => 'Joaquín',
            'last_name' => 'García',
            'email'     => 'joaco.garcia.ok@gmail.com',
            'password'  => Hash::make('1234'),
            'role_id'   => 2,
        ]);
        User::create([
            'name'      => 'Martina',
            'last_name' => 'López',
            'email'     => 'marti_lopez@yahoo.com',
            'password'  => Hash::make('1234'),
            'role_id'   => 2,
        ]);
        User::create([
            'name'      => 'Mateo',
            'last_name' => 'Martínez',
            'email'     => 'mateomartinez@gmail.com',
            'password'  => Hash::make('1234'),
            'role_id'   => 2,
        ]);
        User::create([
            'name'      => 'Julieta',
            'last_name' => 'Torres',
            'email'     => 'juli.torres.dg@gmail.com',
            'password'  => Hash::make('1234'),
            'role_id'   => 2,
        ]);
        User::create([
            'name'      => 'Santiago',
            'last_name' => 'Fernández',
            'email'     => 'santi_fer_88@hotmail.com',
            'password'  => Hash::make('1234'),
            'role_id'   => 2,
        ]);
        User::create([
            'name'      => 'Lucía',
            'last_name' => 'Rodríguez',
            'email'     => 'lurodriguez.art@gmail.com',
            'password'  => Hash::make('1234'),
            'role_id'   => 2,
        ]);
        User::create([
            'name'      => 'Tomás',
            'last_name' => 'Ramírez',
            'email'     => 'tomi.ramirez@outlook.com',
            'password'  => Hash::make('1234'),
            'role_id'   => 2,
        ]);
    }
}