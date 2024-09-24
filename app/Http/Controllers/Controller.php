<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    

public function index()
{
    // Ambil data produk dari database
    $products = Product::all(); 

    // Kirim data ke view
    return view('products.index', ['products' => $products]);
}

}