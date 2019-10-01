<?php

namespace App\Http\Controllers;

use App\Post;
use Wink\WinkPage;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::single()
            ->with('tags')
            ->live()
            ->orderBy('publish_date', 'DESC')
            ->get();

        $series = Post::series()
            ->with('tags')
            ->live()
            ->orderBy('publish_date', 'DESC')
            ->get();

        $series = $series->filter(function ($post) {
            return preg_match('/part\s+1\s?\/\s?\d+/', $post->title, $match);
        })->map(function ($post) {
            $post->title = rtrim(preg_replace('/\(part\s+1\s?\/\s?\d+\)/', '', $post->title));
            return $post;
        });

        $posts = $posts->merge($series)->sortByDesc('publish_date');

        return view('blog.index', [
            'posts' => $posts
        ]);
    }

    public function show($slug)
    {
        $post = Post::with(['tags', 'webmentions'])
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
