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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name'           => $faker->name,
        'email'          => $faker->email,
        'remember_token' => null,
    ];
});

$factory->define(App\Document::class, function (Faker\Generator $faker) {
    return [
        // 'user_id' => factory(App\User::class)->create()->id,
        'name'    => $faker->company,
        'content' => $faker->text,
    ];
});