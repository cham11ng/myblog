<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    @yield('header')
</head>
<body>
<main class="container">
    <section id="content">
        @yield('content')
    </section>
</main>
<footer>
    copyright &copy; cham11ng
</footer>
@yield('footer')
</body>
</html>
