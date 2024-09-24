<?php


use App\Models\Post;
use App\Models\Tipe;
use App\Models\User;
use App\Models\admin;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\VerificationController;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\ProductController; // Pastikan namespace sesuai


// Route Home
Route::get('/home', function () {
    return view('home', ['title' => 'Home']);
});

// Route Admin// Hanya satu set route admin

// Route Produk
Route::get('/produk', function () {
    return view('produk', ['title' => 'Produk']);
});

// Route Auth
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

// Route Author
Route::get('/author/{user:name}', function (User $user) {
    return view('posts', ['title' => count($user->posts) . ' Article by ' . $user->name, 'posts' => $user->posts]);
});

// Route Categories
Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/categories/{id}', [CategoryController::class, 'showcategory'])->name('categories.show');

Route::get('/categories/{category}', [CategoryController::class, 'showcategory'])->name('categories.show');

// Route Cart
Route::post('/add-to-cart', function (Request $request) {
    $cart = session()->get('cart', []);

    $product = [
        'id' => $request->id,
        'name' => $request->name,
        'price' => $request->price,
        'quantity' => $request->quantity,
        'image' => $request->image
    ];

    $cart[] = $product;
    session()->put('cart', $cart);

    return redirect()->route('checkout.show');
})->name('add-to-cart');



Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

// Route Checkout
Route::middleware('auth')->group(function () {
Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
});



// Route Send WhatsApp
Route::get('/send-whatsapp', [VerificationController::class, 'sendWhatsAppLink'])->name('sendWhatsAppLink');

// Route Order Success
Route::get('/order-success', function () {
    return view('order-success', ['title' => 'Pesanan Berhasil']);
})->name('order.success');
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);



// Menampilkan form untuk menambah produk
Route::get('/admin', [ProductController::class, 'create'])->name('products.create');
Route::get('/admin', [ProductController::class, 'index2'])->name('admin');

// Menyimpan data produk yang di-post dari form
Route::post('/admin', [ProductController::class, 'store'])->name('products.store');




Route::get('/home', [TokoController::class, 'index'])->name('home');

Route::get('/product/{id}', [TokoController::class, 'show'])->name('products.show');


Route::get('/checkout', [CheckoutController::class, 'showChekoutForm']);
Route::post('/checkout', [CheckoutController::class, 'processCheckout']);

Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::put('/admin/product/{id}', [ProductController::class, 'apdet'])->name('products.apdet');




