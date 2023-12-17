<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserHasMagicProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users_have_products')->insert([
            [
                'purchase_id' => 1,
                'user_id' => 2,
                'magic_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'purchase_id' => 2,
                'user_id' => 3,
                'magic_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'purchase_id' => 3,
                'user_id' => 2,
                'magic_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
