<?php

namespace App\Http\Auth\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function show()
    {
        $cart = session()->get('cart', []); // Ambil data keranjang dari session
        return view('checkout', ['cart' => $cart]);
    }

    
    public function index()
    {
        // Ambil semua kategori
        $categories = Category::all();
        $products = Product::all();
        
        // Kembalikan ke view 'home' dengan data categories dan products
        return view('home', [
            'categories' => $categories,
            'products' => $products,
            'title' => 'Home'
        ]);
    }

    public function showcategory($id)
    {
        // Mengambil kategori berdasarkan ID
        $category = Category::findOrFail($id);
    
        // Mengambil semua produk terkait kategori tersebut
        $products = Product::where('category_id', $id)->get();
    
        // Kembalikan data ke view
        return view('home', [
            'title' => $category->name,    // Nama kategori sebagai title
            'products' => $products,       // Mengirim produk terkait kategori
            'category' => $category        // Mengirim data kategori
        ]);
    }
    public function showProductsByCategory(Category $category)
    {
        $products = $category->products; // Ambil produk berdasarkan kategori
    
        return view('home', compact('products', 'category')); // Kirim data produk dan kategori ke view home
    }
    
}
