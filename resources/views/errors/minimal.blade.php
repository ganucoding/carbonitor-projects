<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- CSS Links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="{{ asset('css/carbonitor/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/carbonitor/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/carbonitor/carbonitor-icon-old.svg') }}">

    <!-- Custom Styles -->
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            background-color: #f0f8f4;
            /* Light green background */
        }

        main {
            flex: 1;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .content {
            max-width: 600px;
            width: 100%;
            padding: 30px;
            background-color: #ffffff;
            /* White background */
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .header {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px 0;
            border-bottom: 2px solid #28a745;
            /* Green border */
            margin-bottom: 20px;
        }

        .code {
            font-size: 70px;
            color: #28a745;
            /* Green text color */
            font-weight: 600;
        }

        .message {
            font-size: 18px;
            color: #343a40;
            /* Dark gray text color */
            margin-top: 10px;
        }

        .return-home {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: #ffffff;
            background-color: #28a745;
            /* Green background */
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
        }

        .return-home:hover {
            color: #ffffff;
            background-color: #218838;
            /* Darker green on hover */
        }

        footer {
            background-color: #343a40;
            color: #ffffff;
            text-align: center;
            padding: 20px;
            border-top: 1px solid #495057;
            /* Gray border-top */
        }

        footer .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 0 15px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    @include('components.carbonitor.navbar')

    <!-- Main Content -->
    <main>
        <div class="content">
            <div class="header">
                <div class="code">
                    @yield('code')
                </div>
                <div class="message">
                    @yield('message')
                </div>
            </div>
            <a href="{{ url('/') }}" class="return-home">Return Home</a>

            <!-- Logout Button -->
            @auth
                <form method="POST" action="{{ route('logout') }}" style="margin-top: 20px;">
                    @csrf
                    <button type="submit" class="btn btn-warning">Logout</button>
                </form>
            @endauth
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>Copyright © {{ now()->year }} Carbonitor || All rights reserved</p>
        </div>
    </footer>

    <!-- JavaScript Links -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/carbonitor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/carbonitor/script.js') }}"></script>
</body>

</html>
