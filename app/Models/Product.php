<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $with = [
        'image',
        'categories'
    ];

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }
}
