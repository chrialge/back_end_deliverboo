<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newOrder = new Order();
        $newOrder->customer_name = 'Christian';
        $newOrder->customer_lastname = 'Algeri';
        $newOrder->customer_address = 'Via dei Frassini 7/D';
        $newOrder->customer_phone_number = '3200133882';
        $newOrder->customer_email = 'christian@example.it';
        $newOrder->customer_note = 'Ben cotta';
        $newOrder->total_price = 120.55;
        $newOrder->status = 2;
        $newOrder->save();
    }
}
