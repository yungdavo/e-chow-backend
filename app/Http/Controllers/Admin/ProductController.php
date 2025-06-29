<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $products = Product::with('category')->latest()->get();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductCategory::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'stars' => 'nullable|integer|min:1|max:5',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        'product_category_id' => 'required|exists:product_categories,id',
    ]);

    if ($request->hasFile('image')) {
    $data['image'] = $request->file('image')->store('products', 'public');
}

    Product::create($data);

    return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = ProductCategory::all();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $product = Product::findOrFail($id);

    $data = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'stars' => 'nullable|integer|min:1|max:5',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        'product_category_id' => 'required|exists:product_categories,id',
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('products', 'public');
    }

    $product->update($data);

    return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
