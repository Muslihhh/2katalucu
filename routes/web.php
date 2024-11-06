<?php


use App\Models\Post;
use App\Models\Tipe;
use App\Models\User;
use App\Models\admin;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\Auth\CategoryController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ProductController; // Pastikan namespace sesuai

// Route Home

Route::get('/home', function () {
    return view('home', ['title' => 'Home']);
});
Route::get('/contact', function () {
    return view('contact', ['title' => 'contact']);
});

// Route Admin
// Hanya satu set route admin
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

// Route::get('/categories', function () {
//     return view('home'); // Misalnya, view 'home' menampilkan komponen kategori
// });


Route::get('/home', [TokoController::class, 'index']);
Route::get('/home/category/{id}', [CategoryController::class, 'showcategory'])->name('home.filter');
Route::get('/home', [CategoryController::class, 'index'])->name('home');

Route::get('/home/price-filter', [CategoryController::class, 'filterByPrice'])->name('home.price-filter');


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

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/{id}', [TokoController::class, 'show'])->name('products.show');



// Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

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
Route::delete('/products/images/{image}', [ProductController::class, 'deleteImage'])->name('products.images.delete');
Route::delete('/products/bulk-delete', [ProductController::class, 'bulkDelete'])->name('products.bulkDelete');


// Route untuk menampilkan detail produk
Route::get('/admin/{product}/rate', [ProductController::class, 'rate'])->name('admin.products.rate');



Route::get('/home', [TokoController::class, 'index'])->name('home');

Route::get('/products/{product}', [TokoController::class, 'show'])->name('products.show');


Route::get('/checkout', [CheckoutController::class, 'showChekoutForm']);
Route::post('/checkout', [CheckoutController::class, 'processCheckout']);

Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::put('/products/{id}', [ProductController::class, 'apdet'])->name('products.apdet');

Route::post('/products/{product}', [TokoController::class, 'store'])
    ->middleware('auth')
    ->name('comments.store');


Route::post('/order-submit', [VerificationController::class, 'submitOrder'])->name('order.submit');
Route::get('/order-form/{product}', [VerificationController::class, 'showOrderForm'])->name('order.form');


Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.show');
    Route::post('/cart/update/{cartItemId}', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('/cart/add/{cartItemId}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/remove/{cartItemId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
});

