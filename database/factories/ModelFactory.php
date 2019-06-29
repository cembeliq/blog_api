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
        'name' => $faker->word
    ];
});

/**
 * Factory definition for model App\Checklists.
 */
$factory->define(App\Checklists::class, function ($faker) {
    $dt = \Carbon\carbon::now();
    $dateNow = $dt->toDateTimeString();
    return [
        'template_id' => 1,
        "object_domain" => $faker->word,
        "object_id" => $faker->word,
        "description" => $faker->word,
        "is_completed" => true,
        "completed_at" => $faker->word,
        "due" => $dateNow,
        "urgency" => $faker->numberBetween(1, 10),

    ];
});

/**
 * Factory definition for model App\Items.
 */
$factory->define(App\Items::class, function ($faker) {
    $dt = \Carbon\carbon::now();
    $dateNow = $dt->toDateTimeString();
    return [
        'checklist_id' => 1,
        'description' => $faker->text,
        'is_completed' => null,
        'completed_at' => $faker->word,
        'due' => $dateNow,
        'urgency' => $faker->numberBetween(1, 10),
        'updated_by' => $faker->word,
        'assignee_id' => $faker->unique(true)->randomDigit,
        'task_id' => $faker->unique(true)->randomDigit

    ];
});
