<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Books Library</title>
        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <h1>Here's a list of books</h1>
                <table>
                    <thead>
                        <td>Title</td>
                        <td>Author</td>
                    </thead>
                    <tbody>
                        @foreach ($allBooks as $book)
                            <tr>
                                
                                <td>{{ $book->title }}</td>
                                <td class="inner-table">{{ $book->author }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>