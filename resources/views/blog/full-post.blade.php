<article class="flex flex-col mb-10 rounded bg-white shadow-lg sm:px-16 px-10 text-justify py-4">
    <div class="text-sm text-gray-600 font-thin">
        &mdash; Published: {{ $post->publish_date->format('d-m-Y') }}
    </div>

    <div class="mb-4">
        <div class="flex justify-center pt-3 mb-4">
            <h3 class="w-3/4 sm:text-4xl text-xl font-semibold leading-loose text-center">
                {{ $post->title }}
            </h3>

            <a
                href="https://twitter.com/share?ref_src=twsrc%5Etfw"
                class="twitter-share-button"
                data-text="&quot;{{ rtrim(preg_replace('/\(part\s+1\s?\/\s?\d+\)/', '', $post->title)) }}&quot;"
                data-show-count="false"
                data-via="JhnBrn90"
            >
                Tweet
            </a>
            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
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
