<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Create Book</title>
        <link rel = "stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-200 sm:items-center sm:pt-0">
            <form method="POST" action="{{ config('app.url')}}/books">
                @csrf
                <h1> Enter Details to add a book</h1>

                <div class="pt-4">
                    <input type="text" name="title" placeholder="Title" class="rounded px-4 py-2">
                </div>

                <div class="pt-4">
                    <input type="text" name="author" placeholder="Author" class="rounded px-4 py-2">
                </div>
                <div class="pt-4">
                    <button class="bg-blue-400 text-white rounded py-2 px-4"type="submit">Submit</button>
                </div>
            </form>

        </div>
    </body>
</html>