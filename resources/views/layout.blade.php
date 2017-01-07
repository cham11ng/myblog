<!DOCTYPE html>
<html>
<head>
    <title>cham11ng | Laravel 5.2</title>
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
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="about">About</a></li>
        <li><a href="cards">Cards</a></li>
    </ul>
    copyright &copy; cham11ng
</footer>
@yield('footer')
</body>
</html>
