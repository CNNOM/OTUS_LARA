<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    @include('templ.assets')
    @include('templ.meta')
</head>

<body>
    <div class="layout">
        @include('templ.header')
        @yield('main')
        @include('templ.footer')
    </div>
</body>

</html>
