<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin')</title>
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Admin Panel</a>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
