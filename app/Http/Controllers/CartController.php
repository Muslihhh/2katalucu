<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\cartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


  // Add item to cart
    class CartController extends Controller
{
    // Add item to cart
    public function addToCart($productId, Request $request)
    {
        // Get the quantity from the request, default to 1 if not provided
        $quantity = $request->input('quantity', 1);
    
        // Validate quantity
        if ($quantity <= 0) {
            return redirect()->route('cart.show')->with('error', 'Invalid quantity.');
        }
    
        // Retrieve or create the user's cart
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
    
        // Retrieve the product details
        $product = Product::findOrFail($productId);
    
        // Check if the product already exists in the cart
        $cartItem = $cart->items()->where('product_id', $productId)->first();
    
        if ($cartItem) {
            // If the product is already in the cart, update the quantity
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Otherwise, create a new cart item and include the price
            $cart->items()->create([
                'product_id' => $productId,
                'quantity' => $quantity,
                'price' => $product->price,  // Ensure price is passed
            ]);
        }
    
        return redirect()->route('cart.show')->with('success', 'Product added to cart!');
    }
    


    // View the cart
    public function viewCart()
{
    // Retrieve the cart for the logged-in user, loading items with product and images
    $cart = Cart::with('items.product.images')->where('user_id', Auth::id())->first();

    // If cart exists, get items and total; otherwise, set defaults
    if ($cart) {
        $cartItems = $cart->items;
        $cartCount = $cartItems->sum('quantity'); // Total quantity of all items
        $total = $cart->items->sum(function ($item) {
            return $item->product->final_price * $item->quantity;
            }); // Total cost of all items
    } else {
        // If no cart, set default values to avoid errors
        $cartItems = collect(); // Empty collection for consistent handling
        $total = 0;
        $cartCount = 0;
    }

    // Pass the cart items, total, and cart count to the view
    return view('cart', compact('cart', 'cartItems', 'total', 'cartCount'));
}


    

    // Update cart item quantity
    public function updateCart(Request $request, $itemId)
    {
        // Find the CartItem by its ID
        $cartItem = CartItem::findOrFail($itemId);

        // Update the quantity
        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        return redirect()->route('cart.show')->with('success', 'Cart updated!');
    }

    // Remove item from cart
    public function removeFromCart($itemId)
    {
        // Find and delete the CartItem by its ID
        $cartItem = CartItem::findOrFail($itemId);
        $cartItem->delete();

        return redirect()->route('cart.show')->with('success', 'Item removed from cart');
    }

    // Clear cart
    public function clearCart()
    {
        $cart = Cart::where('user_id', Auth::id())->first();

        if ($cart) {
            // Delete all cart items associated with the user's cart
            $cart->items()->delete();
        }

        return redirect()->route('cart.show')->with('success', 'Cart cleared');
    }
}



