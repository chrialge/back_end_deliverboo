<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $newRestaurant = new Restaurant();
        $newRestaurant->name = 'Ossi di seppia';
        $newRestaurant->slug = Str::slug($newRestaurant->name, '-');
        $newRestaurant->phone_number = '+393200256479';
        $newRestaurant->image = $faker->imageUrl(600, 300, 'restaurant', true, $newRestaurant->name, true, 'jpg');
        $newRestaurant->address = 'Via della Repubblica 30-32';
        $newRestaurant->vat_number = $faker->regexify('[A-Za-z0-9]{11}');
        $newRestaurant->save();
    }
}
