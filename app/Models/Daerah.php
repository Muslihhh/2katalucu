<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Daerah extends Model
{
    use HasFactory;

    protected $table = 'daerah';

    // Tambahkan kolom yang bisa diisi
    protected $fillable = ['nama_daerah'];

    // Relasi daerah ke kategori (satu daerah memiliki banyak kategori)    
    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
