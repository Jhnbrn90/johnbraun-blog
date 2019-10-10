<article class="flex flex-col mb-10 rounded bg-white dark:bg-gray-900 dark:border dark:border-gray-800 shadow-lg sm:px-16 px-10 text-justify py-4">
    <div class="text-sm text-gray-600 font-thin">
        &mdash; Published: {{ $post->publish_date->format('d-m-Y') }}
    </div>

    <div class="mb-4">
        <div class="flex justify-center pt-3 mb-4">
            <h3 class="w-3/4 sm:text-4xl text-xl font-semibold leading-loose text-center dark:text-gray-100">
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

    <div class="text-gray-700 dark:text-gray-200">
        {!! $post->body !!}
    </div>
</article>

<div class="flex flex-col mb-10 rounded bg-white dark:bg-gray-900 dark:border dark:border-gray-800 shadow-lg sm:px-16 px-10 text-justify py-4">
    <div class="text-sm text-gray-600 font-normal mb-6 uppercase">
        &mdash; Webmentions
    </div>

    @forelse ($post->webmentions as $mention)
        <div class="flex flex-wrap py-2 dark:text-gray-200">
            <div class="w-full flex items-center">
                <div class="mr-2">
                    <img class="w-6 h-6 border border-gray-800 dark:border-gray-200 shadow-lg rounded-full" src="{{ $mention->author_photo  }}">
                </div>
                <div class="mr-1">{{ $mention->author_name }}</div>
                <div class="">
                    <a href="{{ $mention->link }}">{{ $mention->formattedType }}</a>
                    this post</div>
            </div>
            @if ($mention->content)
            <div class="w-full mt-1 pl-8">
                <p class="italic shadow text-left w-4/5 bg-gray-100 dark:bg-gray-800 p-2 text-gray-700 dark:text-gray-200 text-sm rounded-lg border">
                    {{ $mention->content }}
                </p>
            </div>
            @endif
        </div>
        @empty
        <p class="text-gray-400 text-base dark:text-gray-200">No mentions.</p>
    @endforelse
</div>
