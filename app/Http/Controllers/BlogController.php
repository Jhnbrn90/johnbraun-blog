<?php

namespace App\Http\Controllers;

use Wink\WinkPage;
use Wink\WinkPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = WinkPost::with('tags')
            ->live()
            ->orderBy('publish_date', 'DESC')
            ->simplePaginate(12);

        return view('blog.index', [
            'posts' => $posts
        ]);
    }

    public function show($slug)
    {
        $post = WinkPost::with('tags')
            ->live()
            ->whereSlug($slug)
            ->firstOrFail();

        return view('blog.show', compact('post'));
    }

    public function about()
    {
        $page = WinkPage::whereSlug('about')->firstOrFail();
        
        return view('blog.about', compact('page'));
    }
}
