@extends ('layouts.master')

@section('meta-tags')
	<meta name="description" content="{{ $post->meta['meta_description'] }}">
	<meta name="keywords" content="{{ implode(', ', $post->tags->pluck('name')->toArray()) }}">
	<meta name="author" content="John Braun">

	<meta name="twitter:title" content="{{ $post->meta['twitter_title'] ?? '' }}">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:description" content="{{ $post->meta['twitter_description'] ?? '' }}">
	<meta name="twitter:site" content="@JhnBrn90">
	<meta name="twitter:image" content="{{ url($post->meta['twitter_image'] ?? '') }}">

	<meta name="og:title" content="{{ $post->meta['opengraph_title'] ?? '' }}">
	<meta name="og:site_name" content="John Braun's weblog">
	<meta name="og:image" content="{{ url($post->meta['opengraph_image'] ?? '') }}">
	<meta name="og:type" content="website">
	<meta name="og:locale" content="en_US">
@endsection

@section('link-tags')
    {{--    Code highlighting --}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/styles/atom-one-light.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/highlight.min.js" defer></script>
@endsection

@section('title') {{ $post->title }} | John Braun @endsection

@section('content')
<main class="sm:mx-auto w-full max-w-5xl sm:w-5/6 md:w-3/4 lg:w-2/3 xl:2/3">
        @include('blog.full-post', ['post' => $post])
</main>
@endsection
