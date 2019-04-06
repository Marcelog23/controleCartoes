<?php

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

/*CRIA 50 CARTÕES FAKE*/

$factory->define(App\Models\Cartao::class, function (Faker $faker) {
    return [
        //'codg_barra' => $faker->isbn13,
        'codg_barra' => $faker->ean13,
        'status'     => 'NL',

    ];
});


