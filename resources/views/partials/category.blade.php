<!-- Sidebar untuk Admin -->
<div id="sidebar" class="w-64 bg-gray-800 p-4 shadow-lg text-white h-screen fixed top-0 left-0 transform transition-transform duration-300 ease-in-out -translate-x-full lg:translate-x-0">
    <div class="text-xl font-bold mb-6">
        <a href="{{ route('admin.index') }}">Admin Panel</a>
    </div>
    <ul class="flex-grow">
        <a href="{{ route('admin.index') }}"
            class="block py-2 px-2 text-gray-300 hover:bg-gray-700 rounded-lg flex items-center gap-3">
            <i class="fa-solid fa-house"></i> Dashboard
        </a>
        <a href="{{ route('admin.products.index') }}"
            class="block py-2 px-2 text-gray-300 hover:bg-gray-700 rounded-lg flex items-center gap-3">
            <i class="fa-solid fa-box"></i> Products
        </a>
        <a href="{{ route('admin.categories.index') }}"
            class="block py-2 px-2 text-gray-300 hover:bg-gray-700 rounded-lg flex items-center gap-3">
            <i class="fa-solid fa-layer-group"></i> Categories
        </a>
        <li>
            <hr class="border-t border-gray-600 my-5">
        </li>
    </ul>
    <ul class="mt-auto">
        <li>
            <a href="#"
                class="block py-2 px-2 text-gray-300 hover:bg-gray-700 rounded-lg flex items-center gap-3">
                <i class="fa-regular fa-user"></i> Account
            </a>
        </li>
        <a href="#" class="block py-2 px-2 text-gray-300 hover:bg-gray-700 rounded-lg flex items-center gap-3"
            onclick="confirmLogout(event)">
            <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </ul>
</div>

<!-- Tombol Toggle Sidebar -->
<button id="toggleSidebar" class="lg:hidden text-white absolute top-4 left-4 p-2 bg-gray-800 rounded-full transition-all duration-300 z-[1000]">
    <i class="fi fi-rr-bars-staggered"></i>
</button>

<!-- Main Content Area (with Navbar for Admin) -->
<div class="flex-1">
    <!-- Navbar Admin dengan Search dan Profile -->
    <nav class="bg-gray-800 p-4 shadow-lg">
        <div class="container mx-auto flex justify-end items-center gap-10">
            <!-- Search Icon -->
            <div class="relative">
                <button id="searchIcon" class="text-white focus:outline-none">
                    <i class="fi fi-rr-search text-2xl"></i>
                </button>
            
                <!-- Popup Input Search -->
                <div id="searchPopup"
                    class="hidden absolute top-12 right-0 bg-gray-800 p-4 rounded-lg shadow-lg w-72 transform scale-95 opacity-0 transition-all duration-300 ease-in-out">
                    <div class="flex items-center">
                        <input type="text" placeholder="Search..."
                            class="text-gray-700 px-3 py-2 rounded-md w-full bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button id="closeSearch" class="text-white ml-2">
                            <i class="fi fi-sr-cross-small text-xl"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Account Links -->
            <div class="flex items-center space-x-4">
                <!-- Dropdown Menu untuk Admin yang Sudah Login -->
                <div class="relative">
                    <button class="flex items-center focus:outline-none" onclick="toggleDropdown()">
                        <img src="https://img.freepik.com/free-photo/young-man-green-shirt-wearing-glasses-standing-sideways-with-smile-face-white-wall_141793-71740.jpg"
                            alt="Profile" class="w-10 h-10 rounded-full object-cover border-2 border-white">
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