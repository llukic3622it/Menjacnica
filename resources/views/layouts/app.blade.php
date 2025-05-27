<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel Aplikacija') }}</title>

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts - optional -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- Custom Styles (optional) -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }

        header {
            background-color: #fff;
            border-bottom: 1px solid #dee2e6;
        }

        .card-custom {
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .navbar-brand {
            font-weight: 600;
        }
    </style>

    <!-- Vite (ako koristiš) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{-- Navigacija --}}
    @include('layouts.navigation')

    {{-- Glavni deo stranice --}}
    <div class="container mt-4">
        {{-- Naslov (opciono) --}}
        @hasSection('header')
            <div class="mb-4">
                <h1 class="h3 border-bottom pb-2">@yield('header')</h1>
            </div>
        @endif

        {{-- Glavni sadržaj --}}
        <div class="card card-custom p-4 bg-white">
            @yield('content')
        </div>
    </div>

    {{-- Bootstrap JS (ako ti zatreba interaktivnost) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
