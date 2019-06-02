<article class="flex flex-col mb-10 rounded bg-white shadow-lg px-12 py-4">
    <div class="text-sm text-gray-600 font-thin">
        &mdash; Published: {{ $post->publish_date->format('d-m-Y') }}
    </div>

    <div class="mb-4">
        <div class="block">
            <h3 class="text-4xl text-center font-semibold leading-loose">{{ $post->title }}</h3>
        </div>
        <div class="flex justify-center">
            <img class="max-w-md h-48" src="{{ $post->featured_image }}">
        </div>
    </div>

    <div class="overflow-hidden text-gray-700">
        {!! $post->body !!}
    </div>
</article>