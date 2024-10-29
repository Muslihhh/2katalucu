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
        $table->string('name');
        $table->decimal('price', 8, 2);
        $table->decimal('discount', 5, 2)->default(0);
        $table->text('description');
        
        // Foreign key untuk kategori
        $table->unsignedBigInteger('category_id');
        $table->foreign('category_id')
            ->references('id')->on('categories')
            ->onDelete('cascade');
        
        // Foreign key untuk daerah
        $table->unsignedBigInteger('daerah_id')->nullable();
        $table->foreign('daerah_id')
            ->references('id')->on('daerah')
            ->onDelete('cascade');

        // Kolom image (jika ingin menambahkan di masa depan)
        $table->timestamps();
    });
}

     
     public function down(): void
     {
         Schema::dropIfExists('products');
     }
};
