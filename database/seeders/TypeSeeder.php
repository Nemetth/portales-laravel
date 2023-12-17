<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types')->insert([
            [
                'types_id' => 1,
                'name' => 'Proteccion',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'types_id' => 2,
                'name' => 'Magia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'types_id' => 3,
                'name' => 'Tarots',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'types_id' => 4,
                'name' => 'Bienestar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
