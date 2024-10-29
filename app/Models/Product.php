<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = ['name', 'stock', 'price', 'discount', 'description', 'category_id', 'image', 'daerah_id'];

    // Relasi produk ke kategori (many-to-one)
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi produk ke daerah (many-to-one)
    public function daerah(): BelongsTo
    {
        return $this->belongsTo(Daerah::class);
    }

    // Relasi produk ke komentar (one-to-many)
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    // Relasi produk ke gambar (one-to-many)
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function getFinalPriceAttribute()
{
    if ($this->discount > 0) {
        return $this->price - ($this->price * $this->discount / 100);
    }
    return $this->price;
}
public function getDiscountPercentageAttribute()
{
    $discount = rtrim(rtrim(number_format($this->discount, 2), '0'), '.');
    return $this->discount > 0 ? $discount . '%' : null;
}



}
