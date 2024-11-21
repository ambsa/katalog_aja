@extends('layouts.products')

@section('title', 'Products')

@section('content')

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: "{{ session('success') }}",
                    timer: 5000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
            });
        </script>
    @endif
    <form id="filterForm" action="{{ route('admin.products.index') }}" method="GET" class="mb-6 flex items-center gap-2">
        <select name="category" id="categoryFilter" class="p-2 border rounded-md">
            <option value="">All Categories</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ request()->category == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white text-sm rounded-md hover:bg-blue-700">
            Search
        </button>
    </form>

    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.products.create') }}"
            class="bg-blue-600 text-white px-6 py-3 rounded-lg text-sm font-semibold shadow-lg transform transition-all hover:bg-blue-700 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <i class="fa-solid fa-plus mr-2"></i>Add Product
        </a>
    </div>

    <div class="container mx-auto px-6 py-6">
        <h1 class="text-2xl font-semibold mb-4">Product List</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($products as $product)
                <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col">
                    <div class="bg-white rounded-lg overflow-hidden p-4">
                        <img src="{{ $product->image ? asset('images/products/' . $product->image) : 'https://via.placeholder.com/150' }}"
                            alt="{{ $product->name }}" class="h-48 w-full object-contain">
                    </div>

                    <div class="p-4 flex flex-col justify-between flex-grow">
                        <h2 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h2>
                        <p class="text-sm text-gray-600 mb-2">
                            Category: {{ $product->category->name }}
                        </p>
                        <p class="text-sm text-gray-600">
                            {{ Str::limit($product->description, 100, '...') }}
                        </p>

                        <!-- Tombol Edit, Detail, dan Delete -->
                        <div class="mt-4 flex justify-between gap-4">
                            <!-- Tombol Edit -->
                            <a href="{{ route('admin.products.edit', $product->id) }}"
                                class="flex justify-center items-center px-2 py-2 text-center border-2 border-blue-600 text-blue-600 text-sm rounded-md hover:bg-blue-100 flex-auto">
                                Edit
                            </a>
                            <!-- Tombol Detail -->
                            <a href="{{ route('admin.products.show', $product->id) }}"
                                class="flex justify-center items-center px-2 py-2 text-center border-2 border-green-600 text-green-600 text-sm rounded-md hover:bg-green-100 flex-auto">
                                Detail
                            </a>
                            <!-- Tombol Hapus -->
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                id="deleteForm-{{ $product->id }}" class="flex-auto">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                    class="flex justify-center items-center w-full px-2 py-2 text-center border-2 border-red-600 text-red-600 text-sm rounded-md hover:bg-red-100">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center">
                    <p class="text-gray-600">No products found.</p>
                </div>
            @endforelse
        </div>

    @endsection

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Ambil semua tombol delete
                const deleteButtons = document.querySelectorAll('.delete-button');

                deleteButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const form = this.closest('form'); // Form terdekat dari tombol yang diklik

                        // SweetAlert2 untuk konfirmasi
                        Swal.fire({
                            title: "Are you sure?",
                            text: "You won't be able to revert this!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yes, delete it!"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Submit form jika dikonfirmasi
                                form.submit();
                            }
                        });
                    });
                });
            });
        </script>
    @endpush
