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

$factory->define(charliegoestolondon\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(charliegoestolondon\Post::class, function (Faker $faker) {
return [
        'user_id' => function(){
            return factory('charliegoestolondon\User')->create()->id;
        },
        'title' => $faker->sentence,
        'body' => $faker->paragraph
    ];
});

$factory->define(charliegoestolondon\Comment::class, function (Faker $faker) {
return [
        'post_id' => function(){
            return factory('charliegoestolondon\Post')->create()->id;
        },
        'name' => $faker->name,
        'body' => $faker->paragraph
    ];
});
