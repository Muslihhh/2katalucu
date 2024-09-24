<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        // Logika untuk menampilkan semua kategori
        $categories = Category::all();
        return view('categories.index', compact('categories'));

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });
        
    }

    public function show(Category $category)
    {
        // Logika untuk menampilkan detail kategori tertentu
        return view('categories.show', compact('category'));
    }
}
?>