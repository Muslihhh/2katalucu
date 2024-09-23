<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description'];

    // Jika kategori memiliki produk, Anda bisa menambahkan relasi berikut
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
?>