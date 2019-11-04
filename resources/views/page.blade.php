<article class="flex flex-col mb-10 rounded bg-white shadow-lg sm:px-16 px-10 text-justify py-4">

    <div class="mb-4">
        <div class="flex justify-center pt-3 mb-4">
            <h3 class="w-3/4 sm:text-4xl text-xl font-semibold leading-loose text-center">
                {{ $page->title }}
            </h3>
        </div>
    </div>

    <div class="text-gray-700">
        {!! $page->body !!}
    </div>
</article>
