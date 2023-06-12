<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_type', 'id');
    }

    public function users()
{
    return $this->belongsToMany(User::class, 'favorites', 'product_id', 'user_id');
}

public function isFavorite()
{
    return $this->users()->where('user_id', auth()->user()->id)->exists();
}

}

