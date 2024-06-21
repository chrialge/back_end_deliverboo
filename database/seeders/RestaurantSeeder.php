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
                'name' => 'Ossi di seppia',
                'user_id' => 1,
                'image' => 'https://media-cdn.tripadvisor.com/media/photo-f/06/13/cd/d5/venite-a-provare-le-nostre.jpg',
                'types' => [
                    5, 9
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
                'name' => 'Ristorante Il Ponte',
                'user_id' => 3,
                'image' => 'https://media-cdn.tripadvisor.com/media/photo-s/06/70/4e/17/il-ponte.jpg',
                'types' => [
                    1, 9
                ]
            ],
            [
                'name' => 'Pizzeria Bella Napoli',
                'user_id' => 4,
                'image' => 'https://media-cdn.tripadvisor.com/media/photo-s/03/f9/35/44/bella-napoli.jpg',
                'types' => [
                    1, 9
                ]
            ],
            [
                'name' => 'La Taverna',
                'user_id' => 5,
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ22du8dJ7MnFL-mDQmH5qSI3kTqA-zC9-fiw&s',
                'types' => [
                    6, 7, 10
                ]
            ],
            [
                'name' => 'Ristorante La Pergola',
                'user_id' => 6,
                'image' => 'https://www.positanonews.it/photogallery_new/images/2017/02/foto-ristorante-la-pergola-3174634.660x368.jpg',
                'types' => [
                    1, 9
                ]
            ],
            [
                'name' => 'Ristorante Al Dente',
                'user_id' => 7,
                'image' => 'https://media-cdn.tripadvisor.com/media/photo-s/06/40/8d/f8/front.jpg',
                'types' => [
                    1, 7
                ]
            ],
            [
                'name' => 'Kebab Mesopotamia',
                'user_id' => 8,
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSNweYNZM49AkebHWfHzAScNO1zhIsg2IbAzQ&s',
                'types' => [
                    1, 6
                ]
            ],
            [
                'name' => 'Sushi Corner',
                'user_id' => 9,
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfUuphkHQxSsUgEWRIPe2KZf-0v4FTg1YOgQ&s',
                'types' => [
                    2, 11
                ]
            ],
            [
                'name' => 'Canton',
                'user_id' => 10,
                'image' => 'https://c8.alamy.com/compit/f4r6fh/la-londra-chinatown-canton-ristorante-cinese-f4r6fh.jpg',
                'types' => [
                    2, 12, 13
                ]
            ],
            [
                'name' => 'Rio',
                'user_id' => 11,
                'image' => 'https://www.galluraoggi.it/wp-content/uploads/2022/04/IMG20220506200418-scaled.jpg',
                'types' => [
                    15, 18
                ]
            ],
            [
                'name' => "Yane's",
                'user_id' => 12,
                'image' => 'https://cdn.foodiestrip.com/restaurant_image/5d0b51661fc7117164fa6c14/images/1280x853/yane%E2%80%99s-churros-&-tapas-ristorante-localit%C3%A0-renella1570437013257.jpg',
                'types' => [
                    14, 16, 17
                ]
            ],
            [
                'name' => 'Jaipur',
                'user_id' => 13,
                'image' => 'https://www.jaipur.to.it/wp-content/uploads/2020/02/ristorante-indiano-torino-105-scaled.jpg',
                'types' => [
                    21
                ]
            ],
            [
                'name' => 'Beirut',
                'user_id' => 14,
                'image' => 'https://qul.imgix.net/0f4454e0-1743-43d4-a768-4af41a7edeba/169776_landscape.jpg',
                'types' => [
                    20
                ]
            ],
            [
                'name' => 'Pasticceria il Duomo',
                'user_id' => 15,
                'image' => 'https://lh3.googleusercontent.com/p/AF1QipOhcQgsLwCp5RX1khZMOkk-GaljyFYWShHR3KGx=s1360-w1360-h1020',
                'types' => [
                    3
                ]
            ],
            [
                'name' => 'POKE fintness',
                'user_id' => 16,
                'image' => 'https://truerefrigeration.co.uk/wp-content/uploads/2022/11/IMG_0559_Edit.jpg',
                'types' => [
                    4, 5
                ]
            ],
            [
                'name' => 'Osteria La Campana',
                'user_id' => 17,
                'image' => 'https://www.lucianopignataro.it/wp-content/uploads/2013/04/campana-ingresso.jpg',
                'types' => [
                    5, 9
                ]
            ],
            [
                'name' => 'Trattoria Al Vecchio Mulino',
                'user_id' => 18,
                'image' => 'https://www.valdifassa.com/wp-content/uploads/2016/05/Vecchio-mulino.jpg',
                'types' => [
                    9
                ]
            ],
            [
                'name' => 'Ristorante Il Pescatore',
                'user_id' => 19,
                'image' => 'https://www.ristoranteilpescatore.it/assets/img/gallery/home/01.jpg',
                'types' => [
                    9
                ]
            ],
            [
                'name' => 'Ristorante La Dolce Vita',
                'user_id' => 20,
                'image' => 'https://backend.squisitalia.it/img/foto/locali/16172_1.jpg',
                'types' => [
                    9
                ]
            ]
        ];


        foreach ($restaurantNames as $restaurant) {
            $newRestaurant = new Restaurant();
            $newRestaurant->name = $restaurant['name'];
            $newRestaurant->slug = Str::slug($restaurant['name'], '-');
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
