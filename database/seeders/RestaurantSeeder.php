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
            [
                'name' => 'Trattoria Al Vecchio Mulino',
                'user_id' => 1,
                'image' => 'https://www.valdifassa.com/wp-content/uploads/2016/05/Vecchio-mulino.jpg',
                'types' => [
                    9
                ]
            ],
            [
                'name' => 'Trattoria da Mario',
                'user_id' => 2,
                'image' => 'https://lh3.googleusercontent.com/p/AF1QipOMf-6gbOlopGT2_Vk4S7DqRyyXQN7Ysf-HXEDm=s680-w680-h510',
                'types' => [
                    8,
                ]
            ],
            [
                'name' => 'Pizzeria Bella Napoli',
                'user_id' => 3,
                'image' => 'https://media-cdn.tripadvisor.com/media/photo-s/03/f9/35/44/bella-napoli.jpg',
                'types' => [
                    1,
                    9
                ]
            ],
            [
                'name' => 'Sushi Corner',
                'user_id' => 4,
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfUuphkHQxSsUgEWRIPe2KZf-0v4FTg1YOgQ&s',
                'types' => [
                    2,
                    11
                ]
            ],
            [
                'name' => 'Canton',
                'user_id' => 5,
                'image' => 'https://c8.alamy.com/compit/f4r6fh/la-londra-chinatown-canton-ristorante-cinese-f4r6fh.jpg',
                'types' => [
                    2,
                    12,
                    13
                ]
            ],

            [
                'name' => "Yane's",
                'user_id' => 6,
                'image' => 'https://cdn.foodiestrip.com/restaurant_image/5d0b51661fc7117164fa6c14/images/1280x853/yane%E2%80%99s-churros-&-tapas-ristorante-localit%C3%A0-renella1570437013257.jpg',
                'types' => [
                    14,
                    16,
                    17
                ]
            ],
            [
                'name' => 'Jaipur',
                'user_id' => 7,
                'image' => 'https://www.jaipur.to.it/wp-content/uploads/2020/02/ristorante-indiano-torino-105-scaled.jpg',
                'types' => [
                    21
                ]
            ],
            [
                'name' => 'Beirut',
                'user_id' => 8,
                'image' => 'https://qul.imgix.net/0f4454e0-1743-43d4-a768-4af41a7edeba/169776_landscape.jpg',
                'types' => [
                    20
                ]
            ],
            [
                'name' => 'Pasticceria il Duomo',
                'user_id' => 9,
                'image' => 'https://lh3.googleusercontent.com/p/AF1QipOhcQgsLwCp5RX1khZMOkk-GaljyFYWShHR3KGx=s1360-w1360-h1020',
                'types' => [
                    3
                ]
            ],
            [
                'name' => 'POKE fintness',
                'user_id' => 10,
                'image' => 'https://truerefrigeration.co.uk/wp-content/uploads/2022/11/IMG_0559_Edit.jpg',
                'types' => [
                    4,
                    5
                ]
            ],



        ];


        foreach ($restaurantNames as $restaurant) {
            $newRestaurant = new Restaurant();
            $newRestaurant->name = $restaurant['name'];
            $slug_checker = Restaurant::where('name', $newRestaurant->name)->count();
            if ($slug_checker) {
                $slug = Str::slug($newRestaurant->name, '-') . '-' . $slug_checker + 1;
            } else {
                $slug = Str::slug($newRestaurant->name, '-');
            }
            $newRestaurant->slug = $slug;
            $newRestaurant->phone_number = '340' . $faker->randomNumber(7, true);
            $newRestaurant->user_id = $restaurant['user_id'];
            $newRestaurant->image = $restaurant['image'];
            $newRestaurant->address = 'Via ' . $faker->streetName . ' ' . $faker->numberBetween(1, 100);
            $newRestaurant->vat_number = $faker->randomNumber(5, true) . $faker->randomNumber(6, true); //randomNumber ha un massimo d 10 numeri generabili, quindi ne concateno 2 per ottemerme 11. Volendo c'è anche il faker per il VAT italiano ma restituisce anche il IT all'inizio, dovremmo modificare la tabella 
            $newRestaurant->save();
            $newRestaurant->types()->attach($restaurant['types']);
        }
    }
}
