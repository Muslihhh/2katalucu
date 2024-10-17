<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class VerificationController extends Controller
{


    public function showOrderForm($productId)
    {
        // Ambil produk berdasarkan ID
        $product = Product::findOrFail($productId);

        // Kirim produk ke view form order
        return view('order.form', compact('product'));
    }

    public function submitOrder(Request $request)
{
    // Validasi data form
    $validatedData = $request->validate([
        'name' => 'required|string',
        'phone' => 'required|string',
        'product' => 'required|string', // Ini produk dari form
        'product_id' => 'required|integer', // Simpan ID produk juga jika dibutuhkan
        'jumlah' => 'required|integer',
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
    $whatsappNumber = '6289690460054'; // Ganti dengan nomor yang diinginkan
    
    // Buat link WhatsApp
    $whatsappLink = "https://wa.me/$whatsappNumber?text=$encodedMessage";

    // Redirect pengguna ke WhatsApp
    return redirect($whatsappLink);
}

}
