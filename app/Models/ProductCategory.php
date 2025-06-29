<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
      protected $fillable = ['title', 'description', 'parent_id', 'order'];

    public function products()
    {
        return $this->hasMany(Product::class, 'product_category_id');
    }
     public function children()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }
}
