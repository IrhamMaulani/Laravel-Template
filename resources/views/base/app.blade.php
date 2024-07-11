<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
@include('partials.navbar')
@include('partials.sidebar')
<div class="p-4  mt-14">
    @yield('base-content')
</div>

</body>
</html>
