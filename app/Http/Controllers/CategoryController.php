<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
        public function index()
        {
            // Ambil semua kategori
            $categories = Category::all();
    
            // Kembalikan ke view dengan data kategori
            return view('categories.index', compact('categories'));
        }
    
        public function show(Category $category)
        {
            // Ambil semua produk berdasarkan kategori
            $products = $category->products;
    
            // Kembalikan ke view dengan data produk dan kategori
            return view('categories.show', compact('category', 'products'));
        }
    }

