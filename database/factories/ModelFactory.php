<?php

use App\Repositories\Host\Host;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Repositories\User\User::class, function (Faker\Generator $faker) {
    return [
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('admin'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Repositories\Host\Host::class, function (Faker\Generator $faker) {
    return [
        'codigo' => 'A25',
        'nombre' => 'Servidor Central',
        'direccion' => 'Guatemala,Guatemala'
    ];
});

$factory->define(App\Repositories\Branch\Branch::class, function (Faker\Generator $faker) {
    return [
        'idHost' => App\Repositories\Host\Host::all()->random()->id,
        'nombre' => $faker->name,
        'area' => $faker->city,
        'fecha' => $faker->date()
    ];
});


