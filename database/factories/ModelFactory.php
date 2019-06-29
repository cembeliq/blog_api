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
    ];
});

/**
 * Factory definition for model App\Templates.
 */
$factory->define(App\Templates::class, function ($faker) {
    return [
        // Fields here
    ];
});

/**
 * Factory definition for model App\Checklists.
 */
$factory->define(App\Checklists::class, function ($faker) {
    return [
        'template_id' => $faker->key,
    ];
});

/**
 * Factory definition for model App\Checklists.
 */
$factory->define(App\Checklists::class, function ($faker) {
    return [
        'template_id' => $faker->key,
    ];
});

/**
 * Factory definition for model App\Items.
 */
$factory->define(App\Items::class, function ($faker) {
    return [
        'checklist_id' => $faker->key,
    ];
});
