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
    <nav class="bg-white border-b border-gray-200 fixed top-0 w-full">
        <div class="container mx-auto px-4 py-2 flex items-center justify-between">
            <a class="text-2xl tracking-wider font-bold" href="/">
                <span class="text-[#02B075]">CARBON</span>ITOR
            </a>
            <button class="text-green-600 lg:hidden" @click="open = !open">
                <i class="fas fa-bars"></i>
            </button>
            <div class="lg:flex lg:items-center lg:space-x-6 hidden">
                <a class="hover:text-[#02B075]" href="/"><i class="fas fa-house"></i>
                    &ensp; Home
                </a>
                <a class="hover:text-[#02B075]" href="/projects-listing"><i class="fas fa-tachometer"></i>
                    &ensp; Our Project
                </a>
            </div>
        </div>
    </nav>

    <!-- Full-Screen Overlay Mobile Menu -->
    <div x-show="open" @click.away="open = false" x-transition:enter="transition-transform ease-in-out duration-300"
        x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition-transform ease-in-out duration-300" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="fixed inset-0 bg-white text-black transform transition-transform z-60">
        <div class="flex flex-col items-center p-8">
            <!-- Logo -->
            <a class="-ml-40 text-2xl tracking-wider font-bold" href="/">
                <span class="text-[#02B075]">CARBON</span>ITOR
            </a>
            <!-- Close Button -->
            <div class="-mr-10 -mt-14 text-gray-400 flex justify-end w-full p-4">
                <button @click="open = false">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>
            <!-- Menu Links -->
            <div class="mt-10 flex flex-col items-center">
                <a class="text-2xl py-4" href="/"><i class="fas fa-house"></i>
                    &ensp; Home
                </a>
                <a class="text-2xl py-4" href="/projects-listing"><i class="fas fa-tachometer"></i>
                    &ensp; Our Project
                </a>
            </div>
        </div>
    </div>

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
