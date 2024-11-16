<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="container mx-auto px-6 py-6 max-w-lg bg-white rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold mb-4 text-gray-800">Create New Product</h1>

        <form action="{{ route('admin.products.store') }}" method="POST" class="space-y-5" enctype="multipart/form-data">
            @csrf
        
            <!-- Product Name -->
            <div class="mb-4">
                <label for="name" class="block text-base font-medium text-gray-700">Product Name</label>
                <input type="text" id="name" name="name"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base @error('name') border-red-500 @enderror"
                    value="{{ old('name') }}" required>
                @error('name')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
        
            <!-- Slug -->
            <div class="mb-4">
                <label for="slug" class="block text-base font-medium text-gray-700">Slug</label>
                <input type="text" id="slug" name="slug"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base @error('slug') border-red-500 @enderror"
                    value="{{ old('slug') }}" required>
                @error('slug')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
        
            <!-- Category -->
            <div class="mb-4">
                <label for="category_id" class="block text-base font-medium text-gray-700">Category</label>
                <select id="category_id" name="category_id"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base @error('category_id') border-red-500 @enderror"
                    required>
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if (old('category_id') == $category->id) selected @endif>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
        
            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-base font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" rows="3"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
        
            <!-- Input untuk gambar -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Product Image</label>
                <input type="file" name="image" id="image"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
            </div>
        
            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit"
                    class="px-5 py-2.5 bg-blue-600 text-white rounded-md text-base hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                    Create Product
                </button>
            </div>
        </form>
    </div>

    <script>
        // JavaScript untuk otomatis membuat slug saat mengetikkan nama produk
        document.getElementById('name').addEventListener('input', function () {
            var name = this.value;
            var slug = name.toLowerCase()
                .replace(/[^a-z0-9]+/g, '-')  // Ganti spasi dan karakter non-alfanumerik dengan -
                .replace(/^-+|-+$/g, '');  // Hapus tanda hubung di awal dan akhir
    
            document.getElementById('slug').value = slug;  // Update nilai slug di input
        });
    </script>
</body>
</html>
