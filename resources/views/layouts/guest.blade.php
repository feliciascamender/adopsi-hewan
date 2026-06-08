<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'PawHome Banjarmasin')</title>

    {{-- Favicon Logo PawHome --}}
    <link rel="icon" type="image/png" href="{{ asset('images/Logopurple.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700;800&family=Figtree:wght@400;500;600;700&display=swap" rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

    <style>
        body { font-family: 'Figtree', sans-serif; }
        .font-brand { font-family: 'Inter', sans-serif; }
    </style>

    @stack('styles')
</head>
<body class="bg-surface-alt text-surface-dark antialiased">

    @yield('content')

    @stack('scripts')
</body>
</html>