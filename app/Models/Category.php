<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description'];

    // Relasi kategori ke produk (satu kategori memiliki banyak produk)
    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
