<?php

namespace App\Http\Controllers\Auth;

use App\Models\Cart;
use App\Models\Daerah;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
    $latestProducts = Product::where('category_id', $id)
                              ->orderBy('created_at', 'desc')
                              ->take(4)
                              ->get();

    // Mengambil semua daerah
    $daerah = Daerah::all();
    $cart = Cart::with('items.product.images')->where('user_id', Auth::id())->first();

    // If cart exists, get items and total; otherwise, set defaults
    if ($cart) {
        $cartItems = $cart->items;
        $total = $cartItems->sum(fn($item) => $item->price * $item->quantity);
        $cartCount = $cartItems->sum('quantity'); // Total quantity of all items
    } else {
        // If no cart, set default values to avoid errors
        $cartItems = collect(); // Empty collection for consistent handling
        $total = 0;
        $cartCount = 0;
    }
    // Mengembalikan view 'home' dengan data produk, kategori yang dipilih, dan daerah
    return view('home', [
        'title' => $category->name,     // Nama kategori sebagai title
        'products' => $products,        // Produk yang difilter berdasarkan kategori
        'latestProducts' => $latestProducts, // Produk terbaru di kategori tersebut
        'categories' => Category::all(), // Mengirim semua kategori agar tombol kategori tetap muncul
        'daerah' => $daerah,            // Mengirim data daerah
        'selectedCategory' => $category,   // Untuk menandai kategori yang sedang dipilih
        'cartItems' => $cartItems,
        'total' => $total,
        'cartCount' => $cartCount,  // Jumlah item dalam keranjang
    ]);
}

 public function index()
{
    $categories = Category::all();  // Ambil semua kategori
    $daerah = Daerah::all();  // Ambil semua kategori
    
    return view('home', compact('categories','dearah'));  // Pastikan 'home' adalah view yang menggunakan layout
}

public function filterByPrice(Request $request)
{
    $priceFrom = $request->input('price_from');
    $priceTo = $request->input('price_to');

    $products = Product::when($priceFrom, function ($query, $priceFrom) {
        return $query->whereRaw('(price - (price * discount / 100)) >= ?', [$priceFrom]);
    })->when($priceTo, function ($query, $priceTo) {
        return $query->whereRaw('(price - (price * discount / 100)) <= ?', [$priceTo]);
    })->get();

    // Mengambil semua data daerah
    $daerah = Daerah::all();
    $cart = Cart::with('items.product.images')->where('user_id', Auth::id())->first();

    // If cart exists, get items and total; otherwise, set defaults
    if ($cart) {
        $cartItems = $cart->items;
        $total = $cartItems->sum(fn($item) => $item->price * $item->quantity);
        $cartCount = $cartItems->sum('quantity'); // Total quantity of all items
    } else {
        // If no cart, set default values to avoid errors
        $cartItems = collect(); // Empty collection for consistent handling
        $total = 0;
        $cartCount = 0;
    }
    return view('home', [
        'products' => $products,
        'categories' => Category::all(),
        'daerah' => $daerah, // Menambahkan data daerah ke view
        'title' => 'Filtered Products',
        'cartItems' => $cartItems,
        'total' => $total,
        'cartCount' => $cartCount,
    ]);
}


}
