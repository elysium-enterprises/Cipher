<!DOCTYPE html>
<html>
    <head>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="robots" content="@yield('robots', 'index, nofollow, noimageindex, noarchive, notranslate')" />
        <meta charset="utf-8" />
        <link rel="preload" href="{{ mix('images/logo.svg') }}" />
        <link rel="stylesheet" href="{{ mix('css/app.css') }}" />

        <meta name="theme-color" content="#DC3545" />

        <script src="{{ mix('js/app.js') }}"></script>

        @if($errors->any() && env('APP_DEBUG') == 'true')
        <script>
            @foreach($errors->getMessages() as $field => $errorList)
                @foreach($errorList as $error)
                console.error("({{ $field }}) {{ $error }}");
                @endforeach
            @endforeach
        </script>
        @endif
        @yield('head')
    </head>
    <body>
        @yield('body') 
    </body>
</html>
