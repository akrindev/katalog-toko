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

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }

    public function first_image()
    {
        return $this->image()->first()->url;
    }
}
