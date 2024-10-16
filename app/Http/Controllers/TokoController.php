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
        if (request('search')) {
            $products = Product::where('name', 'LIKE', '%'.request('search').'%')->get();
        } else {
            $products = Product::all();
        }

        $latestProducts = Product::where('created_at', '>=', now()->subDays(7))->get();

        return view('home', [
            'title' => 'Home',
            'products' => $products,
            'categories' => $categories,
        ], compact('latestProducts'));
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
