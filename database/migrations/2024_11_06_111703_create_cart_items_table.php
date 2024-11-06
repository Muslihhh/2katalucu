<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->references('id')->on('carts')->onDelete('cascade'); // Menyambung ke tabel carts
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade'); // Menyambung ke tabel products
            $table->integer('quantity'); // Jumlah produk dalam keranjang
            $table->decimal('price', 10, 2); // Harga produk pada saat dimasukkan ke keranjang
            $table->timestamps();
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
