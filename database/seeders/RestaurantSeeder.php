<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
/* use Faker\Generator as Faker; */
use Faker\Factory as Faker;
use Illuminate\Support\Str;


class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('it_IT');

        $restaurantNames = [
            'Ossi di seppia', 'Trattoria da Mario', 'Ristorante Il Ponte', 'Pizzeria Bella Napoli',
            'La Taverna', 'Ristorante La Pergola', 'Ristorante Al Dente', 'Trattoria Il Cavallino',
            'Ristorante Il Cantuccio', 'Osteria del Gusto', 'Ristorante La Brace', 'Trattoria Vecchia Roma',
            'Ristorante La Piazzetta', 'Pizzeria Il Forno', 'Ristorante Il Girasole', 'Ristorante La Luna',
            'Osteria La Campana', 'Trattoria Al Vecchio Mulino', 'Ristorante Il Pescatore', 'Ristorante La Dolce Vita'
        ];

        foreach ($restaurantNames as $key => $name) {
            $newRestaurant = new Restaurant();
            $newRestaurant->name = $name;
            $newRestaurant->slug = Str::slug($name, '-');
            $newRestaurant->phone_number = '340' . $faker->randomNumber(7, true);
            $newRestaurant->user_id = $key + 1;
            $newRestaurant->image = $faker->imageUrl(640, 480, 'food', true, 'restaurant');
            $newRestaurant->address = 'Via ' . $faker->streetName . ' ' . $faker->numberBetween(1, 100);
            $newRestaurant->vat_number = $faker->randomNumber(5, true) . $faker->randomNumber(6, true); //randomNumber ha un massimo d 10 numeri generabili, quindi ne concateno 2 per ottemerme 11. Volendo c'è anche il faker per il VAT italiano ma restituisce anche il IT all'inizio, dovremmo modificare la tabella 
            $newRestaurant->save();
        }
    }
}
