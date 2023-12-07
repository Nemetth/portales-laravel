<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(TypeSeeder::class);
        $this->call(RatingSeeder::class);
        $this->call(MagicSeeder::class);
        $this->call(ArticlesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(UserHasMagicProductSeeder::class);

    }
}
