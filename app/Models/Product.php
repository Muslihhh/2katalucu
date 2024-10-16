<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
   protected $fillable = ['name', 'stock','price', 'description', 'category_id', 'image'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
