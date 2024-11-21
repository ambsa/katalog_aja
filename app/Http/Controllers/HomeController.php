<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua kategori
        $categories = Category::all();

        // Ambil produk berdasarkan filter kategori (jika ada)
        $query = Product::query();
    
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }
    
        $products = $query->get();
    
        return view('index', compact('categories', 'products'));
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
