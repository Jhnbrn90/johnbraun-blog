<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Webmention extends Model
{
    protected $guarded = [];

    protected $types = [
        'in-reply-to'   => 'replied to',
        'mention-of'    => 'retweeted',
        'like-of'       => 'likes',
        'repost-of'     => 'retweeted',
    ];

    public function getFormattedTypeAttribute()
    {
        return $this->types[$this->type];
    }
}
