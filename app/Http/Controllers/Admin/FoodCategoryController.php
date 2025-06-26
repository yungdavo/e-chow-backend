<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoodCategory;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    public function index()
    {
        $categories = FoodCategory::with('children')->get();
        return view('admin.foodCategories.index', compact('categories'));
    }
    public function create()
    {
    $categories = FoodCategory::orderBy('title')->get();
    return view('admin.foodCategories.create', compact('categories'));
    }

    public function reorder(Request $request)
    {
        $this->saveOrder($request->order);
        return response()->json(['status' => 'success']);
    }

    private function saveOrder(array $items, $parentId = 0)
    {
        foreach ($items as $index => $item) {
            FoodCategory::where('id', $item['id'])->update([
                'order' => $index,
                'parent_id' => $parentId,
            ]);

            if (!empty($item['children'])) {
                $this->saveOrder($item['children'], $item['id']);
            }
        }
    }
    public function store(Request $request)
    {
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'parent_id' => 'nullable|exists:food_categories,id'
    ]);

    $validated['order'] = FoodCategory::where('parent_id', $validated['parent_id'] ?? 0)->max('order') + 1;

    FoodCategory::create($validated);

    return redirect()->route('admin.foodCategories.index')->with('success', 'Category created successfully.');
    }
}
