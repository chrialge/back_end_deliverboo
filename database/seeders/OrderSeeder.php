<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('it_IT');

        // Creazione di 200 ordini finti
        for ($i = 0; $i < 200; $i++) {
            $newOrder = new Order();
            $newOrder->restaurant_id = $faker->numberBetween(1, 20);
            $newOrder->customer_name = $faker->firstName();
            $newOrder->customer_lastname = $faker->lastname();
            $name = $newOrder->customer_name . ' ' . $newOrder->customer_lastname;
            $newOrder->slug = Str::slug($name, '-');
            $newOrder->customer_address = 'Via ' . $faker->streetName . ' ' . $faker->numberBetween(1, 100);
            $newOrder->customer_phone_number = '340' . $faker->randomNumber(7, true);
            $newOrder->customer_email = 'ciao' . $i . '@ciao.it';
            $newOrder->customer_note = 'Ben cotta';
            $newOrder->total_price = $faker->randomFloat(2, 5, 300);
            $newOrder->status = rand(0, 2);
            // $newOrder->created_at = $faker->dateTimeThisYear();
            $newOrder->save();
            for ($i = 0; $i < 3; $i++) {
                $dish_id = rand(1, 20);
                $quantity = rand(1, 5);
                $price_per_unit = rand(5, 20);
                $newOrder->dishes()->attach($dish_id, [
                    "quantity" => $quantity,
                    "price_per_unit" => $price_per_unit
                ]);
            }
        }
    }
}
