<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        // Ambil semua produk
        $products = Product::all(); 

        // Kirim data produk ke view 'home'
        return view('user.index', compact('products')); // Pastikan menggunakan 'compact'
    }

    public function show($id)
{
    // Mencari produk berdasarkan ID
    $product = Product::with('category')->findOrFail($id);

    // Mengembalikan tampilan dengan data produk
    return view('user.show', compact('product'));
}


    //
}
