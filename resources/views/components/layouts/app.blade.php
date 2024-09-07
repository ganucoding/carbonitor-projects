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

    <!-- All CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="{{ asset('css/carbonitor/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/carbonitor/style.css') }}" rel="stylesheet">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Google font Links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- favicon -->
    <link rel="icon" type="svg/xml" href="img/carbonitor/carbonitor-icon-old.svg">

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

<body class="antialiased">
    <!-- Include Navbar -->
    @include('components.carbonitor.navbar')

    <!-- Main Content -->
    <main class="pt-16 pb-20 px-5 md:p-32">
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

    <!-- All Js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/carbonitor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/carbonitor/script.js') }}"></script>
</body>

</html>
