@extends ('layouts.master')

@section('title')
    {{ config('app.name') }}
@endsection

@section ('content')
<main class="container mx-auto px-10">
    @foreach ($posts as $post)
    @include('blog.post', ['post' => $post])
    @endforeach
</main>
@endsection
