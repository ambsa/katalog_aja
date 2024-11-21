@extends('layouts.main')

@section('title', 'Admin Dashboard')

@section('admin-content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-lg overflow-hidden p-6">

            <!-- Total Products Section -->
            <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card - Total Products -->
                <div class="bg-gray-800 text-white p-6 rounded-lg flex flex-col items-center justify-between space-y-4">
                    <!-- Icon -->
                    <i class="fa-solid fa-box text-4xl mb-2"></i>

                    <!-- Title and Subtitle -->
                    <div class="text-center">
                        <h3 class="text-xl font-semibold">Total Products</h3>
                        <p class="text-sm text-gray-400">Products in your store</p>
                    </div>

                    <!-- Product Count -->
                    <span class="text-3xl font-semibold text-blue-600">{{ $productCount }}</span>
                </div>
            </div>

            <!-- Other Dashboard Content -->
            {{-- <div class="mt-8">
            <p class="text-gray-600">Other dashboard content goes here...</p>
        </div> --}}

        </div>
    </div>
    @if (session()->has('success'))
    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Welcome Admin",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif
@endsection


