@extends('layouts.main')

@section('title', 'Admin Dashboard')

@section('admin-content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-700">Dashboard</h1>
        <div class="p-6">
            <!-- Total Products Section -->
            <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card - Total Products -->
                <div class="bg-white text-white p-6 rounded-lg flex flex-col justify-between space-y-4 max-w-lg w-full">
                    <!-- Flex container untuk Icon (kanan atas) dan Teks (kiri atas) -->
                    <div class="flex justify-between items-start w-full">
                        <!-- Title and Subtitle (di kiri atas) -->
                        <div class="flex flex-col items-start space-y-1">
                            <h3 class="text-lg font-semibold text-gray-700">Total Products</h3>
                        </div>
            
                        <!-- Icon (di kanan atas) -->
                        <div class="flex justify-end text-gray-700">
                            <i class="fa-solid fa-box text-4xl"></i>
                        </div>
                    </div>
                        
                    <!-- Product Count (di bawah teks) -->
                    <span class="text-3xl font-semibold text-blue-600">{{ $productCount }}</span>  
                    <p class="text-sm text-gray-700">Products in your store</p>     
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
