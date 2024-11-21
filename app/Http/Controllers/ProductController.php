<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
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

    return view('admin.products.index', compact('categories', 'products'));
    }

    public function create()
    {
        $categories = Category::all(); // Ambil semua kategori
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048', // Maksimal 2MB
        ]);

        // Membuat slug otomatis berdasarkan nama produk
        $slug = Str::slug($request->name);  // Membuat slug dari nama produk

        // Menyimpan gambar jika ada
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/products'), $imageName);
        } else {
            $imageName = null;
        }       

        // Menyimpan data produk ke dalam database
        Product::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image' => $imageName,
        ]);

        // Redirect ke halaman produk dengan pesan sukses
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
{
    // Validasi input
    $request->validate([
        'name' => 'required|unique:products,name,' . $product->id,
        'category_id' => 'required|exists:categories,id',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
    ]);

    // Menangani gambar jika ada
    if ($request->hasFile('image')) {
        // Menghapus gambar lama jika ada
        if ($product->image && file_exists(public_path('images/products/' . $product->image))) {
            unlink(public_path('images/products/' . $product->image));
        }

        // Menyimpan gambar baru
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/products'), $imageName);

        // Update dengan gambar baru
        $product->image = $imageName;
    }

    // Update data produk
    $product->update([
        'name' => $request->name,
        'slug' => Str::slug($request->name), // Update slug sesuai dengan nama baru
        'description' => $request->description,
        'category_id' => $request->category_id,
    ]);

    return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
}


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    public function show($id)
{
    // Mencari produk berdasarkan ID
    $product = Product::with('category')->findOrFail($id);

    // Mengembalikan tampilan dengan data produk
    return view('admin.products.show', compact('product'));
}

}
