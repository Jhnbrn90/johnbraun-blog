<?php

namespace App\Services;

use App\Post;
use App\Webmention;

class WebmentionsCollector
{
    protected $post;
    protected $blogUrl = 'https://johnbraun.blog';
    protected $baseUrl = 'https://webmention.io/api/mentions.jf2?target=';
    protected $webmentions;

    public function __construct(Post $post, $json = null)
    {
        $this->post = $post;

        $this->webmentions = collect($this->getMentions($json));
    }

    protected function getMentions($json = null)
    {
        if ($json) {
            return $this->loadFromJson($json);
        }

        return $this->fetchMentions();
    }

    public function save()
    {
        $this->webmentions->each(function ($mention) {
            $this->createWebmention($mention);
        });
    }

    private function webmentionUrl()
    {
        return $this->baseUrl . $this->postUrl();
    }

    private function postUrl()
    {
        return $this->blogUrl . '/posts/' . $this->post->slug;
    }

    private function loadFromJson($json)
    {
        return json_decode($json, true)["children"];
    }

    private function fetchMentions()
    {
        $json = file_get_contents($this->webmentionUrl(), true);

        return $this->loadFromJson($json);
    }

    private function createWebmention($mention)
    {
        // check if there is already a database entry for the ID
        if (Webmention::where('webmention_id', $mention["wm-id"])->count() > 0) {
            return;
        }

        // otherwise, create a new entry
        Webmention::create([
            'post_id'           => $this->post->id,
            'webmention_id'     => $mention["wm-id"],
            'link'              => $mention["wm-source"],
            'type'              => $mention["wm-property"],
            'content'           => $mention["content"]["text"] ?? null,
            'author_name'       => $mention["author"]["name"],
            'author_photo'      => $mention["author"]["photo"],
            'author_link'       => $mention["author"]["url"],
        ]);
    }
}
