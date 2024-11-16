<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a329084b4e.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="bg-gray-100 h-screen flex items-center justify-center">
        <div class="container mx-auto px-6 py-6 max-w-lg bg-white rounded-lg shadow-lg">
            <!-- Back Button -->
            <a href="{{ route('admin.categories.index') }}"
                class="text-blue-500 hover:text-blue-700 text-sm font-semibold flex items-center mb-4 transition duration-200 ease-in-out transform hover:scale-105 w-10">
                <i class="fa-solid fa-arrow-left mr-2"></i>
            </a>
            <h1 class="text-2xl font-semibold mb-4 text-gray-800">Create New Category</h1>

            <!-- Menampilkan pesan sukses jika ada -->
            @if (session('success'))
                <div class="bg-green-500 text-white p-3 rounded-md my-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form untuk membuat kategori -->
            <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Category Name -->
                <div class="mb-4">
                    <label for="name" class="block text-base font-medium text-gray-700">Category Name</label>
                    <input type="text" id="name" name="name"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}" required>
                    @error('name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-5 py-2.5 bg-blue-600 text-white rounded-md text-base hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                        Create Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
