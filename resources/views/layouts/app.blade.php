<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <header class="bg-gray-800 text-white p-4">
        <h1 class="text-3xl">{{ config('app.name') }}</h1>
    </header>

    <div class="container mx-auto p-4">
        @yield('content')
    </div>

    <footer class="bg-gray-800 text-white p-4 mt-4">
        <p>&copy; 2024 {{ config('app.name') }}. Tous droits réservés.</p>
    </footer>
</body>
</html>
