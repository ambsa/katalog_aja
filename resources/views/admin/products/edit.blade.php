<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Products')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a329084b4e.js" crossorigin="anonymous"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-6 py-8 max-w-lg bg-white rounded-lg shadow-lg">
        <a href="{{ route('admin.products.index') }}"
            class="text-blue-500 hover:text-blue-700 text-sm font-semibold flex items-center transition duration-200 ease-in-out transform hover:scale-105 w-10">
            <i class="fa-solid fa-arrow-left mr-2"></i>
        </a>
        <h1 class="text-3xl font-semibold mb-6 text-gray-800 text-center">Edit Product</h1>

        <!-- Formulir Edit Produk -->
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Input untuk Nama Produk -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-semibold text-gray-700">Product Name</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}"
                    class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            
            <!-- Input untuk Deskripsi Produk -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-semibold text-gray-700">Description</label>
                <textarea name="description"
                    class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $product->description) }}</textarea>
            </div>
            
            <!-- Input untuk Kategori Produk -->
            <div class="mb-4">
                <label for="category_id" class="block text-sm font-semibold text-gray-700">Category</label>
                <select name="category_id"
                    class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <!-- Input untuk Gambar Produk (opsional) -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-semibold text-gray-700">Product Image</label>
                <input type="file" name="image"
                    class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <!-- Tombol Update Produk -->
            <div class="mt-6">
                <button type="submit"
                    class="w-full px-4 py-2 bg-blue-600 text-white text-lg rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Update Product
                </button>
            </div>
        </form>
    </div>
</body>

</html>
