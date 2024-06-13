<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $newDish =  new Dish();
        $newDish->name = 'Pizza Margherita';
        $newDish->slug = Str::slug($newDish->name, '-');
        $newDish->image = $faker->imageUrl(600, 300, 'Dish', true, $newDish->name, true, 'jpg');
        $newDish->ingredients = "Call'e crabittu, Mazzamineddu, Farina, Acqua, Salsa di pomodoro di Maracalagonis, basilico, Olio EVO DOCG";
        $newDish->price = 6.50;
        $newDish->visibility = 0;
        $newDish->save();
    }
}
