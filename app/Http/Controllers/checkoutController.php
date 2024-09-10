<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function showCheckoutForm()
    {
        // Tampilkan halaman checkout
        return view('showCheckoutForm');
    }

    public function processCheckout(Request $request)
    {
        // Generate kode verifikasi
        $vcode = rand(100000, 999999);

        // Simpan vcode di sesi atau kirim ke pengguna via WhatsApp, email, dll.
        session(['vcode' => $vcode]);

        // Tampilkan halaman sukses dengan kode verifikasi
        return redirect()->back()->with('message', 'Your verification code is: ' . $vcode);
    }
}
