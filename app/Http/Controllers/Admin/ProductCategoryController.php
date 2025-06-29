<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProductCategory::with('children')->get();
        return view('admin.productCategories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductCategory::all();
        return view('admin.productCategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'parent_id' => 'nullable|integer'
        ]);

        $validated['parent_id'] = $validated['parent_id'] ?? 0;
        $validated['order'] = ProductCategory::max('order') + 1;

        ProductCategory::create($validated);

        return redirect()->route('admin.productCategories.index')->with('success', 'Category created successfully.');
    }

   
    public function show(string $id)
    {
        //
    }

   
    public function edit(string $id)
    {
        $category = ProductCategory::findOrFail($id);
        $categories = ProductCategory::where('id', '!=', $id)->get();
        return view('admin.productCategories.edit', compact('category', 'categories'));
    }

   
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'parent_id' => 'nullable|integer'
    ]);

        $category = ProductCategory::findOrFail($id);
        $category->update($validated);

        return redirect()->route('admin.productCategories.index')->with('success', 'Category updated successfully.');
    }


    public function destroy(string $id)
    {
        
        $category = ProductCategory::findOrFail($id);
        $category->children()->delete();
        $category->delete();

        return redirect()->route('admin.productCategories.index')->with('success', 'Category deleted successfully.');
    }

    public function reorder(Request $request)
    {
    // Your reorder logic
    }
}
