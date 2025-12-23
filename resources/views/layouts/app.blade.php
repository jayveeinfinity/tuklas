<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') {{ config('app.name', 'Tuklas') }}</title>

        {{-- Tailwind CSS --}}
        @vite('resources/css/app.css')
    </head>
    <body>
        @include('partials.header')
        @yield('content')
        @stack('scripts')
    </body>
</html>