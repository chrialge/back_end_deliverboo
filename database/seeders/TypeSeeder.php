<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;


class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                "name" => 'Pizza',
                "icon" => 'icon/pizza.png'
            ],
            [
                "name" => 'Sushi',
                "icon" => 'icon/sushi.png'
            ],
            [
                "name" => 'Dessert',
                "icon" => 'icon/dessert.png'
            ],
            [
                "name" => 'Poke',
                "icon" => 'icon/poke.png'
            ],
            [
                "name" => 'Healthy',
                "icon" => 'icon/healty.png'
            ],
            [
                "name" => 'Hamburger',
                "icon" => 'icon/hamburger.png'
            ],
            [
                "name" => 'Kebab',
                "icon" => 'icon/kebab.png'
            ],
            [
                "name" => 'Sandwich',
                "icon" => 'icon/sandwich.png'
            ],
            [
                "name" => 'Italiano',
                "icon" => 'icon/italiano.png'
            ],
            [
                "name" => 'Americano',
                "icon" => 'icon/americano.png'
            ],
            [
                "name" => 'Giapponese',
                "icon" => 'icon/giaponese.png'
            ],
            [
                "name" => 'Cinese',
                "icon" => 'icon/cinese.png'
            ],
            [
                "name" => 'Francese',
                "icon" => 'icon/francese.png'
            ],
            [
                "name" => 'Argentino',
                "icon" => 'icon/argentina.png'
            ],
            [
                "name" => 'Brasiliano',
                "icon" => 'icon/indiano.png'
            ],
            [
                "name" => 'Peruviano',
                "icon" => 'icon/peruviano.png'
            ],
            [
                "name" => 'Spagnolo',
                "icon" => 'icon/spagnolo.png'
            ],
            [
                "name" => 'Portoghese',
                "icon" => 'icon/portoghese.png'
            ],
            [
                "name" => 'Thailandese',
                "icon" => 'icon/thailandese.png'
            ],
            [
                "name" => 'Libanese',
                "icon" => 'icon/libanese.png'
            ],
            [
                "name" => 'Indiano',
                "icon" => 'icon/indiano.png'
            ],
        ];

        foreach ($types as $type) {
            $newType = new Type();
            $newType->name = $type['name'];
            $newType->slug =  Str::slug($newType->name, '-');
            $newType->icon = $type['icon'];
            $newType->save();
        };
    }
}
