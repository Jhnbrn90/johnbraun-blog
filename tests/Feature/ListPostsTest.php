<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Post;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListPostsTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    function all_published_posts_are_shown()
    {
        // Given we have two published posts
        $firstPost = factory(Post::class)->state('published')->create(['title' => 'Published post']);
        $secondPost = factory(Post::class)->state('published')->create(['title' => 'Published post #2']);

        // And one draft
        $draft = factory(Post::class)->state('unpublished')->create(['title' => 'This is a draft']);

        // When visiting the homepage
        $response = $this->get('/');

        // We expect to see the two published posts
        $response->assertSee($firstPost->title);
        $response->assertSee($secondPost->title);

        // But not the draft
        $response->assertDontSee($draft->title);
    }

    /** @test **/
    function only_the_first_post_of_a_series_is_shown_on_the_index()
    {
        $singlePosts = factory(Post::class, 5)->create(['publish_date' => now()]);

        for ($i = 1; $i < 4; $i++) {
            $firstSeries[] = factory(Post::class)->create([
                'title'         => "This is a first series (part {$i}/3)",
                'publish_date'  => now(),
            ]);

            $secondSeries[] = factory(Post::class)->create([
                'title'         => "This is a second series (part {$i}/3)",
                'publish_date'    => now()->subDays(1),
            ]);
        }

        $response = $this->get('/');

        $response->assertViewHas('posts', function ($posts) use ($singlePosts, $firstSeries, $secondSeries) {
            return $posts->contains($firstSeries[0])
            && $posts->contains($secondSeries[0])
            && !$posts->contains($firstSeries[1])
            && !$posts->contains($firstSeries[2])
            && !$posts->contains($secondSeries[1])
            && !$posts->contains($secondSeries[2])
            && $posts->contains($singlePosts[0])
            && $posts->contains($singlePosts[1])
            && $posts->contains($singlePosts[2])
            && $posts->contains($singlePosts[3])
            && $posts->contains($singlePosts[4]);
        });

        $response->assertSee('This is a first series');
        $response->assertSee('This is a second series');
    }
}
