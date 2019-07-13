@extends ('layouts.master')

@section('title')
    {{ $page->title }} | John Braun
@endsection

@section('content')
<main class="sm:mx-auto w-full max-w-5xl sm:w-5/6 md:w-3/4 lg:w-2/3 xl:2/3">
        @include('page', ['page' => $page])
</main>
@endsection
