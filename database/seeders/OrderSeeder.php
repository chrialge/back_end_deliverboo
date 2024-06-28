<?php

namespace Database\Seeders;

use App\Models\Order;
use Carbon\Carbon;
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

        // Data e ora attuali
        $now = Carbon::now();

        // Data di inizio del 2021
        $start_date = Carbon::parse('2021-01-01');

        // Ciclo per creare ordini finti
        for ($i = 0; $i < 1000; $i++) {
            $newOrder = new Order();
            $newOrder->restaurant_id = $faker->numberBetween(1, 20);
            $newOrder->customer_name = $faker->firstName();
            $newOrder->customer_lastname = $faker->lastName();
            $name = $newOrder->customer_name . ' ' . $newOrder->customer_lastname;
            $newOrder->slug = Str::slug($name, '-');
            $newOrder->customer_address = 'Via ' . $faker->streetName . ' ' . $faker->numberBetween(1, 100);
            $newOrder->customer_phone_number = '340' . $faker->randomNumber(7, true);
            $newOrder->customer_email = $newOrder->customer_name . '.' . $newOrder->customer_lastname . '@gmail.com';
            $newOrder->customer_note = 'Ben cotta';
            $newOrder->total_price = $faker->randomFloat(2, 5, 40);
            $newOrder->status = rand(0, 2);

            //genero una data nel range che mi interessa
            $stop_date = $faker->dateTimeBetween($start_date, $now);

            $newOrder->created_at = $stop_date;
            $newOrder->save();

            // Collega piatti casuali all'ordine
            for ($index = 0; $index < 3; $index++) {
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
