<?php

namespace App\Http\Controllers\Auth;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    // public function show()
    // {
    //     $cart = session()->get('cart', []); // Ambil data keranjang dari session
    //     return view('checkout', ['cart' => $cart]);
    // }

    
 // Menampilkan semua kategori dan produk (metode index tetap sama)
//  public function index()
// {
//     // Ambil semua kategori dan produk
//     $categories = Category::all();
//     $products = Product::all();
    

//     // Mengembalikan view 'home' dengan data kategori dan produk
//     return view('home', [
//         'categories' => $categories,
//         'products' => $products,
//         'title' => 'Home',
//     ]);
// }


 // Menampilkan produk berdasarkan kategori yang dipilih
 public function showcategory($id)
 {
     // Mengambil kategori berdasarkan ID
     $category = Category::findOrFail($id);

     // Mengambil produk berdasarkan kategori tersebut
     $products = Product::where('category_id', $id)->get();


     // Mengembalikan view 'home' dengan data produk dan kategori yang dipilih
     return view('home', [
         'title' => $category->name,     // Nama kategori sebagai title
         'products' => $products,        // Produk yang difilter berdasarkan kategori
         'categories' => Category::all(), // Mengirim semua kategori agar tombol kategori tetap muncul
         'selectedCategory' => $category // Untuk menandai kategori yang sedang dipilih
     ]);
 }
}
