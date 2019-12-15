<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ArticleAlias;
use App\Post;
use Faker\Generator as Faker;

$factory->define(ArticleAlias::class, function (Faker $faker) {
    $post = factory(Post::class)->create();

    return [
        'post_id' => $post->id,
        'slug' => $post->slug . '_alias',
    ];
});
