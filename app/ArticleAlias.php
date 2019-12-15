<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleAlias extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function path()
    {
        return "/posts/{$this->slug}";
    }
}
