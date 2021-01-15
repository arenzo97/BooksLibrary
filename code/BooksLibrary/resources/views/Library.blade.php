<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Books Library</title>
        <link rel = "stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
    <div class="w-full h-screen">
        <div class="m-4 text-center">
            <form action="/books/search" method="GET" role="search">
                
                <div class="">
                    <input class="border-2 border-gray-300 bg-white h-10 px-5 w-1/2 rounded-lg text-sm focus:outline-none" type="text" class="form-control" name="query" id="query"
                        placeholder="Search for title or author"> <span class="input-group-btn">
                        <button class="bg-blue-400 h-10 text-white rounded-lg text-sm py-2 px-4"type="search">search</button>
                    </span>
                </div>
             </form>
            </div>
            <div class="">
            
                <table class="border-collapse w-full"> 
                    <thead>
                        <th class="p-3 font-bold uppercase bg-blue-200 text-gray-600 border border-gray-300 hidden lg:table-cell"><a href="{{ url('/books/sort/title') }}">Title</a></th>
                        <th class="p-3 font-bold uppercase bg-blue-200 text-gray-600 border border-gray-300 hidden lg:table-cell"><a href="{{ url('/books/sort/author') }}">Author</a></th>
                        <th class="p-3 font-bold uppercase bg-blue-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Title</span>
                                <a href="{{ url('/books/update/' . $book->id) }}" >{{ $book->title }}</a>
                            </td>
                            
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Author</span>
                                <a href="{{ url('/books/update/' . $book->id) }}" >{{ $book->author }} </a>
                            </td>
                            
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span> 
                                <form action="{{ url('/books/delete', ['id' => $book->id]) }}" method="post">
                                    <input  class="bg-red-600 text-white rounded py-2 px-4" type="submit" value="Delete" />
                                    <input type="hidden" name="_method" value="delete" />
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                        <tr>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center block lg:table-cell relative lg:static">
                                <div>
                                    <div class="dropdown inline-block">
                                        <button class="bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded inline-flex items-center">
                                        <span class="mr-1">Download</span>
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                                        </button>
                                        <ul class="dropdown-menu absolute hidden text-gray-700 pt-1">
                                            <li class=""><a class="rounded-t bg-gray-100 hover:bg-blue-200 py-2 px-4 block whitespace-no-wrap" href="{{ url('/books/download/csv/all') }}">CSV</a></li>
                                            <li class=""><a class="rounded-t bg-gray-100 hover:bg-blue-200 py-2 px-4 block whitespace-no-wrap" href="{{ url('/books/download/csv/title') }}">CSV (title only)</a></li>
                                            <li class=""><a class="rounded-t bg-gray-100 hover:bg-blue-200 py-2 px-4 block whitespace-no-wrap" href="{{ url('/books/download/csv/author') }}">CSV (author only)</a></li>
                                            <li class=""><a class="rounded-b bg-gray-100 hover:bg-blue-200 py-2 px-4 block whitespace-no-wrap" href="{{ url('/books/download/xml/all') }}">XML</a></li>
                                            <li class=""><a class="rounded-b bg-gray-100 hover:bg-blue-200 py-2 px-4 block whitespace-no-wrap" href="{{ url('/books/download/xml/title') }}">XML (title only)</a></li>
                                            <li class=""><a class="rounded-b bg-gray-100 hover:bg-blue-200 py-2 px-4 block whitespace-no-wrap" href="{{ url('/books/download/xml/author') }}">XML (author only)</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>