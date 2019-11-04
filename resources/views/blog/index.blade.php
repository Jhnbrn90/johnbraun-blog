@extends ('layouts.master')

@section('title')
    {{ config('app.name') }}
@endsection

@section('meta-tags')

	<meta name="description" content="John Braun's weblog, mostly featuring articles Laravel, VueJS and programming related.">
	<meta name="keywords" content="John Braun, Laravel, Tech, VueJS, tutorial">
	<meta name="author" content="John Braun">

	<meta name="twitter:title" content="John Braun | weblog">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:description" content="John Braun's weblog, mostly featuring articles Laravel, VueJS and programming related.">
	<meta name="twitter:site" content="@JhnBrn90">
	<meta name="twitter:image" content="{{ url('images/profile_resized.png') }}">

	<meta name="og:title" content="John Braun | weblog">
	<meta name="og:site_name" content="John Braun's weblog">
	<meta name="og:image" content="{{ url('images/profile_resized.png') }}">
	<meta name="og:type" content="website">
	<meta name="og:locale" content="en_US">
@endsection

@section ('content')
<main class="sm:mx-auto w-full max-w-5xl sm:w-5/6 md:w-3/4 lg:w-2/3 xl:2/3">
    @foreach ($posts as $post)
        @include('blog.post', ['post' => $post])
    @endforeach
</main>
@endsection
