<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);  // Mengambil produk berdasarkan ID
        return view('produk', [       // Pastikan nama view sesuai dengan file blade
            'title' => $product->name,    // Mengirim title berdasarkan nama produk
            'product' => $product     // Mengirim data produk ke view
        ]);
    }

    public function index()
    {
        $categories = Category::all();
        if (request('search')) {
            $products = Product::where('name', 'LIKE', '%'.request('search').'%')->get();
        } else {
            $products = Product::all();
        }

        return view('home', [
            'title' => 'Home',
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
