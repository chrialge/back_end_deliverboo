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
            'Italiana',
            'Giapponese',
            'Cinese',
            'Peruviana',
            'Messicana',
            'Brasiliana',
            'Pizzeria',
        ];

        foreach ($types as $type) {
            $newType = new Type();
            $newType->name = $type;
            $newType->slug =  Str::slug($newType->name, '-');
            $newType->save();
        };
    }
}
