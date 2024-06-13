<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RestaurantSeeder;
use Database\Seeders\TypeSeeder;
use Database\Seeders\DishSeeder;
use Database\Seeders\OrderSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RestaurantSeeder::class,
            TypeSeeder::class,
            DishSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
