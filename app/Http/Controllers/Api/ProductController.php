<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return response()->json($products);
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
    ]);

    $product = Product::create($validated);

    return response()->json($product, 201);
    }

    public function getByCategory($id)
    {
    $products = Product::with('category')
                ->where('product_category_id', $id)
                ->get();

    return response()->json($products);
    }
    public function getPopular()
{
    return $this->getByCategoryName('Popular');
}

public function getRecommended()
{
    return $this->getByCategoryName('Recommended');
}

private function getByCategoryName($title)
{
   $products = Product::with('category')
        ->whereHas('category', function ($query) use ($title) {
            $query->where('title', $title)
                  ->where('parent_id', '!=', 0);
        })
        ->get();

    return response()->json($products);
}

}
