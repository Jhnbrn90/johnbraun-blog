<?php

namespace App;

use Wink\WinkPost;

class Post extends WinkPost
{
    protected $table = 'wink_posts';

    public function webmentions()
    {
        return $this->hasMany(Webmention::class)->latest();
    }

    public function path()
    {
        return "/posts/{$this->slug}";
    }

    public function route()
    {
        return route('posts.show', ['slug' => $this->slug]);
    }

    public function previewPath()
    {
        return "/preview/{$this->slug}";
    }

    public function previewLink()
    {
        return config('app.url') . '/preview/' . $this->slug;
    }

    public function scopeConcept($query)
    {
        return $query->where('published', 0);
    }

    public function scopeSingle($query)
    {
        return $query->where('title', 'NOT LIKE', '%part%');
    }

    public function scopeSeries($query)
    {
        return $query->where('title', 'LIKE', '%part%');
    }
}
