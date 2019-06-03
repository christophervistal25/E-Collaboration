<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <style>
            #boards {
                padding:20px;
                background :#2196f3;
                width : 80px;
                margin-top: 20px;
            }

             a > #boards {
                color :white;
            }
        </style>
    </head>
    <body>
        <a href="/boards/create">Create new board</a>
        <br>
        @foreach($boards as $board)
            <a style="text-decoration: none;" href="/boards/{{ $board->id }}"><div id="boards" style="display:inline-block;">{{ $board->name }}</div></a>
        @endforeach
    </body>
</html>
