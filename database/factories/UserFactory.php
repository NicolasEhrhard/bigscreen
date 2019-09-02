<?php
/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'role' => 'utilisateur',
        'lien' =>  Str::uuid()->toString(),
        'password' => Hash::make($faker->password),
        'remember_token' => Str::random(10),
    ];
});
