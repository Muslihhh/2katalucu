<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{


    public function showOrderForm($productId)
{
    // Check if user is logged in
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Please log in to proceed with your order.');
    }

    // Get the product by ID
    $product = Product::findOrFail($productId);

    // Retrieve the user's cart with items
    $cart = Cart::with('items')->where('user_id', Auth::id())->first();

    // If cart is not found, initialize quantity as 1
    $jumlah = 1;

    if ($cart) {
        // Find the specific cart item by product ID, if it exists
        $cartItem = $cart->items->where('product_id', $productId)->first();
        $jumlah = $cartItem ? $cartItem->quantity : 1;
    }

    // Pass the product and quantity to the view
    return view('order.form', compact('product', 'jumlah'));
}


    public function submitOrder(Request $request)
{
    // Validasi data form
    $validatedData = $request->validate([
        'name' => 'required|string',
        'phone' => 'required|string',
        'product' => 'required|string',
        'product_id' => 'required|integer',
        'jumlah' => 'required|integer', // pastikan jumlah diterima
        'address' => 'required|string',
    ]);

    // Buat pesan WhatsApp dengan detail order
    $message = "Order Details:\n";
    $message .= "Nama: " . $validatedData['name'] . "\n";
    $message .= "No. Telp: " . $validatedData['phone'] . "\n";
    $message .= "Product: " . $validatedData['product'] . "\n";
    $message .= "Jumlah: " . $validatedData['jumlah'] . "\n";
    $message .= "Alamat: " . $validatedData['address'];

    // Encode pesan untuk URL
    $encodedMessage = urlencode($message);

    // Nomor WhatsApp tujuan
    $whatsappNumber = '6289690460054';
    
    // Buat link WhatsApp
    $whatsappLink = "https://wa.me/$whatsappNumber?text=$encodedMessage";

    // Redirect pengguna ke WhatsApp
    return redirect($whatsappLink);
}

}
