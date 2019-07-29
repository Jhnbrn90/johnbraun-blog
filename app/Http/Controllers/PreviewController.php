<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PreviewController extends Controller
{
    public function show($slug)
    {
        $post = Post::draft()->whereSlug($slug)->first();
        
        if (! $post) {
            abort(404);
        }

        return view('preview.show', compact('post'));
    }
}
