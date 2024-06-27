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

        $dishes = [
            [
                "name" => 'Pizza Margherita',
                "img" => "img/pizza.jpg"
            ],
            [
                "name" => 'Lasagna',
                "img" => 'img/lasagna.webp'
            ],
            [
                "name" => 'Spaghetti Carbonara',
                "img" => 'img/carbonara.webp'
            ],
            [
                "name" => 'Risotto ai Funghi',
                "img" => 'img/risotto-ai-funghi.jpeg'
            ],
            [
                "name" => 'Fettuccine Alfredo',
                "img" => 'img/fettucine.jpg'
            ],
            [
                "name" => 'Tiramisù',
                "img" => 'img/tiramisu.jpg'
            ],
            [
                "name" => 'Gelato',
                "img" => 'img/gelato.jpg'
            ],
            [
                "name" => 'Bruschetta',
                "img" => 'img/bruschetta.jpg'
            ],
            [
                "name" => 'Panna Cotta',
                "img" => 'img/panna-cotta.jpg'
            ],
            [
                "name" => 'Ravioli di Ricotta',
                "img" => 'img/ravioli.jpg'
            ],
            [
                "name" => 'Arancini',
                "img" => 'img/arancini.jpg'
            ],
            [
                "name" => 'Parmigiana di Melanzane',
                "img" => 'img/parmigiana.jpg'
            ],
            [
                "name" => 'Polenta',
                "img" => 'img/polenta.jpg'
            ],
            [
                "name" => 'Ossobuco',
                "img" => 'img/ossobuco.webp'
            ],
            [
                "name" => 'Saltimbocca alla Romana',
                "img" => 'img/saltimbocca.jpg'
            ],
            [
                "name" => 'Pasta alla Norma',
                "img" => 'img/pasta-alla-norma.webp'
            ],
            [
                "name" => 'Zuppa di Pesce',
                "img" => 'img/zuppa-di-pesce.jpg'
            ],
            [
                "name" => 'Cannoli Siciliani',
                "img" => 'img/cannoli.jpg'
            ],
            [
                "name" => 'Bistecca alla Fiorentina',
                "img" => 'img/fiorentina.jpg'
            ],
            [
                "name" => 'Gnocchi di Patate',
                "img" => 'img/gnocchi.jpg'
            ],

        ];
        for ($i = 1; $i <= 20; $i++) {
            foreach ($dishes as $dish) {
                $newDish = new Dish();
                $newDish->name = $dish['name'];
                $newDish->slug = Str::slug($dish['name'], '-');
                $newDish->restaurant_id = $i;
                $newDish->image = $dish['img'];
                $newDish->ingredients = $faker->words(6, true);
                $newDish->price = $faker->randomFloat(2, 5, 20);  // Prezzo compreso tra 5 e 20 euro
                $newDish->visibility = $faker->boolean;
                $newDish->save();
            }
        }
    }
}
