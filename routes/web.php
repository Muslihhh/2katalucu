<?php

use App\Http\Controllers\MarketController;
use App\Models\Post;

use App\Models\Tipe;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});
Route::get('/admin', [MarketController::class, 'index']);
Route::get('/produk', function () {
    return view('produk', ['title' => 'Produk']);
});
Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts'=>post::filter(request(['search', 'tipe', 'author']))->latest()->paginate(15)->withQueryString()]);
    
});

Route::get('Hallo juga', function () {
    
});

Route::get('/posts/{post:slug}', function(post $post){
  
   
        // $post = post::find($slug);

        return view('post', ['title' => 'Single Post', 'post'=>$post]);
});
Route::get('/author/{user:name}', function (User $user) {
    return view('posts', ['title' =>count($user->posts) . ' Article by '.$user->name,
        'posts' => $user->posts]);
});
Route::get('/tipe/{tipe:nametipe}', function (Tipe $tipe) {
    return view('posts', ['title' => ' Article '.$tipe->nametipe,
        'posts' => $tipe->posts]);
});