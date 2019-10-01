<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use App\Webmention;
use Faker\Generator as Faker;

$factory->define(Webmention::class, function (Faker $faker) {
    return [
        'author_name'   => $faker->name,
        'author_photo'  => 'https://some.link/photo.jpg',
        'author_link'   => 'https://some.link/to/profile',
        'type'          => 'in-reply-to',
        'link'          => 'https://some.interaction/link',
        'webmention_id' => $faker->numberBetween(1, 9999999),
        'post_id'       => function () {
            return factory(Post::class);
        }
    ];
});
