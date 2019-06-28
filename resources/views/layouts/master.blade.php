<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

      <link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/styles/atom-one-light.min.css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/highlight.min.js"></script>
</head>

<body class="bg-gray-100">
    <header class="mb-10 pb-5 pt-8 shadow-lg bg-white">
        <div class="container mx-auto lg:max-w-screen">
            <h1 class="text-center text-xl">
                <a href="/" class="no-underline text-black font-semibold">
                    John Braun<span class="text-sm italic font-thin">'s blog</span>
                </a>
            </h1>
        </div>
    </header>

    @yield ('content')

</body>

</html>
