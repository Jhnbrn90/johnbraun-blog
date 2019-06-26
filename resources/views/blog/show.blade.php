@extends ('layouts.master')

@section('title')
    {{ $post->title }} | John Braun
@endsection

@section('content')
<main class="container mx-auto lg:px-10 md:px-5 px-2">
    @include('blog.full-post', ['post' => $post])
</main>
@endsection
