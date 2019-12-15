<?php

namespace App\Http\Controllers;

use App\Post;

class PreviewController extends Controller
{
    public function show($slug)
    {
        $post = Post::draft()->whereSlug($slug)->first();

        if (! $post) {
            abort(404);
        }

        return view('blog.show', compact('post'));
    }
}
