<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_post_can_get_its_route()
    {
        $post = factory(Post::class)->create(['slug' => 'test-post']);

        $this->assertEquals(config('app.url') . '/posts/test-post', $post->route());
    }

    /** @test */
    function a_post_can_get_its_path()
    {
        $post = factory(Post::class)->create(['slug' => 'test-post']);

        $this->assertEquals('/posts/test-post', $post->path());
    }
}
