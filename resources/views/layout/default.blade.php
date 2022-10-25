<!DOCTYPE html>
<html lang="en">

<head>
    <title>Assignment - @yield('title')</title>
    @include('layout.header')
</head>

<body>
    @include('layout.navbar')
    @yield('content')
    @include('layout.footer')
    @include('layout.script')
    @yield('js')
</body>

</html>
