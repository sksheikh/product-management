<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','created_by'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_products');
    }

    public function features()
    {
        return $this->hasMany(Feature::class);
    }


}
