<nav class="bg-gray-800 p-4 shadow-lg">
    <div class="container mx-auto flex items-center justify-between">
        <!-- Logo -->
        <div class="text-white text-2xl font-semibold">
            <a href="/" class="text-white">KatalogKU</a>
        </div>

        <!-- Toggle Button (Mobile) -->
        <button id="menu-toggle" class="text-gray-300 hover:text-white focus:outline-none lg:hidden" onclick="toggleMenu()">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>

        <!-- Desktop Menu -->
        <div id="desktop-menu" class="hidden lg:flex lg:items-center lg:space-x-6">
            @auth
                <a href="{{ route('user.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">Home</a>
                <a href="{{ route('user.about') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">About Us</a>
                <a href="{{ route('user.services') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">Services</a>
                <a href="{{ route('user.contact') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">Contact</a>
                <!-- Profile Dropdown -->
                <div class="relative">
                    <button onclick="toggleDropdown()" class="flex items-center focus:outline-none">
                        <img src="https://img.freepik.com/free-photo/young-man-green-shirt-wearing-glasses-standing-sideways-with-smile-face-white-wall_141793-71740.jpg"
                             alt="Profile" class="w-10 h-10 rounded-full object-cover border-2 border-white">
                    </button>
                    <div id="dropdown-menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg">
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-100">Profile</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-100">Settings</a>
                        <a href="#" onclick="confirmLogout(event)" class="block px-4 py-2 text-gray-800 hover:bg-blue-100">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">Home</a>
                <a href="{{ route('about') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">About Us</a>
                <a href="{{ route('services') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">Services</a>
                <a href="{{ route('contact') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">Contact</a>
                <a href="{{ route('login') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-lg">Sign In</a>
                <a href="{{ route('register') }}" class="text-gray-300 bg-gray-500 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-lg">Sign Up</a>
            @endauth
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden lg:hidden mt-4 bg-gray-800 p-4 rounded-lg">
        @auth
            <a href="{{ route('user.index') }}" class="block text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">Home</a>
            <a href="{{ route('user.about') }}" class="block text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">About Us</a>
            <a href="{{ route('user.services') }}" class="block text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">Services</a>
            <a href="{{ route('user.contact') }}" class="block text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">Contact</a>
            <button onclick="toggleMobileProfileDropdown()" class="flex items-center w-full focus:outline-none">
                <img src="https://img.freepik.com/free-photo/young-man-green-shirt-wearing-glasses-standing-sideways-with-smile-face-white-wall_141793-71740.jpg"
                     alt="Profile" class="w-8 h-8 rounded-full object-cover border-2 border-white">
            </button>
            <div id="mobile-profile-dropdown" class="hidden mt-2 bg-white rounded-lg shadow-lg">
                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-100">Profile</a>
                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-100">Settings</a>
                <a href="#" onclick="confirmLogout(event)" class="block px-4 py-2 text-gray-800 hover:bg-blue-100">Logout</a>
            </div>
        @else
            <a href="{{ route('index') }}" class="block text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">Home</a>
            <a href="{{ route('about') }}" class="block text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">About Us</a>
            <a href="{{ route('services') }}" class="block text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">Services</a>
            <a href="{{ route('contact') }}" class="block text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">Contact</a>
            <a href="{{ route('login') }}" class="block text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">Sign In</a>
            <a href="{{ route('register') }}" class="block text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">Sign Up</a>
        @endauth
    </div>
</nav>

<script>
    function toggleMenu() {
    document.getElementById('mobile-menu').classList.toggle('hidden');
}

function toggleDropdown() {
    document.getElementById('dropdown-menu').classList.toggle('hidden');
}

function toggleMobileProfileDropdown() {
    document.getElementById('mobile-profile-dropdown').classList.toggle('hidden');
}

function confirmLogout(event) {
    event.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "You will be logged out!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, log out!',
        cancelButtonText: 'No, cancel!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('logout-form').submit();
        }
    });
}

</script>