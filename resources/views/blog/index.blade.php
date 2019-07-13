@extends ('layouts.master')

@section('title')
    {{ config('app.name') }}
@endsection

@section ('content')
<!-- <main class="container mx-auto px-10"> -->
<main class="sm:mx-auto w-full max-w-5xl sm:w-5/6 md:w-3/4 lg:w-2/3 xl:2/3">
    @foreach ($posts as $post)
        @include('blog.post', ['post' => $post])
    @endforeach
</main>
@endsection
