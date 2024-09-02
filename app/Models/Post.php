<?php

namespace App\Models;

use App\Models\Tipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class post extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','author', 'content'];
    protected $with = ['author' , 'tipe'];

    public function author():BelongsTo{
        return $this->belongsTo(User::class); // Assuming User model has 'id' field as foreign key
    }
    public function tipe():BelongsTo{
        return $this->belongsTo(Tipe::class); // Assuming User model has 'id' field as foreign key
    }

    public function scopefilter(Builder $query, array $filters): void
    {
        $query->when(
            $filters['search']?? false,
            fn($query, $search) => 
            $query->where('title', 'like', '%'.$search.'%')
        );

        $query->when(
            $filters['tipe']?? false,
            fn($query, $tipe) => 
            $query->whereHas('tipe', fn ($query)=> $query->where('nametipe', $tipe))
        );

        $query->when(
            $filters['author']?? false,
            fn($query, $author) => 
            $query->whereHas('author', fn ($query)=> $query->where('name', $author))
        );
        
    }
}
