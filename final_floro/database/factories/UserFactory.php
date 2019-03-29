<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    
    return [
            'username' => $faker->name,
            'email' =>$faker->unique()->safeEmail,
            'password' => bcrypt('secret'),
            'firstname' =>$faker->firstName,
            'lastname' =>$faker->lastName,
            'address' => $faker->address,
            'houseno' => $faker->buildingNumber,
            'postalcode' => Str::random(10),
            'city' => $faker->firstName,
            'telephoneno' => Str::random(10),
           
            'remember_token'=>Str::random(5),
             
    ];
});