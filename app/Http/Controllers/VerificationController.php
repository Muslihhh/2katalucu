<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function sendWhatsAppLink()
    {
        // Generate a random verification code
        $vcode = rand(100000, 999999);

        // Nomor WhatsApp tujuan
        $whatsappNumber = '089667879476'; // Ganti dengan nomor yang diinginkan
        
        // Buat pesan yang ingin dikirim
        $message = "Your verification code is: $vcode";

        // Encode pesan untuk digunakan di URL
        $encodedMessage = urlencode($message);

        // Buat link WhatsApp
        $whatsappLink = "https://wa.me/$whatsappNumber?text=$encodedMessage";

        // Redirect pengguna ke WhatsApp
        return redirect($whatsappLink);
    }
}
