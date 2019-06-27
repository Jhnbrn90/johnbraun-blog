<article class="flex flex-col mb-10 rounded bg-white shadow-lg px-12 py-4">
    <div class="text-sm text-gray-600 font-thin">
        &mdash; Published: {{ $post->publish_date->format('d-m-Y') }}
    </div>

    <div class="mb-4">
        <div class="block">
            <h3 class="text-4xl text-center font-semibold leading-loose">{{ $post->title }}</h3>
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
