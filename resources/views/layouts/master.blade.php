<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-gray-100">
    <header class="mb-10 pb-5 pt-8 shadow-lg bg-white">
        <div class="container mx-auto px-5 lg:max-w-screen">
            <h1 class="text-center text-xl">
                <a href="/" class="no-underline text-black font-semibold">
                    John Braun<span class="text-sm italic font-thin">'s webblog</span>
                </a>
            </h1>
        </div>
    </header>

    @yield ('content')

</body>

</html>