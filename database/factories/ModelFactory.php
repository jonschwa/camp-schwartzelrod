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
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Guest::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'is_staying' => $faker->boolean(),
        'is_adult' => $faker->boolean(),
        'interested_archery' => $faker->boolean(),
        'interested_swimming' => $faker->boolean(),
        'interested_boating' => $faker->boolean(),
        'interested_good_time' => $faker->boolean(),
        'interested_arts_and_crafts' => $faker->boolean(),
        'interested_sports' => $faker->boolean()
    ];
});

$factory->define(App\Village::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word
    ];
});

$factory->define(App\Cabin::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'capacity' => rand(4,10)
    ];
});

$factory->define(App\Invitation::class, function (Faker\Generator $faker) {
    return [
        'code' => substr(sha1(time() . $faker->word),0,8)
    ];
});

$factory->define(App\Rsvp::class, function (Faker\Generator $faker) {
    return [
        'will_attend' => $faker->boolean(),
        'num_gusts' => rand(1,5)
    ];
});

$factory->define(App\Activity::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word
    ];
});