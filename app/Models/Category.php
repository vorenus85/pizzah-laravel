<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'status'];

    public function allCategories()
    {
        return Category::all();
    }

    public function withProducts()
    {
        return $this->hasMany(Product::class);
    }
}
