<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>

    <!-- Tailwind CSS and Filament styles -->
    @filamentStyles
    @vite('resources/css/app.css')

    <!-- Additional CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap">
    <link rel="icon" type="image/svg+xml" href="img/carbonitor-icon-old.svg">

    <style>
        [x-cloak] {
            display: none !important;
        }

        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }
    </style>
</head>

<body class="antialiased" x-data="{ open: false }">
    <!-- Include Navbar -->
    @include('components.carbonitor.navbar')

    <!-- Main Content -->
    <main x-show="!open" class="pt-16 pb-20 px-5 md:p-28">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-4 text-center">
        <div class="container mx-auto">
            <p>&copy; {{ now()->year }} Carbonitor || All rights reserved</p>
        </div>
    </footer>

    <!-- Scripts -->
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
