<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('carts', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Menghubungkan keranjang dengan pengguna
        $table->enum('status', ['active', 'completed'])->default('active'); // Status keranjang
        $table->timestamps(); // Waktu pembuatan dan pembaruan
    });
    
}

public function down()
{
    Schema::dropIfExists('carts');
}

};
