<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Toddo</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">    </head>
    <body >
       <div id="app">
           <app></app>
       </div>
    </body>
    <script src="{{ mix('js/app.js') }}"></script>
    <style>
        body {
            margin: 0;
            font-family: 'Open Sans', sans-serif;
        }
    </style>
</html>
