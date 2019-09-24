<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
    @yield('meta-tags')

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/styles/atom-one-light.min.css">

    <link rel="apple-touch-icon" sizes="120x120" href="/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icons/favicon-16x16.png">
    <link rel="manifest" href="/icons/site.webmanifest">
    <link rel="mask-icon" href="/icons/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/icons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="John Braun's blog">
    <meta name="application-name" content="John Braun's blog">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/highlight.min.js"></script>
</head>

<body class="bg-gray-100">
    <header class="mb-10 pb-5 pt-8 shadow-lg bg-white px-10">
        <div class="flex container mx-auto lg:max-w-screen">
            <h1 class="flex w-full text-xl">
                <a href="/" class="w-full text-center no-underline text-black font-semibold">
                    John Braun<span class="text-sm font-thin">'s blog</span><img class="ml-5 inline h-12 w-12 shadow-lg rounded-full" src="{{ url('images/profile_resized.png') }}">
                </a>

                <div class="flex flex-1 justify-end">
                    <a href="/about" class="no-underline text-black font-semibold">
                        //<span class="text-sm font-thin">about</span>
                    </a>
                </div>
            </h1>
        </div>
    </header>

    @yield ('content')

</body>

</html>
