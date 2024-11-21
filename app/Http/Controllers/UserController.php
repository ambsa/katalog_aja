<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class UserController extends Controller
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

        return view('user.index', compact('categories', 'products'));
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
