<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
    $classArr = [
        'X IPA I',
        'X IPA II',
        'X IPA III',
        'X IPA IV',
        'X IPA V',
        'X IPA VI',
    ];
    return [
        'name' => $faker->name,
        'username' => $faker->unique()->userName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'class' => $classArr[rand(0, 1)],
        'phoneNumber' => $faker->phoneNumber,
        'password' => Hash::make($faker->password), // password
        'remember_token' => Str::random(10),
    ];
});
