@extends('layouts.category')

@section('title', 'Categories')

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
    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.categories.create') }}">
            <button
                class="bg-blue-600 text-white px-6 py-3 rounded-lg text-sm font-semibold shadow-lg transform transition-all hover:bg-blue-700 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <i class="fa-solid fa-plus mr-2"></i>Add Category
            </button>
        </a>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-lg overflow-hidden p-6">
            <h2 class="text-2xl font-semibold mb-6">Categories</h2>

            <!-- Tabel Daftar Kategori -->
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Name</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Slug</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($categories as $category)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 border-b">{{ $category->id }}</td>
                            <td class="px-6 py-4 border-b">{{ $category->name }}</td>
                            <td class="px-6 py-4 border-b">{{ $category->slug }}</td>
                            <td class="px-6 py-4 border-b flex gap-4 items-center">
                                <!-- Flex untuk memastikan tombol lurus -->
                                <!-- Edit Button -->
                                <a href="{{ route('admin.categories.edit', $category->id) }}"
                                    class="text-blue-600 hover:text-blue-800 border border-blue-600 hover:border-blue-800 px-4 py-2 rounded-md text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Edit
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 hover:text-red-800 border border-red-600 hover:border-red-800 px-4 py-2 rounded-md text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-red-500">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
