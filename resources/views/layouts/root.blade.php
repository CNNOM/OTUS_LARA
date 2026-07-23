<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', config('app.name'))</title>
    @include('templ.assets')
    @yield('head')
    @yield('head-bottom')
</head>

<body>
    @yield('body')
    @yield('body-bottom')
</body>

</html>
