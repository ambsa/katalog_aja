<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(Request $request)
    // {
    //     $products = Product::with('category')->get(); // Mengambil produk beserta kategori
    // $categories = Category::all(); // Mengambil semua kategori

    // return view('index', compact('products', 'categories')); // Mengirim data ke view 
    // }

    // public function about()
    // {
    //     return view('about');
    // }


    {
        // Ambil semua kategori untuk dropdown
        $categories = Category::all();

        // Filter produk berdasarkan kategori
        $products = Product::query();

        if ($request->has('category') && $request->category) {
            $products->where('category_id', $request->category);
        }

        $products = $products->with('category')->get();

        return view('index', compact('categories', 'products'));
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

