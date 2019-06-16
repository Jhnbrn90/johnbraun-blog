@extends ('layouts.master')

@section('content')
<main class="container mx-auto px-48">
    @include('blog.full-post', ['post' => $post])
</main>
@endsection
