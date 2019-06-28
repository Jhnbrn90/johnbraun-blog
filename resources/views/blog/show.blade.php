@extends ('layouts.master')

@section('title')
    {{ $post->title }} | John Braun
@endsection

@section('content')
<main class="sm:container sm:mx-auto xl:px-56 lg:px-36 md:px-16">
        @include('blog.full-post', ['post' => $post])
</main>
@endsection
