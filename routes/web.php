<?php

use App\Models\Post;
use App\Models\Tipe;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\ProductController; // Pastikan namespace sesuai

Route::get('/home', function () {
    return view('home', ['title' => 'Home']);
});
Route::get('/admin', [MarketController::class, 'index']);
Route::get('/produk', function () {
    return view('produk', ['title' => 'Produk']);
});
// Route::get('/posts', function () {
//     return view('posts', ['title' => 'Blog', 'posts'=>post::filter(request(['search', 'tipe', 'author']))->latest()->paginate(15)->withQueryString()]);
    
// });



Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/home');
})->name('logout');


Route::get('/registrasi', [RegisterController::class, 'showRegistrationForm'])->name('registrasi');
Route::post('/registrasi', [RegisterController::class, 'registrasi']);

// Route::get('/posts/{post:slug}', function(post $post){
  
   
//         // $post = post::find($slug);

//         return view('post', ['title' => 'Single Post', 'post'=>$post]);
// });
Route::get('/author/{user:name}', function (User $user) {
    return view('posts', ['title' =>count($user->posts) . ' Article by '.$user->name,
        'posts' => $user->posts]);
});
// Route::get('/tipe/{tipe:nametipe}', function (Tipe $tipe) {
//     return view('posts', ['title' => ' Article '.$tipe->nametipe,
//         'posts' => $tipe->posts]);
// });

Route::get('/send-whatsapp', [VerificationController::class, 'sendWhatsAppLink'])->name('sendWhatsAppLink');

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);



// Menampilkan form untuk menambah produk
Route::get('produk', [ProductController::class, 'create'])->name('products.create');

// Menyimpan data produk yang di-post dari form
Route::post('produk', [ProductController::class, 'store'])->name('products.store');



Route::get('/checkout', [CheckoutController::class, 'showChekoutForm']);
Route::post('/checkout', [CheckoutController::class, 'processCheckout']);



Route::get('/admin', [MarketController::class, 'index']);
Route::post('/admin', [MarketController::class, 'store']);