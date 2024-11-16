@extends('layouts.main')

@section('title', 'User Dashboard')

@section('user-content')
<div class="container mx-auto px-6 py-8">
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
                            class="px-4 py-2 bg-green-600 text-white text-sm rounded-md hover:bg-green-700 flex-1">
                            Detail
                        </a>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
