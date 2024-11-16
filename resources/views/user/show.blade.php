@extends('layouts.main')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-xl overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">
                <!-- Gambar Produk -->
                <div class="flex justify-center items-center">
                    <img src="{{ $product->image ? asset('images/products/' . $product->image) : 'https://via.placeholder.com/150' }}"
                        alt="{{ $product->name }}" class="rounded-lg shadow-lg h-72 object-cover">
                </div>

                <!-- Detail Produk -->
                <div class="flex flex-col justify-center space-y-4">
                    <h2 class="text-3xl font-semibold text-gray-900">{{ $product->name }}</h2>
                    <p class="text-lg text-gray-700 font-medium">Category: <span class="font-bold">{{ $product->category->name }}</span></p>
                    <p class="text-base text-gray-600">{{ $product->description }}</p>
                    
                    <!-- Tombol Kembali -->
                    <div class="pt-6">
                        <a href="{{ route('user.index') }}" class="px-6 py-3 bg-blue-600 text-white text-sm rounded-lg shadow-md hover:bg-blue-700 transform transition duration-200 hover:scale-105">
                            Back to Product List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
