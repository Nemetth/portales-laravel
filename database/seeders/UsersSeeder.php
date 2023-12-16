<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'user_id' => 1,
                'role' => 1,
                'name' => 'Juan',
                'email' => 'juan@hotmail.com',
                'password' => Hash::make('juancito'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'role' => 2,
                'name' => 'Jorge',
                'email' => 'jorge@hotmail.com',
                'password' => Hash::make('jorgito'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'role' => 2,
                'name' => 'Julieta',
                'email' => 'julieta@gmail.com',
                'password' => Hash::make('julita'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
