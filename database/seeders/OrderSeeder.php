<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Nomi finti
        $fake_names = [
            "John Doe",
            "Jane Smith",
            "Michael Johnson",
            "Emily Brown",
            "Robert Davis",
            "Sarah Wilson",
            "William Moore",
            "Emma Taylor",
            "David Anderson",
            "Olivia Martinez"
        ];

        // Prezzi finti con massimo due decimali
        $fake_prices = [586.47, 312.29, 145.13, 859.92, 492.68, 722.04, 64.38, 777.71, 379.81, 25.55];

        // Creazione di 20 ordini finti
        for ($i = 0; $i < 20; $i++) {
            $newOrder = new Order();
            $name= $fake_names[array_rand($fake_names)];
            $newOrder->customer_name = $name;
            $newOrder->customer_lastname = 'Algeri';
            $newOrder->slug = Str::slug($name, '-');
            $newOrder->customer_address = 'Via dei Frassini 7/D';
            $newOrder->customer_phone_number = '3200133882';
            $newOrder->customer_email = 'christian@example.it';
            $newOrder->customer_note = 'Ben cotta';
            $newOrder->total_price = $fake_prices[array_rand($fake_prices)];
            $newOrder->status = rand(0, 2);
            $newOrder->save();
        }
    }
}
