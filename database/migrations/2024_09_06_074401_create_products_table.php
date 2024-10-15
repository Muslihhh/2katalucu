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
         Schema::create('products', function (Blueprint $table) {
             $table->id();
             $table->foreignId('category_id')->references('id')->on('categories')
             ->onDelete('cascade');
             $table->string('name');
             $table->decimal('price', 8, 2);
             $table->text('description');
<<<<<<< HEAD
=======
             $table->unsignedBigInteger('category_id');
             $table->foreign('category_id')
             ->references('id')->on('categories')
             ->onDelete('cascade');
             $table->string('image')->nullable();  // Tambahkan kolom image
             $table->string('daerah');
>>>>>>> ed01dbd24a0b17ba9802cdc0bff7adc76f803dd8
             $table->timestamps();
         });
     }
     
     public function down(): void
     {
         Schema::dropIfExists('products');
     }
};
