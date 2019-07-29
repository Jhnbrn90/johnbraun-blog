<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PreviewPostTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        \Artisan::call('wink:migrate');       
    }

    /** @test **/
    function a_post_can_be_previewed_by_its_slug()
    {
        $post = factory(Post::class)->states('unpublished')->create([
            'title' => 'Test Post',
            'body'  => 'This is a test post.',
        ]);

        $response = $this->get($post->previewPath());

        $response->assertOk();
        $response->assertSee('Test Post');
        $response->assertSee('This is a test post.');
    }

    /** @test **/
    function published_posts_can_no_longer_be_seen()
    {
        $post = factory(Post::class)->states('published')->create();

        $response = $this->get($post->previewPath());

        $response->assertStatus(404);
    }
}
