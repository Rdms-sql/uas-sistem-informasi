<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Perpustakaan') - UAS SI</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #212529;
        }
        .sidebar .nav-link {
            color: #cfd2d6;
        }
        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            color: #fff;
            background-color: #2c3136;
        }
        .sidebar .nav-link i {
            margin-right: 8px;
        }
    </style>
</head>
<body>

<div class="d-flex">
    {{-- Sidebar --}}
    <nav class="sidebar p-3" style="width: 240px;">
        <h5 class="text-white mb-4">Perpustakaan UAS</h5>
        <ul class="nav nav-pills flex-column gap-1">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}" href="{{ route('kategori.index') }}">
                    <i class="bi bi-tags"></i> Kategori
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('buku.*') ? 'active' : '' }}" href="{{ route('buku.index') }}">
                    <i class="bi bi-book"></i> Buku
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('anggota.*') ? 'active' : '' }}" href="{{ route('anggota.index') }}">
                    <i class="bi bi-people"></i> Anggota
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('peminjaman.*') ? 'active' : '' }}" href="{{ route('peminjaman.index') }}">
                    <i class="bi bi-journal-arrow-up"></i> Peminjaman
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('pengembalian.*') ? 'active' : '' }}" href="{{ route('pengembalian.index') }}">
                    <i class="bi bi-journal-arrow-down"></i> Pengembalian
                </a>
            </li>
        </ul>
    </nav>

    {{-- Content --}}
    <div class="flex-grow-1">
        {{-- Navbar --}}
        <nav class="navbar navbar-expand navbar-light bg-white shadow-sm px-3">
            <div class="ms-auto d-flex align-items-center">
                <span class="me-3">{{ Auth::user()->username ?? '' }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </div>
        </nav>

        {{-- Page Content --}}
        <main class="p-4">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')
</body>
</html>