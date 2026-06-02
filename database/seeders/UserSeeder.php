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
        User::create([
            'name' => 'Admin',
            'last_name' => 'Super',
            'email' => 'superAdmin@matiensos.com',
            'password' => Hash::make('1234'),
            'role_id' => 3,
        ]);
    }
}