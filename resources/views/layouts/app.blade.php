<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('layouts.header.meta')

    @include('layouts.header.link')

    @include('layouts.header.favicon')

    <title>Inicio | UNEDL CAFE</title>

    @include('layouts.header.style')
</head>


<body>

    <div id="main">

        @include('layouts.body.header')

        @yield('content')
        @include('layouts.body.footer')

    </div>

    @include('layouts.body.scripts')
    @stack('js')
</body>

</html>
