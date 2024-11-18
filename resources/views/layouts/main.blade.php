<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a329084b4e.js" crossorigin="anonymous"></script>   
</head>
<body class="font-sans bg-gray-100">
    @if(auth()->check())
        @if(auth()->user()->role == 1) <!-- Jika admin -->
            @include('partials.sidebar_admin') <!-- Sidebar admin -->
        @else <!-- Jika user login -->
            @include('partials.navbar') <!-- Navbar khusus untuk user login -->
        @endif
    @else
        @include('partials.navbar') <!-- Navbar umum untuk guest -->
    @endif

    {{-- <div class="flex flex-col min-h-screen ml-0 @if(auth()->check() && auth()->user()->role == 1) ml-64 @endif">
        <main class="flex-grow p-4 mt-16 ml-64">
            @yield('content')
        </main>
    </div> --}}
    <div class="flex flex-col min-h-screen ml-0 @if(auth()->check() && auth()->user()->role == 1) ml-64 @endif">
        <main class="flex-grow p-6 @if(auth()->check() && auth()->user()->role == 1) ml-64 @endif">
            @auth
                @if(auth()->user()->role == 1)
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

            <div>
            @yield('content')
            </div>

        </main>
    </div>
</body>
</html>