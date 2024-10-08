<?php

namespace App\Http\Controllers\Auth;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;  // Pastikan Category model di-import

class ProductController extends Controller
{
    // Menampilkan form untuk menambah produk
    public function create()
    {
        $categories = Category::all();  // Ambil semua kategori dari database
        return view('admin', compact('categories'));  // Kirim variabel $categories ke view


    }


    // Menyimpan data produk ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Buat instance produk baru
            // Buat instance produk baru
    $product = new Product();
    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->description = $request->input('description');
    $product->category_id = $request->input('category_id');

    // Cek jika ada file gambar yang di-upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = $image->store('images', 'public'); // Simpan gambar di storage/app/public/images

        // Simpan path relatif terhadap storage di database
       $product->image = $imagePath;
    }

    // Simpan produk ke database
    $product->save();

    return redirect()->route('admin')->with('success', 'Produk berhasil ditambahkan');
}
    public function index2()
    {
        $max_product = 5;
        $categories = Category::all();
        if (request('search')) {
            $products = Product::where('name', 'LIKE', '%' . request('search') . '%')->paginate($max_product);
        } else {
            $products = Product::orderBy('name', 'asc')->paginate($max_product);  // Get all products from the database
            // Get all categories from the database
        }
        return view('admin', [
            'title' => 'admin',  // Ensure title is defined here
            'products' => $products,  // Pass the products to the view
            'categories' => $categories,  // Pass the categories to the view
        ]);
    }


    // In your ProductController.php

public function destroy($id)
{
    $product = Product::find($id);
    $image_path = storage_path('app/public/' . $product->image);

    if (file_exists($image_path)) {
        unlink($image_path);
    }

    $product->delete();

    return redirect()->route('admin');
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
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Temukan produk berdasarkan ID
    $product = Product::find($id);

    // Update data produk secara manual
    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->description = $request->input('description');
    $product->category_id = $request->input('category_id');

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
