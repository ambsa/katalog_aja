<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get(); // Mengambil produk beserta kategori
    $categories = Category::all(); // Mengambil semua kategori

    return view('index', compact('products', 'categories')); // Mengirim data ke view 
    }

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        return view('services');
    }

    public function contact()
    {
        return view('contact');
    }

    public function show($id)
    {
        // Mencari produk berdasarkan ID
    $product = Product::with('category')->findOrFail($id);

    // Mengembalikan tampilan dengan data produk
    return view('show', compact('product'));
    }
}

