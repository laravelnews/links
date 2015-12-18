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
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->domainWord,
        'slug' => strtolower($faker->domainWord),
    ];
});

$factory->define(App\Links::class, function (Faker\Generator $faker) {
    return [
        'category_id' => 1,
        'user_id' => 1,
        'title' => $faker->catchPhrase,
        'url' => $faker->url,
        'description' => $faker->text,
        'published' => 1,
    ];
});