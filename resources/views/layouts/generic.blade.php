<!DOCTYPE html>
<html lang="">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="@yield('robots', 'index, nofollow, noimageindex, noarchive, nocache, notranslate')" />
    <meta charset="utf-8" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    @yield('head')
</head>
<body>
    @yield('body')
</body>
</html>
