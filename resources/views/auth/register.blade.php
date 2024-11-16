<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a329084b4e.js" crossorigin="anonymous"></script>
</head>

<body class="bg-gradient-to-r from-green-400 via-blue-500 to-purple-600 min-h-screen flex items-center justify-center font-sans">

    <div class="w-full max-w-lg bg-white shadow-lg rounded-xl p-8">
        <a href="{{ route('login') }}"
            class="text-blue-500 hover:text-blue-700 text-sm font-semibold flex items-center mb-4 transition duration-200 ease-in-out transform hover:scale-105 w-10">
            <i class="fa-solid fa-arrow-left mr-2"></i>
        </a>

        <h2 class="text-3xl font-extrabold text-gray-800 text-center mb-6">Create an Account</h2>
        <p class="text-sm text-gray-500 text-center mb-6">Join us to explore amazing features!</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name input -->
            <div class="mb-6">
                <label for="name" class="block text-gray-600 text-sm font-bold mb-2">Full Name</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fa-solid fa-user text-gray-400"></i>
                    </span>
                    <input id="name" type="text" placeholder="Enter your full name"
                        class="shadow appearance-none border rounded-lg w-full py-2 px-10 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500"
                        name="name" value="{{ old('name') }}" required>
                </div>
            </div>

            <!-- Email input -->
            <div class="mb-6">
                <label for="email" class="block text-gray-600 text-sm font-bold mb-2">Email Address</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fa-solid fa-envelope text-gray-400"></i>
                    </span>
                    <input id="email" type="email" placeholder="Enter your email"
                        class="shadow appearance-none border rounded-lg w-full py-2 px-10 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500"
                        name="email" value="{{ old('email') }}" required>
                </div>
            </div>

            <!-- Password input -->
            <div class="mb-6">
                <label for="password" class="block text-gray-600 text-sm font-bold mb-2">Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fa-solid fa-lock text-gray-400"></i>
                    </span>
                    <input id="password" type="password" placeholder="Create a password"
                        class="shadow appearance-none border rounded-lg w-full py-2 px-10 pr-10 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500"
                        name="password" required>
                    <span
                        class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer text-gray-400 hover:text-gray-600"
                        onclick="togglePassword()">
                        <i id="password-icon" class="fa-solid fa-eye"></i>
                    </span>
                </div>
            </div>

            <!-- Confirm Password input -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-600 text-sm font-bold mb-2">Confirm Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fa-solid fa-lock text-gray-400"></i>
                    </span>
                    <input id="password_confirmation" type="password" placeholder="Confirm your password"
                        class="shadow appearance-none border rounded-lg w-full py-2 px-10 pr-10 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500"
                        name="password_confirmation" required>
                    <span
                        class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer text-gray-400 hover:text-gray-600"
                        onclick="togglePasswordConfirmation()">
                        <i id="password-confirmation-icon" class="fa-solid fa-eye"></i>
                    </span>
                </div>
            </div>

            <!-- Register button -->
            <div class="flex justify-center">
                <button type="submit"
                    class="bg-gradient-to-r from-green-500 to-blue-600 hover:from-green-600 hover:to-blue-700 text-white font-bold py-2 px-20 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 transform transition duration-200 hover:scale-105">
                    Register
                </button>
            </div>
        </form>
    </div>

    <!-- JavaScript -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('password-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            }
        }

        function togglePasswordConfirmation() {
            const passwordInput = document.getElementById('password_confirmation');
            const passwordIcon = document.getElementById('password-confirmation-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            }
        }
    </script>

</body>

</html>
