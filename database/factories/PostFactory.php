<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'id'                            => $faker->uuid,
        'body'                          => $faker->paragraph,
        'title'                         => $faker->sentence,
        'author_id'                     => 1,
        'slug'                          => $faker->slug,
        'excerpt'                       => $faker->paragraph,
        'featured_image_caption'        => '/image/fake.png',
        'title'                         => $faker->title,
        'published'                     => 1,
        'publish_date'                  => now(),
    ];
});

$factory->state(Post::class, 'unpublished', function (Faker $faker) {
    return [
        'published'     => 0,
    ];
});

$factory->state(Post::class, 'published', function (Faker $faker) {
    return [
        'published'     => 1,
        'publish_date'  => now(),
    ];
});
