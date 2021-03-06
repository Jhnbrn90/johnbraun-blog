<?php

namespace Tests\Feature;

use App\ArticleAlias;
use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticleAliasTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_redirects_an_alias_to_the_corresponding_article()
    {
        $post = factory(Post::class)->create(['slug' => 'this-is-a-post']);

        $alias = factory(ArticleAlias::class)->create([
            'post_id' => $post->id,
            'slug' => 'this-is-an-alias'
        ]);

        $this->get($alias->path())->assertRedirect($post->path());
    }

    /** @test */
    function a_new_alias_can_be_registered_using_artisan_command()
    {
        $post = factory(Post::class)->create(['slug' => 'original-slug']);
        $alias = 'aliased-slug';

        $this->get("/posts/{$alias}")->assertNotFound();

        $this->artisan("make:alias original-slug {$alias}");

        $this->assertDatabaseHas('article_aliases', [
            'post_id' => $post->id,
            'slug' => $alias,
        ]);

        $this->get("/posts/{$alias}")->assertRedirect($post->route());
    }
}
