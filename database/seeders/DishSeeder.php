<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
//use Faker\Generator as Faker;
use Faker\Factory as Faker;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('it_IT');

        $dishNames = [
            'Pizza Margherita', 'Lasagna', 'Spaghetti Carbonara', 'Risotto ai Funghi', 'Fettuccine Alfredo',
            'Tiramisù', 'Gelato', 'Bruschetta', 'Panna Cotta', 'Ravioli di Ricotta', 'Arancini',
            'Parmigiana di Melanzane', 'Polenta', 'Ossobuco', 'Saltimbocca alla Romana', 'Pasta alla Norma',
            'Zuppa di Pesce', 'Cannoli Siciliani', 'Bistecca alla Fiorentina', 'Gnocchi di Patate'
        ];

        $restaurantId = 1;

        foreach ($dishNames as $name) {
            $newDish = new Dish();
            $newDish->name = $name;
            $newDish->slug = Str::slug($name, '-');
            $newDish->restaurant_id = $restaurantId;
            $newDish->image = $faker->imageUrl(600, 300, 'Dish', true, $name, true, 'jpg');
            $newDish->ingredients = $faker->words(6, true);
            $newDish->price = $faker->randomFloat(2, 5, 20);  // Prezzo compreso tra 5 e 20 euro
            $newDish->visibility = $faker->boolean;
            $newDish->save();
        }

        /* $newDish =  new Dish();
        $newDish->name = 'Pizza Margherita';
        $newDish->slug = Str::slug($newDish->name, '-');
        $newDish->restaurant_id = 1;
        $newDish->image = $faker->imageUrl(600, 300, 'Dish', true, $newDish->name, true, 'jpg');
        $newDish->ingredients = "Call'e crabittu, Mazzamineddu, Farina, Acqua, Salsa di pomodoro di Maracalagonis, basilico, Olio EVO DOCG";
        $newDish->price = 6.50;
        $newDish->visibility = 0;
        $newDish->save(); */
    }
}
