<?php

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

$factory->define(App\Models\User::class, function(Faker\Generator $faker){
    return 
    [
        'nome' => $faker->word,
        'email' => $faker->word,
        'cpf' => $faker->word,
        'telefone' => $faker->word,
        'latitude' => $faker->word,
        'longitude' => $faker->word,
        'created_at' => time(),
        'updated_at' => time()
    ];
});