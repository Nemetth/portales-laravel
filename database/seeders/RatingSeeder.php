<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ratings')->insert([
            [
                'rating_id' => 1,
                "name" => 'Accesorios',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'rating_id' => 2,
                "name" => 'Tarot',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'rating_id' => 3,
                "name" => 'Libro',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'rating_id' => 4,
                "name" => 'Cristales',
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }
}
