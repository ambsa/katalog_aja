<!-- Navbar & Sidebar untuk Admin -->
<div class="flex">
    <!-- Sidebar Admin -->
    <div class="w-64 bg-gray-800 p-4 shadow-lg text-white h-screen fixed top-0 left-0 z-20">
        <div class="text-xl font-bold mb-6">Admin Panel</div>
        <ul class="flex-grow">
            <a href="{{ route('admin.index') }}" class="block py-2 px-2 text-gray-300 hover:bg-gray-700 rounded-lg flex items-center gap-3">
                <i class="fa-solid fa-house"></i>
                Dashboard
            </a>
            <a href="{{ route('admin.products.index') }}" class="block py-2 px-2 text-gray-300 hover:bg-gray-700 rounded-lg flex items-center gap-3">
                <i class="fa-solid fa-box"></i>
                Products</a>
            <a href="{{ route('admin.categories.index') }}" class="block py-2 px-2 text-gray-300 hover:bg-gray-700 rounded-lg flex items-center gap-3">
                <i class="fa-solid fa-layer-group"></i>
                Categories</a>
            <li><hr class="border-t border-gray-600 my-5"></li>
        </ul>

        <!-- Tombol Logout di bawah -->
        <ul class="mt-auto">
            <li><a href="#" class="block py-2 px-2 text-gray-300 hover:bg-gray-700 rounded-lg flex items-center gap-3"><i class="fa-regular fa-user"></i>
                Account</a>
            </li>
            <a href="{{ route('logout') }}" class="block py-2 px-2 text-gray-300 hover:bg-gray-700 rounded-lg flex items-center gap-3"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </ul>
    </div>

    <!-- Main Content Area (with Navbar for Admin) -->
    <div class="flex-1 ml-64">
        <!-- Navbar Admin dengan Search dan Profile -->
        <nav class="bg-gray-800 p-4 shadow-lg">
            <div class="container mx-auto flex justify-between items-center">
              <!-- Search Bar di Tengah -->
                <div class="flex-1 flex justify-center">
                    <input type="text" placeholder="Search..." class="text-gray-700 px-3 py-2 rounded-md w-1/2 bg-gray-200">
                </div>

                <!-- Account Links -->
                <div class="flex items-center space-x-4">
                    <!-- Dropdown Menu untuk Admin yang Sudah Login -->
                    <div class="relative">
                        <!-- Tombol dengan gambar profil berbentuk lingkaran -->
                        <button class="flex items-center focus:outline-none" onclick="toggleDropdown()">
                            <img src="https://img.freepik.com/free-photo/young-man-green-shirt-wearing-glasses-standing-sideways-with-smile-face-white-wall_141793-71740.jpg"
                                 alt="Profile" class="w-10 h-10 rounded-full object-cover border-2 border-white">
                        </button>
                        <!-- Dropdown Menu -->
                        <div id="dropdown-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg hidden">
                            <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-100">Profile</a>
                            <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-100">Settings</a>
                            <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray-800 hover:bg-blue-100"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>

<script>
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
</script>
