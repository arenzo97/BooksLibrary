<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Create Book</title>
        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <form method="POST" action="{{ config('app.url')}}/books">
                    @csrf
                    <h1> Enter Details to add a book</h1>

                    <div class="form-input">
                        <label>Title</label> <input type="text" name="title">
                    </div>

                    <div class="form-input">
                        <label>Author</label> <input type="text" name="author">
                    </div>

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </body>
</html>