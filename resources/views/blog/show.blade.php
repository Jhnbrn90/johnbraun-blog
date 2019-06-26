@extends ('layouts.master')

@section('title')
    {{ $post->title }} | John Braun
@endsection

@section('content')
<main class="container mx-auto px-48">
    @include('blog.full-post', ['post' => $post])
</main>
@endsection
