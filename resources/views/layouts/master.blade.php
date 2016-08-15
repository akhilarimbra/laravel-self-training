<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ URL::secure('assets/css/style.css') }}" type="text/css" />
    </head>
    <body>
        @include('includes.header')

        <div class="main">
            @yield('content')
        </div>
    </body>
</html>