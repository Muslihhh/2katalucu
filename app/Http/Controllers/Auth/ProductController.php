<?php
namespace App\Http\Controllers\Auth;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        public function index()
    {
        $products = Product::all();  // Ambil semua produk dari database
        return view('home', [
            'title' => 'Home',  // Pastikan title didefinisikan di sini
            'products' => $products
        ]);  // Kirim variabel title dan products ke view
    }
    public function index2() {
        $data = Product::orderBy('name', 'asc')->get();  // Get all products from the database
        $categories = Category::all();  // Get all categories from the database
    
        return view('admin', [
            'title' => 'admin',  // Ensure title is defined here
            'data' => $data,  // Pass the products to the view
            'categories' => $categories  // Pass the categories to the view
        ]);
    }
    
    
    public function show($id)
    {
        $product = Product::findOrFail($id);  // Mengambil produk berdasarkan ID
        return view('produk', [       // Pastikan nama view sesuai dengan file blade
            'title' => $product->name,    // Mengirim title berdasarkan nama produk
            'product' => $product     // Mengirim data produk ke view
        ]);
    }
    
    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();
    
        return redirect()->route('admin')->with('success', 'Product deleted successfully');
    }

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
    

}

    
