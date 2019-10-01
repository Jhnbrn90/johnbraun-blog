<?php

namespace App\Http\Controllers;

use App\Jobs\UpdateWebmentions;
use App\Post;
use App\Services\WebmentionsCollector;

class WebmentionsController extends Controller
{
    public function store()
    {
        $this->validateSecret();
        $post = $this->findPost();

        dispatch(new UpdateWebmentions($post));
    }

    public function validateSecret(): void
    {
        if (request('secret') !== config('services.webmentions.secret')) {
            abort(403);
        }
    }

    public function findPost()
    {
        preg_match('/posts\/(.*)/', request('target'), $matches);

        $post = Post::where('slug', $matches[1])->first();

        if (!$post) {
            abort(403);
        }

        return $post;
    }
}
