<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('query');

        // Pencarian berdasarkan name, slug, dan description
        $results = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('slug', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->with('category') // Opsional, jika ingin menampilkan kategori
            ->get();

        return response()->json($results);
    }
    //
}
