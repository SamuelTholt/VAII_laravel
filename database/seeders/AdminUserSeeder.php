<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Vytvorenie admina
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' => 'LKRestaurant@gmail.com',
            'password' => Hash::make('adminLK123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Priradenie role admina
        DB::table('user_roles')->insert([
            'user_id' => 1,
            'role_id' => 1, // ID pre "admin" rolu
        ]);
    }
}
