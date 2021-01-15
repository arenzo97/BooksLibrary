<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel = "stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="bg-gray-300">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-500 sm:items-center sm:pt-0">
            <div class="flex-center position-ref full-height">
                <div class="content">
                    <div><h1 class=>Books Library</h1></div>
                    <div class="links">
                        <a href="{{ config('app.url')}}/books/create">Create Book</a>
                        <a href="{{ config('app.url')}}/books">View Books</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
