<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
   

    protected $fillable = ['title', 'description', 'order', 'parent_id'];

    public function foods()
    {
        return $this->hasMany(Food::class, 'category_id');
    }

    public function children()
    {
        return $this->hasMany(FoodCategory::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(FoodCategory::class, 'parent_id');
    }
}
