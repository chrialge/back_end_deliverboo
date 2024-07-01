<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('it_IT');

        $userEmails = [
            'test1@admin.com',
            'test2@admin.com',
            'test3@admin.com',
            'test4@admin.com',
            'test5@admin.com',
            'test6@admin.com',
            'test7@admin.com',
            'test8@admin.com',
            'test9@admin.com',
            'test10@admin.com',
            /*             'test11@admin.com',
            'test12@admin.com',
            'test13@admin.com',
            'test14@admin.com',
            'test15@admin.com',
            'test16@admin.com',
            'test17@admin.com',
            'test18@admin.com',
            'test19@admin.com',
            'test20@admin.com', */
        ];

        foreach ($userEmails as $key => $email) {
            $newUser = new User();
            $newUser->name = $faker->firstName();
            $newUser->last_name = $faker->lastname();
            $name = Str::slug($newUser->name);

            $lastname = Str::slug($newUser->last_name, '_');
            $checkEmail = User::where('name', $name)->where('last_name', $lastname)->count();
            if ($checkEmail) {
                $newUser->email = $name . '.' . $lastname . $checkEmail + 1 . '@gmail.com';
            }
            $newUser->email = $name . '.' . $lastname . '@gmail.com';
            $newUser->password = Hash::make('password');
            $newUser->save();
        }
    }
}
