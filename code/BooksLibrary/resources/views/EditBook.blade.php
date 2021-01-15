<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Edit Book</title>
        <link rel = "stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-200 sm:items-center sm:pt-0">
            <form method="POST" action="">
                @csrf
                @method('PATCH')

                <!-- Description-->
                <h1> Enter Details to edit this book</h1>

                <!-- Input text for book title -->
                <div class="pt-4">
                    <input type="text" name="title" placeholder="Title" value="{{ $book->title }}" class="rounded px-4 py-2">
                    @error('title')<p class="text-red-600">{{ $message }}</p>@enderror
                    <!-- validation message, if 'title' input value < 3 OR empty -->
                </div>
                
                 <!-- Input text for book author -->
                <div class="pt-4">
                    <input type="text" name="author" placeholder="Author" value="{{ $book->author }}"  class="rounded px-4 py-2">
                    @error('author')<p class="text-red-600">{{ $message }}</p>@enderror
                    <!-- validation message, if 'author' input value  < 3 OR empty -->
                </div>

                <!-- Submit button -->
                <div class="flex pt-4">
                    <button class="bg-blue-400 text-white rounded py-2 px-4"type="submit">Submit</button>
                </div>
            </form>

        </div>
    </body>
</html>