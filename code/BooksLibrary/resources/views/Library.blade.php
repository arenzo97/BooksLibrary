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
                        @foreach ($books as $book)
                            <tr>
                                
                                <td> <a href="{{ url('/books/update/' . $book->id) }}" >{{ $book->title }}</a></td>
                                <td> <a href="{{ url('/books/update/' . $book->id) }}" >{{ $book->author }} </a></td>
                                <td> 
                                    <form action="{{ url('/books/delete', ['id' => $book->id]) }}" method="post">
                                        <input class="btn btn-default" type="submit" value="Delete" />
                                        <input type="hidden" name="_method" value="delete" />
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>