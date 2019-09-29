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

                <div class="w-full text-center">
                    <img class="inline sm:hidden mr-1 h-8 w-8 shadow-lg rounded-full" src="{{ url('images/profile_resized.png') }}">
                    <a href="/" class="no-underline text-black font-semibold">
                        John Braun<span class="text-sm font-thin">'s blog</span>
                        <img class="sm:inline hidden ml-5 h-12 w-12 shadow-lg rounded-full" src="{{ url('images/profile_resized.png') }}">
                    </a>

                    <div class="sm:block hidden flex justify-center flex-wrap text-xs tracking-tight font-semibold ml-1 align-top inline">
                        <a class="flex-1/2" href="https://twitter.com/jhnbrn90" rel="me">
                            <svg class="inline-block w-6 h-6" viewBox="0 0 400 400">
                                <path style="fill: #1da1f2;" d="M153.62,301.59c94.34,0,145.94-78.16,145.94-145.94,0-2.22,0-4.43-.15-6.63A104.36,104.36,0,0,0,325,122.47a102.38,102.38,0,0,1-29.46,8.07,51.47,51.47,0,0,0,22.55-28.37,102.79,102.79,0,0,1-32.57,12.45,51.34,51.34,0,0,0-87.41,46.78A145.62,145.62,0,0,1,92.4,107.81a51.33,51.33,0,0,0,15.88,68.47A50.91,50.91,0,0,1,85,169.86c0,.21,0,.43,0,.65a51.31,51.31,0,0,0,41.15,50.28,51.21,51.21,0,0,1-23.16.88,51.35,51.35,0,0,0,47.92,35.62,102.92,102.92,0,0,1-63.7,22A104.41,104.41,0,0,1,75,278.55a145.21,145.21,0,0,0,78.62,23"/>
                            </svg>
                            <span class="align-center -ml-1">twitter</span>
                        </a>
                    </div>
                </div>

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
