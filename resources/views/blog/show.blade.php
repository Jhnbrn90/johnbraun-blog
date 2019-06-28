@extends ('layouts.master')

@section('title')
    {{ $post->title }} | John Braun
@endsection

@section('content')
<main class="sm:mx-auto sm:w-5/6 xl:w-2/3">
        @include('blog.full-post', ['post' => $post])
</main>
@endsection
