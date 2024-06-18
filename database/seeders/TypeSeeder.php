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
            'Pizza', //0
            'Sushi', //1
            'Dessert', //2
            'Poke', //3
            'Healthy', //4
            'Hamburger', //5
            'Kebab', //6
            'Sandwich', //7
            'Italiano', //8
            'Americano', //9
            'Giapponese', //10
            'Cinese', //11
            'Francese', //12
            'Argentino', //13
            'Brasiliano', //14
            'Peruviano', //15
            'Spagnolo', //16
            'Portoghese', //17
            'Thailandese', //18
            'Libanese', //19
            'Indiano', //20
        ];

        foreach ($types as $type) {
            $newType = new Type();
            $newType->name = $type;
            $newType->slug =  Str::slug($newType->name, '-');
            $newType->save();
        };
    }
}
