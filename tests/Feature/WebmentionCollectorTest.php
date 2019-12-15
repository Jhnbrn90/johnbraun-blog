<?php

namespace Tests\Feature;

use App\Jobs\UpdateWebmentions;
use App\Post;
use App\Services\WebmentionsCollector;
use App\Webmention;
use Illuminate\Support\Facades\Bus;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WebmentionCollectorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_can_collect_webmentions()
    {
        $post = factory(Post::class)->create([
            'slug'  => 'some-post-with-webmentions',
        ]);

        $json = file_get_contents(base_path('tests/Feature/fakes/webmentions.json'));

        $collector = new WebmentionsCollector($post, $json);

        $this->assertCount(0, Webmention::all());

        $collector->save();

        $this->assertCount(2, Webmention::all());

        $this->assertDatabaseHas('webmentions', [
            'post_id'       => $post->id,
            'author_name'   => 'John Doe',
            'author_link'   => 'https://twitter.com/johndoe',
            'author_photo'  => 'https://some.photo/1.jpg',
            'link'          => 'https://some.interaction/link',
            'type'          => 'mention-of',
            'content'       => 'Some text content for post 1',
            'webmention_id' => 1,
        ]);

        $this->assertDatabaseHas('webmentions', [
            'post_id'       => $post->id,
            'author_name'   => 'Jane Doe',
            'author_link'   => 'https://twitter.com/janedoe',
            'author_photo'  => 'https://some.photo/2.jpg',
            'link'          => 'https://some.interaction/link-2',
            'type'          => 'mention-of',
            'content'       => 'Some text content for post 2',
            'webmention_id' => 2,
        ]);
    }

    /** @test */
    function it_only_adds_webmentions_which_do_not_exist_in_the_database_yet()
    {
        $post = factory(Post::class)->create([
            'slug'  => 'some-post-with-webmentions',
        ]);

        $webmention = factory(Webmention::class)->create([
            'post_id'       => $post->id,
            'author_name'   => 'John Smith',
            'author_link'   => 'https://twitter.com/johnsmith',
            'author_photo'  => 'https://some.photo/smith.jpg',
            'link'          => 'https://some.interaction/link/to/smith',
            'type'          => 'mention-of',
            'webmention_id' => 1,
        ]);

        $this->assertDatabaseHas('webmentions', [
            'post_id'       => $post->id,
            'author_name'   => 'John Smith',
            'author_link'   => 'https://twitter.com/johnsmith',
            'author_photo'  => 'https://some.photo/smith.jpg',
            'link'          => 'https://some.interaction/link/to/smith',
            'type'          => 'mention-of',
            'webmention_id' => 1,
        ]);

        $this->assertCount(1, Webmention::all());

        $json = file_get_contents(base_path('tests/Feature/fakes/webmentions.json'));
        $collector = new WebmentionsCollector($post, $json);

        $collector->save();

        $this->assertCount(2, Webmention::all());

        $this->assertDatabaseMissing('webmentions', [
            'post_id'       => $post->id,
            'author_name'   => 'John Doe',
            'author_link'   => 'https://twitter.com/johndoe',
            'author_photo'  => 'https://some.photo/1.jpg',
            'link'          => 'https://some.interaction/link',
            'type'          => 'mention-of',
            'content'       => 'Some text content for post 1',
            'webmention_id' => 1,
        ]);

        $this->assertDatabaseHas('webmentions', [
            'post_id'       => $post->id,
            'author_name'   => 'Jane Doe',
            'author_link'   => 'https://twitter.com/janedoe',
            'author_photo'  => 'https://some.photo/2.jpg',
            'link'          => 'https://some.interaction/link-2',
            'type'          => 'mention-of',
            'content'       => 'Some text content for post 2',
            'webmention_id' => 2,
        ]);
    }

    /** @test */
    function an_incoming_webhook_with_an_invalid_secret_is_rejected()
    {
        $this->post('webmentions', [
            'secret'    => 'not-valid',
            'target'    => '',
        ])->assertForbidden();

        $this->assertCount(0, Webmention::all());
    }

    /** @test */
    function a_valid_secret_updates_the_webmentions()
    {
        Bus::fake();

        $post = factory(Post::class)->create(['slug' => 'some-blog-post']);

        $this->post('webmentions', [
            'secret'    => config('services.webmentions.secret'),
            'target'    => 'https://johnbraun.blog/posts/some-blog-post'
        ])->assertOk();

        Bus::assertDispatched(UpdateWebmentions::class, function ($job) use ($post) {
            return $job->post->id === $post->id;
        });
    }
}
