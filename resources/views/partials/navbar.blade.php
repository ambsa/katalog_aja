<nav class="bg-gray-800 p-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo atau Judul Navbar -->
        <div class="text-white text-2xl font-semibold">
            <a href="/" class="text-white">Website</a>
        </div>

        <!-- Menu Links -->
        <div class="flex-1 flex justify-center">
            <div class="flex space-x-6">
                <!-- Home -->
                @auth
                    <a href="{{ route('user.index') }}"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md transition duration-400">Home</a>
                @else
                    <a href="{{ route('index') }}"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md transition duration-400">Home</a>
                @endauth

                <!-- About Us -->
                @auth
                    <a href="{{ route('user.about') }}"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md transition duration-400">About Us</a>
                @else
                    <a href="{{ route('about') }}"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md transition duration-400">About Us</a>
                @endauth

                <!-- Services -->
                @auth
                    <a href="{{ route('user.services') }}"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded transition duration-400">Services</a>
                @else
                    <a href="{{ route('services') }}"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded transition duration-400">Services</a>
                @endauth

                <!-- Contact -->
                @auth
                    <a href="{{ route('user.contact') }}"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded transition duration-400">Contact</a>
                @else
                    <a href="{{ route('contact') }}"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded transition duration-400">Contact</a>
                @endauth
            </div>
        </div>

        <!-- Account Links -->
        <div class="flex items-center space-x-4">
            <!-- Dropdown Menu untuk Admin yang Sudah Login -->
            @auth
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
            @else
                <!-- Login/Register Link for Guest Users -->
                <a href="{{ route('login') }}"
                    class="text-gray-300 bg-gray-500 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
                    Login/Register
                </a>
            @endauth
        </div>
    </div>
</nav>

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
