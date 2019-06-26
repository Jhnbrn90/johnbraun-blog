@extends ('layouts.master')

@section('title')
    {{ $post->title }} | John Braun
@endsection

@section('content')
<main class="container mx-auto lg:px-20 md:px-10 px-4">
    @include('blog.full-post', ['post' => $post])
</main>
@endsection
