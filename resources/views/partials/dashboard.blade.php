<!-- Sidebar untuk Admin -->
<div id="sidebar"
    class="w-64 bg-white p-4 text-gray-800 h-screen fixed top-0 left-0 transform transition-transform duration-300 ease-in-out -translate-x-full lg:translate-x-0 z-50">
    <div class="text-xl font-bold mb-6">
        <a href="{{ route('admin.index') }}">Admin Panel</a>
    </div>
    <ul class="flex-grow">
        <a href="{{ route('admin.index') }}"
            class="block py-3 px-2 text-gray-800 hover:text-white hover:bg-blue-500 rounded-md flex items-center gap-3 
        {{ request()->routeIs('admin.index') ? 'bg-blue-500 text-white' : '' }}">
            <i class="fa-solid fa-house"></i> Dashboard
        </a>

        <a href="{{ route('admin.products.index') }}"
            class="block py-3 px-2 text-gray-800 hover:text-white hover:bg-blue-500 rounded-md flex items-center gap-3
        {{ request()->routeIs('admin.products.index') ? 'bg-blue-500 text-white' : '' }}">
            <i class="fa-solid fa-box"></i> Products
        </a>

        <a href="{{ route('admin.categories.index') }}"
            class="block py-3 px-2 text-gray-800 hover:text-white hover:bg-blue-500 rounded-md flex items-center gap-3
        {{ request()->routeIs('admin.categories.index') ? 'bg-blue-500 text-white' : '' }}">
            <i class="fa-solid fa-layer-group"></i> Categories
        </a>

        <li>
            <hr class="border-t border-gray-600 my-5">
        </li>
    </ul>
    <ul class="mt-auto">
        <li>
            <a href="#"
                class="block py-3 px-2 text-gray-800 hover:text-white hover:bg-blue-500 rounded-lg flex items-center gap-3">
                <i class="fa-regular fa-user"></i> Account
            </a>
        </li>
        <a href="#"
            class="block py-3 px-2 text-gray-800 hover:text-white hover:bg-blue-500 rounded-lg flex items-center gap-3"
            onclick="confirmLogout(event)">
            <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </ul>
</div>

<!-- Tombol Toggle Sidebar -->
<button id="toggleSidebar"
    class="lg:hidden text-gray-700 absolute top-4 left-4 p-2 bg-white rounded-full transition-all duration-300 z-[1000]">
    <i class="fa-solid fa-bars-staggered"></i>
</button>

<!-- Main Content Area (with Navbar for Admin) -->
<div class="flex-1 sticky top-0 z-10">
    <!-- Navbar Admin dengan Search dan Profile -->
    <nav class="bg-white p-4 shadow-lg">
        <div class="container mx-auto flex justify-end items-center gap-10">
            <!-- Search Icon -->
            <div class="relative w-full flex justify-center">

                <!-- Popup Input Search -->
                <div id="searchContainer" class="rounded-lg w-96">
                    <div class="relative w-full">
                        <div class="flex items-center w-full">
                            <!-- Icon Search di dalam input -->
                            <i class="fa-solid fa-magnifying-glass text-gray-500 absolute left-3"></i>
                            
                            <input id="searchInput" type="text" placeholder="Search"
                                class="text-gray-700 pl-10 py-2 rounded-full w-full bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>                  
                    <!-- Search Result -->
                    <ul id="searchResults" class="mt-2 text-gray-200"></ul>
                </div>
            </div>
            

            <!-- Account Links -->
            <div class="flex items-center space-x-4">
                <!-- Dropdown Menu untuk Admin yang Sudah Login -->
                <div class="relative">
                    <button class="flex items-center focus:outline-none" onclick="toggleDropdown()">
                        <img src="https://img.freepik.com/free-photo/young-man-green-shirt-wearing-glasses-standing-sideways-with-smile-face-white-wall_141793-71740.jpg"
                            alt="Profile" class="w-10 h-10 rounded-full object-cover border-2 border-gray-700">
                    </button>
                    <!-- Dropdown Menu -->
                    <div id="dropdown-menu"
                        class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg hidden z-50">
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-100">Profile</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-100">Settings</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-100" id="logout-link"
                            onclick="confirmLogout(event)">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
{{-- END --}}

@push('script')
    <script>
        // === Sidebar with toggle ===

        // Toggle Sidebar
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            console.log('Sidebar toggled');
            var sidebar = document.getElementById('sidebar');
            var body = document.body;
            var button = document.getElementById('toggleSidebar');

            // Toggle sidebar visibility
            sidebar.classList.toggle('-translate-x-full');
            body.classList.toggle('sidebar-open');

            // Toggle posisi tombol toggle (geser ke kanan saat sidebar terbuka)
            button.classList.toggle('left-4'); // Posisi kiri awal
            button.classList.toggle('left-[16rem]'); // Geser ke kanan saat sidebar terbuka
        });

        // Resize listener untuk memastikan tampilan sidebar pada ukuran layar besar
        window.addEventListener('resize', function() {
            var sidebar = document.getElementById('sidebar');
            var button = document.getElementById('toggleSidebar');

            // Cek apakah layar lebih besar dari 1024px (desktop)
            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('-translate-x-full'); // Hapus posisi sembunyi
                button.classList.add('hidden'); // Sembunyikan tombol toggle pada layar besar
            } else {
                sidebar.classList.add('-translate-x-full'); // Sembunyikan sidebar pada layar kecil
                button.classList.remove('hidden'); // Tampilkan tombol toggle pada layar kecil
                button.classList.remove('left-[16rem]'); // Kembali ke posisi kiri pada layar kecil
                button.classList.add('left-4'); // Posisi default kiri
            }
        });

        // Panggil resize listener saat halaman dimuat untuk memastikan visibilitas tombol
        window.dispatchEvent(new Event('resize'));

        // === End Sidebar with toggle ===

        // === Searchbar

        

        // === End Searchbar
    </script>
@endpush
