<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'PawHome Banjarmasin')</title>

    {{-- Bootstrap 5 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body { background-color: #f8f9fa; }
        .sidebar {
            min-height: 100vh;
            background-color: #212529;
            width: 240px;
            position: fixed;
            top: 0; left: 0;
            padding-top: 1rem;
            z-index: 100;
        }
        .sidebar .nav-link { color: #adb5bd; padding: 0.6rem 1.25rem; }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active { color: #fff; background-color: #343a40; border-radius: 6px; }
        .sidebar .brand { color: #fff; font-weight: 600; font-size: 1.1rem; padding: 0.5rem 1.25rem 1.5rem; display: block; }
        .main-content { margin-left: 240px; padding: 2rem; }
        @media (max-width: 768px) {
            .sidebar { display: none; }
            .main-content { margin-left: 0; }
        }
    </style>

    @stack('styles')
</head>
<body>

@auth
    {{-- Sidebar hanya muncul kalau sudah login --}}
    <div class="sidebar">
        <span class="brand">
            <i class="bi bi-heart-fill text-danger"></i> PawHome BJM
        </span>
        <nav class="nav flex-column px-2">
            @if(auth()->user()->role === 'admin')
                <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
                   href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
                <a class="nav-link {{ request()->is('admin/species*') ? 'active' : '' }}"
                   href="{{ route('admin.species.index') }}">
                    <i class="bi bi-tags me-2"></i> Spesies
                </a>
                <a class="nav-link {{ request()->is('admin/animals*') ? 'active' : '' }}"
                   href="{{ route('admin.animals.index') }}">
                    <i class="bi bi-star me-2"></i> Hewan
                </a>
                <a class="nav-link {{ request()->is('admin/adoptions*') ? 'active' : '' }}"
                   href="{{ route('admin.adoptions.index') }}">
                    <i class="bi bi-clipboard-check me-2"></i> Pengajuan Adopsi
                </a>
            @else
                <a class="nav-link {{ request()->is('adopter/dashboard') ? 'active' : '' }}"
                   href="{{ route('adopter.dashboard') }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
                <a class="nav-link {{ request()->is('animals*') ? 'active' : '' }}"
                   href="{{ route('animals.index') }}">
                    <i class="bi bi-search me-2"></i> Cari Hewan
                </a>
                <a class="nav-link {{ request()->is('adopter/adoptions*') ? 'active' : '' }}"
                   href="{{ route('adopter.adoptions.index') }}">
                    <i class="bi bi-journal-text me-2"></i> Pengajuan Saya
                </a>
            @endif

            <hr style="border-color:#495057; margin: 1rem 0.75rem;">

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link border-0 bg-transparent text-start w-100">
                    <i class="bi bi-box-arrow-left me-2"></i> Logout
                </button>
            </form>
        </nav>
    </div>
@endauth

<div class="{{ auth()->check() ? 'main-content' : '' }}">
    @yield('content')
</div>

{{-- jQuery --}}
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
{{-- Bootstrap 5 JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')
</body>
</html>