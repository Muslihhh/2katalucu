<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function show()
    {
        // Ambil data dari session (keranjang belanja)
        $cart = session()->get('cart', []); // Mengambil data keranjang dari session

        // Kirim data ke view checkout
        return view('checkout.process', [
            'title' => 'Checkout',
            'cart' => $cart, // Mengirim data keranjang ke view
        ]);
    }

    public function process(Request $request)
    {
        // Validasi form checkout
        $request->validate([
            'address' => 'required',
            'payment_method' => 'required',
        ]);

        // Proses order di sini (misalnya, simpan ke database)

        return redirect()->route('order.success')->with('status', 'Checkout berhasil diproses!');
    }
}
?>