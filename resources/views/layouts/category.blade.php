<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @stack('scripts')
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a329084b4e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="font-sans bg-gray-100">
    <!-- Navbar & Sidebar untuk Admin -->
    <div class="flex min-h-screen">
        <!-- Sidebar Admin -->
        <div class="w-64 bg-gray-800 p-4 shadow-lg text-white h-screen fixed top-0 left-0 z-20">
            <div class="text-xl font-bold mb-6">Admin Panel</div>
            <ul class="flex-grow">
                <a href="{{ route('admin.index') }}"
                    class="block py-2 px-2 text-gray-300 hover:bg-gray-700 rounded-lg flex items-center gap-3">
                    <i class="fa-solid fa-house"></i>
                    Dashboard
                </a>
                <a href="{{ route('admin.products.index') }}"
                    class="block py-2 px-2 text-gray-300 hover:bg-gray-700 rounded-lg flex items-center gap-3">
                    <i class="fa-solid fa-box"></i>
                    Products</a>
                <a href="{{ route('admin.categories.index') }}"
                    class="block py-2 px-2 text-gray-300 hover:bg-gray-700 rounded-lg flex items-center gap-3">
                    <i class="fa-solid fa-layer-group"></i>
                    Categories</a>
                <li>
                    <hr class="border-t border-gray-600 my-5">
                </li>
            </ul>

            <!-- Tombol Logout di bawah -->
            <ul class="mt-auto">
                <li><a href="#"
                        class="block py-2 px-2 text-gray-300 hover:bg-gray-700 rounded-lg flex items-center gap-3"><i
                            class="fa-regular fa-user"></i>
                        Account</a>
                </li>
                <a href="{{ route('logout') }}"
                    class="block py-2 px-2 text-gray-300 hover:bg-gray-700 rounded-lg flex items-center gap-3"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </ul>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 ml-64">
            <!-- Navbar Admin dengan Search dan Profile -->
            <nav class="bg-gray-800 p-4 shadow-lg">
                <div class="container mx-auto flex justify-between items-center">
                    <!-- Search Bar di Tengah -->
                    <div class="flex-1 flex justify-center">
                        <input type="text" placeholder="Search..."
                            class="text-gray-700 px-3 py-2 rounded-md w-1/2 bg-gray-200">
                    </div>

                    <!-- Account Links -->
                    <div class="flex items-center space-x-4">
                        <!-- Dropdown Menu untuk Admin yang Sudah Login -->
                        <div class="relative">
                            <button class="flex items-center focus:outline-none" onclick="toggleDropdown()">
                                <img src="https://img.freepik.com/free-photo/young-man-green-shirt-wearing-glasses-standing-sideways-with-smile-face-white-wall_141793-71740.jpg"
                                    alt="Profile" class="w-10 h-10 rounded-full object-cover border-2 border-white">
                            </button>
                            <div id="dropdown-menu"
                                class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg hidden z-50">
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-100">Profile</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-100">Settings</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-100"
                                    id="logout-link">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Konten Dinamis -->
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById('dropdown-menu');
            dropdown.classList.toggle('hidden');
        }

        window.addEventListener('click', function(event) {
            var dropdown = document.getElementById('dropdown-menu');
            var button = document.querySelector('button[onclick="toggleDropdown()"]');
            if (!dropdown.contains(event.target) && !button.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });

        // Fungsi untuk membuka atau menutup dropdown
        function toggleDropdown() {
            var dropdown = document.getElementById('dropdown-menu');
            dropdown.classList.toggle('hidden');
        }

        // Menutup dropdown jika pengguna mengklik di luar menu
        window.addEventListener('click', function(event) {
            var dropdown = document.getElementById('dropdown-menu');
            var button = document.querySelector('button[onclick="toggleDropdown()"]');
            if (!dropdown.contains(event.target) && !button.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });

        // Menambahkan event listener untuk tombol logout
        document.getElementById('logout-link').addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah aksi default (redirect)

            // Menampilkan konfirmasi SweetAlert
            Swal.fire({
                title: 'Are you sure?',
                text: "You will be logged out!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, log out!',
                cancelButtonText: 'No, cancel!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika user mengonfirmasi, submit form logout
                    document.getElementById('logout-form').submit();
                }
            });
        });
    </script>

</body>

</html>
