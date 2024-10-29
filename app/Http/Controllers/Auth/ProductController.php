<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Log;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;  // Pastikan Category model di-import
use App\Models\Daerah;

class ProductController extends Controller
{
    // Menampilkan form untuk menambah produk
    public function create()
    {
        $categories = Category::all();  // Ambil semua kategori dari database
        $daerah = Daerah::all();  // Ambil semua kategori dari database
        return view('admin', compact('categories','daerah'));  // Kirim variabel $categories ke view


    }


    // Menyimpan data produk ke database
    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'discount' => 'nullable|numeric|min:0|max:100',
        'description' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'daerah_id' => 'required|exists:daerah,id',
        'images' => 'required',  // Multiple images required
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Buat instance produk baru
    $product = new Product();
    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->discount = $request->input('discount');
    $product->description = $request->input('description');
    $product->category_id = $request->input('category_id');
    $product->daerah_id = $request->input('daerah_id');
    $product->save();  // Simpan produk dulu untuk mendapatkan ID

    // Cek jika ada file gambar yang di-upload
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            // Simpan setiap gambar ke storage
            $imagePath = $image->store('images', 'public');  // Simpan gambar di storage

            // Simpan path gambar di tabel terpisah
            ProductImage::create([
                'product_id' => $product->id,
                'image_path' => $imagePath,
            ]);
        }
    }

    return redirect()->route('admin')->with('success', 'Produk berhasil ditambahkan');
}


public function index2()
{
    $max_product = 5;
    $categories = Category::all();
    $daerah = Daerah::all();
    // Ambil produk beserta komentar mereka
    $products = Product::with('comments') // Eager load comments
        ->when(request('search'), function ($query) {
            return $query->where('name', 'LIKE', '%' . request('search') . '%');
        })
        ->orderBy('name', 'asc')
        ->paginate($max_product);

    // Hitung rata-rata rating untuk setiap produk
    foreach ($products as $product) {
        // Hitung rata-rata rating
        $product->averageRating = $product->comments->avg('rating') ?? 0;
    }

    return view('admin', [
        'title' => 'admin',
        'products' => $products,
        'categories' => $categories,
        'daerah' => $daerah,
    ]);
}



public function rate(Product $product)
{
    $comments = $product->comments()->latest()->get();
    
    // Hitung rata-rata rating
    $averageRating = $comments->avg('rating') ?? 0; // Jika tidak ada komentar, set ke 0
    
    return view('admin', compact('product', 'comments', 'averageRating'));
}



    // In your ProductController.php

    public function destroy($id)
    {
        $product = Product::find($id);
    
        // Cek jika produk ada
        if (!$product) {
            return redirect()->route('admin')->with('error', 'Produk tidak ditemukan');
        }
    
        // Hapus semua gambar terkait di storage
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->image_path);  // Hapus gambar di storage
        }
    
        // Hapus gambar dari database
        ProductImage::where('product_id', $product->id)->delete();
    
        // Hapus produk dari database
        $product->delete();
    
        return redirect()->route('admin')->with('success', 'Produk dan gambar berhasil dihapus');
    }
    



// public function destroy($id)
// {
//     $product = Product::find($id);

//     Storage::delete('public/' . $product->image);

//     $product->delete();

//     return redirect()->route('products.index');
// }

    public function checkAdmin()
    {
        // Memastikan pengguna login
        if (Auth::check()) {
            // Cek apakah role pengguna adalah admin
            return Auth::user()->role === 'admin';
        }
        // Jika pengguna tidak login atau bukan admin
        return false;
    }


    public function apdet(Request $request, string $id)
{
    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'daerah_id' => 'required|exists:daerah,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Temukan produk berdasarkan ID
    $product = Product::find($id);

    // Update data produk secara manual
    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->description = $request->input('description');
    $product->category_id = $request->input('category_id');
    $product->daerah_id = $request->input('daerah_id');

    // Cek jika ada file gambar yang di-upload
    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        // Simpan gambar baru
        $image = $request->file('image');
        $imagePath = $image->store('images', 'public');
        $product->image = $imagePath;
    }

    // Simpan perubahan produk ke database
    $product->save();

    // Redirect dengan pesan sukses
    return redirect()->route('admin')->with('success', 'Produk berhasil diperbarui');
}



    public function show(Category $category)
    {
        // Tampilkan detail kategori tertentu
        return view('categories.show', compact('category'));
    }
}
