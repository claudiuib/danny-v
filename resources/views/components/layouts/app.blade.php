<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carpenter Website</title>
    <link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased">
    <header>
        @livewire('header')
    </header>
    <main>
        {{ $slot }}
    </main>
    <footer>
        @livewire('footer')
    </footer>
    @livewireScripts
</body>
</html>