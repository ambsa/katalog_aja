<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
   // Mengambil jumlah produk
   $productCount = Product::count(); 

   // Mengirimkan jumlah produk ke view admin.index
   return view('admin.index', compact('productCount')); 
    }
    //
}
