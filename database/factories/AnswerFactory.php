<?php
/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Answer;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'role' => 'utilisateur',
        'password' => Hash::make($faker->password),
        'remember_token' => Str::random(10),
    ];
});
