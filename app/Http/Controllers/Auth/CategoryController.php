<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function show()
    {
        $cart = session()->get('cart', []); // Ambil data keranjang dari session
        return view('checkout', ['cart' => $cart]);
    }
}
