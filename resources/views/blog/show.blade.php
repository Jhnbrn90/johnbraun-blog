@extends ('layouts.master')

@section('title')
    {{ $post->title }} | John Braun
@endsection

@section('content')
<main class="container mx-auto xl:px-20 lg:px-10 md:px-5 px-5">
    @include('blog.full-post', ['post' => $post])
</main>
@endsection
