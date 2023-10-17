<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <title>Laravel</title>
    @viteReactRefresh
    @vite('resources/js/index.jsx')
    @vite('resources/css/app.css')
</head>

<body>
    <div id="root"></div>
</body>
</html>