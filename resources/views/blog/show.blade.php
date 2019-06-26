@extends ('layouts.master')

@section('title')
    {{ $post->title }} | John Braun
@endsection

@section('content')
<main class="container mx-auto lg:px-40 md:px-20 px-10">
    @include('blog.full-post', ['post' => $post])
</main>
@endsection
