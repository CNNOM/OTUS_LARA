<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    @include('templ.meta')
    @include('templ.assets')
</head>

<body>
    <div class="travel-shell">
        <div class="travel-page">
            @include('templ.header')
            @yield('main')
            @include('templ.footer')
        </div>
    </div>
</body>

</html>
