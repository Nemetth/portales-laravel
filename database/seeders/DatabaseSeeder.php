<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(CategorySeeder::class);
        $this->call(ArticlesSeeder::class);
        $this->call(MagicSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(UserHasMagicProductSeeder::class);
        
    }
}
