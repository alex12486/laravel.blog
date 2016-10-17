<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials/_head')
</head>
<body>
@include('partials/_navigation')
<div class="container">
    @include('partials/_massages')
    @yield('content')
    @include('partials/_footer')
</div>
@include('partials/_javascript')
</body>
</html>
