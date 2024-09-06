<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

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

    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-200 fixed top-0 w-full z-50">
        <div class="container mx-auto px-4 py-2 flex items-center justify-between">
            <a class="text-green-600 text-2xl font-bold" href="/"><span
                    class="text-green-700">Carbon</span>itor</a>
            <button class="text-green-600 lg:hidden" @click="open = !open">
                <i class="fas fa-bars"></i>
            </button>
            <div class="lg:flex lg:items-center lg:space-x-6 hidden">
                <a class="text-green-600 hover:text-green-700" href="/"><i class="fas fa-house"></i> Home</a>
                <a class="text-green-600 hover:text-green-700" href="/projects-listing"><i
                        class="fas fa-speedometer"></i> Our Project</a>
            </div>
        </div>
    </nav>

    <!-- Full-Screen Overlay Mobile Menu -->
    <div x-show="open" @click.away="open = false" x-transition:enter="transition-transform ease-in-out duration-300"
        x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition-transform ease-in-out duration-300" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="fixed inset-0 bg-white text-green-600 z-60 transform transition-transform">
        <div class="flex justify-end p-4">
            <button @click="open = false" class="text-green-600">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </div>
        <div class="flex flex-col items-center p-8">
            <a class="text-2xl py-4" href="/"><i class="fas fa-house"></i> Home</a>
            <a class="text-2xl py-4" href="/projects-listing"><i class="fas fa-speedometer"></i> Our Project</a>
        </div>
    </div>

    <!-- Main Content -->
    <main class="pt-16 pb-20 px-5 md:p-28">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-4 text-center">
        <div class="container mx-auto">
            <p>&copy; 2024 Carbonitor || All rights reserved</p>
        </div>
    </footer>

    <!-- Scripts -->
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
