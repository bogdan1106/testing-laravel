<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'genre' => $faker->word,
        'author' => $faker->name,
    ];
});
