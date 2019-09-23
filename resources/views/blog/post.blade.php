<article class="flex mb-10 rounded bg-white shadow-lg p-6">
    <div class="w-full sm:w-3/4 flex flex-col justify-between mr-4">
        <div class="w-full text-justify">
            <a href="/posts/{{ $post->slug }}" class="hover:underline">
                <h3 class="text-3xl font-semibold leading-tight sm:leading-loose text-left">{{ $post->title }}</h3>
            </a>
            <p class="font-thin tracking-wide">
                <!-- {!! Str::words($post->body, 50) !!} -->
                {{ $post->excerpt }}
                <br><br>
                <a class="bg-blue-600 hover:no-underline hover:text-white px-2 py-2 rounded text-blue-100 hover:bg-blue-700 hover:shadow" 
                href="/posts/{{ $post->slug }}">Read more...</a>
            </p>
        </div>

        <div class="text-sm text-gray-600 font-thin mt-6">
            &mdash; Published: {{ $post->publish_date->format('d M Y') }}
        </div>

    </div>
    <div class="sm:w-1/4 sm:block hidden flex justify-end items-start">
        <div class="flex h-auto w-auto overflow-hidden items-start sm:justify-center sm:items-center">
            <img src="{{ $post->featured_image }}">
        </div>
    </div>
</article>