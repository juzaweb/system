<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Tadcms\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'content' => $faker->paragraph,
        'type' => 'posts',
        'created_by' => factory(App\User::class),
        'updated_by' => factory(App\User::class),
        'status' => 'publish',
    ];
});
