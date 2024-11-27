@extends('layouts.main')

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

    <!-- Tombol Add Category -->
    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.categories.create') }}">
            <button
                class="bg-blue-600 text-white px-3 py-2 rounded-lg text-sm font-semibold shadow-lg transform transition-all hover:bg-blue-700 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <i class="fa-solid fa-plus mr-2"></i>Add Category
            </button>
        </a>
    </div>

    <!-- Tabel Daftar Kategori -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-lg overflow-hidden p-4 sm:p-6">
            <h2 class="text-lg sm:text-xl md:text-2xl font-semibold mb-4 sm:mb-6">Categories</h2>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
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
                                <td class="px-6 py-4 border-b">
                                    <!-- Tombol besar untuk layar besar -->
                                    <div class="hidden md:flex space-x-2">
                                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                                            class="text-blue-600 hover:text-blue-800 px-4 py-2 rounded-md text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                            class="inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="delete-button text-red-600 hover:text-red-800 px-4 py-2 rounded-md text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-red-500">
                                                Delete
                                            </button>
                                        </form>
                                    </div>

                                    <!-- Dropdown menu untuk layar kecil -->
                                    <div class="md:hidden relative">
                                        <button
                                            class="hover:bg-gray-300 p-2 rounded-full dropdown-button justify-items-center items-center">
                                            <i class="fi fi-tr-dropdown-select"></i>
                                        </button>
                                        <div
                                            class="hidden absolute right-0 mt-2 w-32 bg-white border border-gray-200 rounded-md shadow-lg dropdown-menu z-10">
                                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                class="block px-4 py-2 text-blue-600 hover:text-blue-800 font-semibold">Edit</a>
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="w-full text-left px-4 py-2 text-red-600 hover:text-bg-red-800 font-semibold delete-button">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Dropdown menu toggle
            document.querySelectorAll('.dropdown-button').forEach(button => {
                button.addEventListener('click', function() {
                    const menu = this.nextElementSibling;
                    menu.classList.toggle('hidden');
                });
            });

            // SweetAlert2 untuk konfirmasi
            const deleteButtons = document.querySelectorAll('.delete-button');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const form = this.closest('form');
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
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endpush
