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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Author::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Book::class, function (Faker\Generator $faker) {
    return [
        'isbn' => $faker->isbn13,
        'title' => $faker->text($maxNbChars = 20),
        'name' => $faker->name,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'color' => $faker->colorName,
        'name' => $faker->word,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Copy::class, function (Faker\Generator $faker) {
    return [
        'datebought' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Loan::class, function (Faker\Generator $faker) {
    return [
        'startdate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'expirydate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'returndate' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Location::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->city,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->jobTitle,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Status::class, function (Faker\Generator $faker) {
    return [
        'status' => $faker->word,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt($faker->password),
        'remember_token' => str_random(10),
    ];
});
