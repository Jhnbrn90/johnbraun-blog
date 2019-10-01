<?php

namespace Tests\Unit;

use App\Post;
use App\Webmention;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WebmentionTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        \Artisan::call('wink:migrate');
    }

    /** @test */
    function a_webmention_has_an_author_name()
    {
        $mention = factory(Webmention::class)->create(['author_name' => 'John Doe']);
        $this->assertEquals('John Doe', $mention->author_name);
    }

    /** @test */
    function a_webmention_has_an_author_photo()
    {
        $mention = factory(Webmention::class)->create(['author_photo' => 'https://link.to/photo.jpg']);
        $this->assertEquals('https://link.to/photo.jpg', $mention->author_photo);
    }

    /** @test */
    function a_webmention_has_an_author_link()
    {
        $mention = factory(Webmention::class)->create(['author_link' => 'https://link.to/author/profile']);
        $this->assertEquals('https://link.to/author/profile', $mention->author_link);
    }

    /** @test */
    function a_webmention_has_a_type()
    {
        $mention = factory(Webmention::class)->create(['type' => 'in-reply-to']);
        $this->assertEquals('in-reply-to', $mention->type);
    }

    /** @test */
    function a_webmention_has_a_link()
    {
        $mention = factory(Webmention::class)->create(['link' => 'https://interaction.link/to/13012']);
        $this->assertEquals('https://interaction.link/to/13012', $mention->link);
    }

    /** @test */
    function a_webmention_has_a_webmention_id()
    {
        $mention = factory(Webmention::class)->create(['webmention_id' => 12391301]);
        $this->assertEquals(12391301, $mention->webmention_id);
    }

    /** @test */
    function a_webmention_can_have_content()
    {
        $mention = factory(Webmention::class)->create(['content' => 'This is some reply.']);
        $this->assertEquals('This is some reply.', $mention->content);
    }

    /** @test */
    function a_webmention_has_a_post_id()
    {
        $post = factory(Post::class)->create();
        $mention = factory(Webmention::class)->create(['post_id' => $post->id]);
        $this->assertEquals($post->id, $mention->post_id);
    }
}
