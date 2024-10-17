<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    // App/Http/Controllers/TokoController.php

// App/Http/Controllers/TokoController.php

public function show(Product $product)
{
    $comments = $product->comments()->latest()->get();
    
    // Hitung rata-rata rating
    $averageRating = $comments->avg('rating');
    
    return view('produk', compact('product', 'comments', 'averageRating'));
}


public function index()
{
    $categories = Category::all();

    // Default query untuk mengambil semua produk
    $query = Product::query();
    
    // Filter berdasarkan search jika ada
    if (request('search')) {
        $query->where('name', 'LIKE', '%' . request('search') . '%');
    }

    // Filter berdasarkan opsi sorting (abjad/waktu)
    if (request('sort') == 'az') {
        $query->orderBy('name', 'asc'); // Urutkan berdasarkan abjad A-Z
    } elseif (request('sort') == 'za') {
        $query->orderBy('name', 'desc'); // Urutkan berdasarkan abjad Z-A
    } elseif (request('sort') == 'terbaru') {
        $query->orderBy('created_at', 'desc'); // Urutkan berdasarkan produk terbaru
    } elseif (request('sort') == 'terlama') {
        $query->orderBy('created_at', 'asc'); // Urutkan berdasarkan produk tertua
    }

    // Ambil hasil query yang telah difilter
    $products = $query->get();

    return view('home', [
        'title' => 'Home',
        'products' => $products,
        'categories' => $categories,
    ]);
}

    public function store(Request $request, Product $product)
    {
        // Validate the comment data
        $request->validate([
            'comment' => 'required',
            'rating' => 'required|integer|between:1,5',
        ]);
        $user_id = Auth::id();
        // Create a new comment
        $comment = new Comment();
        $comment->product_id = $product->id;
        $comment->user_id = $user_id; // or Auth::user()->id
        $comment->comment = $request->input('comment');
        $comment->rating = $request->input('rating');
        $comment->save();

        // Redirect back to the product page with a success message
        return redirect()->back()->with('success', 'Comment added successfully!');
    }

    /**
     * Display a list of comments for a product
     *
    //  * @param  \App\Models\Product  $product
    //  * @return \Illuminate\Http\Response
    //  */
    // public function indeks(Product $product)
    // {
    //     // Retrieve all comments for the product
    //     $comments = $product->comments()->latest()->get();

    //     return view('produk', compact('comments'));
    // }
}
