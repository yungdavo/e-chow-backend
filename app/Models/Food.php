<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'food';
    
    protected $fillable = [
        'name', 'category_id', 'price', 'location', 'stars', 
        'people', 'selected_people', 'img', 'description'
    ];

    public function category()
    {
        return $this->belongsTo(FoodCategory::class, 'category_id');
    }
}
