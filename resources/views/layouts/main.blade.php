<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    {{-- TailwindCSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- Flaticon --}}
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-rounded/css/uicons-thin-rounded.css'>

    {{-- Local CSS --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}"> --}}
</head>

<body class="font-sans bg-gray-200">
    @if (auth()->check())
        @if (auth()->user()->role == 1)
            <!-- Jika admin -->
            @include('partials.dashboard') <!-- Sidebar admin -->
        @else
            <!-- Jika user login -->
            @include('partials.navbar') <!-- Navbar khusus untuk user login -->
        @endif
    @else
        @include('partials.navbar') <!-- Navbar umum untuk guest -->
    @endif

    <!-- Layout responsif untuk konten -->
    <div class="flex flex-col min-h-screen">
        <main class="flex-grow p-4 sm:p-6 md:p-8 lg:p-6 xl:p-8 ml-0 @if (auth()->check() && auth()->user()->role == 1) lg:ml-64 @endif">
            @auth
                @if (auth()->user()->role == 1)
                    <!-- Konten untuk Admin -->
                    <div class="admin-content">
                        @yield('admin-content')
                    </div>
                @else
                    <!-- Konten untuk User yang Sudah Login -->
                    <div class="user-content">
                        @yield('user-content')
                    </div>
                @endif
            @else
                <!-- Konten untuk User yang Belum Login -->
                <div class="homepage-content">
                    @yield('homepage-content')
                </div>
            @endauth

            <!-- Konten umum -->
            <div>
                @yield('content')
            </div>
        </main>
    </div>

    @stack('script')


    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/a329084b4e.js" crossorigin="anonymous"></script>
    {{-- Local JS --}}
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
