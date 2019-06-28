@extends ('layouts.master')

@section('title')
    {{ $post->title }} | John Braun
@endsection

@section('content')
<main class="sm:mx-auto w-full max-w-4xl sm:w-5/6 md:w-3/4 lg:w-2/3 xl:2/3">
        @include('blog.full-post', ['post' => $post])
</main>
@endsection
