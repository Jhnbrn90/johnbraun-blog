@extends ('layouts.master')

@section('title')
    {{ $post->title }} (concept) | John Braun
@endsection

@section('content')
<main class="sm:mx-auto w-full max-w-5xl sm:w-5/6 md:w-3/4 lg:w-2/3 xl:2/3">
        <article class="flex flex-col mb-10 rounded bg-white shadow-lg sm:px-16 px-10 text-justify py-4">
            <div class="text-sm text-gray-600 font-thin">
                &mdash; Concept
            </div>

            <div class="mb-4">
                <div class="flex justify-center pt-3 mb-4">
                    <h3 class="w-3/4 sm:text-4xl text-xl font-semibold leading-loose text-center">
                        {{ $post->title }}
                    </h3>
                </div>

                <div class="flex justify-center">
                    <div class="flex flex-col items-center">
                        <img class="max-w-md h-56 mb-4" src="{{ $post->featured_image }}">
                        <span class="italic text-gray-600"> {{ $post->featured_image_caption }} </span>
                    </div>
                </div>
            </div>

            <div class="text-gray-700">
                {!! $post->body !!}
            </div>
        </article>
</main>
@endsection
