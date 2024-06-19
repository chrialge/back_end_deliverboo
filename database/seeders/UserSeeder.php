<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create('it_IT');

        $userEmails = [
            'ciao1@ciao.com',
            'ciao2@ciao.com',
            'ciao3@ciao.com',
            'ciao4@ciao.com',
            'ciao5@ciao.com',
            'ciao6@ciao.com',
            'ciao7@ciao.com',
            'ciao8@ciao.com',
            'ciao9@ciao.com',
            'ciao10@ciao.com',
            'ciao11@ciao.com',
            'ciao12@ciao.com',
            'ciao13@ciao.com',
            'ciao14@ciao.com',
            'ciao15@ciao.com',
            'ciao16@ciao.com',
            'ciao17@ciao.com',
            'ciao18@ciao.com',
            'ciao19@ciao.com',
            'ciao20@ciao.com',
        ];

        foreach ($userEmails as $key => $email) {
            $newUser = new User();
            $newUser->name = $faker->firstName();
            $newUser->last_name = $faker->lastname();
            $newUser->email = $email;
            $newUser->password = Hash::make('password');
            $newUser->save();
        }
    }
}
