<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('partials.head')
<body>
    
    @yield('content')
    @include('partials.scripts')

</body>
</html>
