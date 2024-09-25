<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Home page</title>
</head>
<body>
    <nav>
        <x-nav-link href="/">Home</x-nav-link>
        <x-nav-link href="/about">about</x-nav-link>
        <x-nav-link href="/contact">contact</x-nav-link>
<!--        <a href="/">Home</a>-->
    </nav>
    {{$slot}}
</body>
</html>
