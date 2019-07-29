<?php

namespace App;

use Wink\WinkPost;

class Post extends WinkPost
{
    protected $table = 'wink_posts';

    public function previewPath()
    {
        return "/preview/{$this->slug}";
    }

    public function previewLink()
    {
        return config('app.url') . '/preview/' . $this->slug;
    }

    public function scopeConcept()
    {
        return $query->where('published', 0);
    }
}
