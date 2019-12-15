<?php

namespace Tests\Unit;

use App\ArticleAlias;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticleAliasTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function an_article_alias_has_a_post_id_it_refers_to()
    {
        $alias = factory(ArticleAlias::class)->create([
            'post_id' => 'abc123-def456-ghi789',
        ]);

        $this->assertEquals('abc123-def456-ghi789', $alias->post_id);
    }

    /** @test */
    function an_article_alias_has_a_slug()
    {
        $alias = factory(ArticleAlias::class)->create([
            'slug' => 'some-post-alias',
        ]);

        $this->assertEquals('some-post-alias', $alias->slug);
    }
}
