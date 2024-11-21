@extends('layouts.main')

@section('title', 'User Dashboard')

@section('user-content')
    <div class="container mx-auto px-6 py-8">
        {{-- Bagian filter kategori --}}

        <form id="filterForm" action="{{ route('user.index') }}" method="GET" class="mb-6 flex items-center gap-2">
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
        <h1 class="text-2xl font-semibold text-gray-800">Our Products</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            @foreach ($products as $product)
                <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col">
                    <div class="bg-white rounded-lg overflow-hidden p-4">
                        <img src="{{ $product->image ? asset('images/products/' . $product->image) : 'https://via.placeholder.com/150' }}"
                            alt="{{ $product->name }}" class="h-48 w-full object-contain">
                    </div>
                    <div class="p-4 flex flex-col justify-between flex-grow">
                        <h2 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h2>
                        <p class="text-sm text-gray-600 mb-2">
                            {{ $product->category->name }}
                        </p>
                        <p class="text-sm text-gray-600">
                            {{ Str::limit($product->description, 100, '...') }}
                        </p>

                        <div class="pt-5 justify-between gap-4">
                            <a href="{{ route('user.show', $product->id) }}"
                                class="px-4 py-2 border-2 border-green-600 text-green-600 text-sm rounded-md hover:bg-green-100 hover:border-green-700 hover:text-green-700 flex-1">
                                Detail
                            </a>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @if (session()->has('success'))
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Welcome User",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
@endsection
