<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FoodController extends Controller
{

    public function index()
    {
        $foods = \App\Models\Food::with('category')->latest()->paginate(10);
        return view('admin.foods.index', compact('foods'));
    }

    
    public function create()
    {
        $categories  =  FoodCategory::pluck('title', 'id');
        return view('admin.foods.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|exists:food_categories,id',
            'price' => 'required|numeric',
            'location' => 'required|string',
            'stars' => 'required|numeric|min:1|max:5',
            'people' => 'nullable|numeric',
            'selected_people' => 'nullable|numeric',
            'img' => 'nullable|image',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('foods', 'public');
        }

        \App\Models\Food::create($data);

        return redirect()->route('admin.foods.index')->with('success', 'Food added!');
    }

    
   
    public function edit(string $id)
    {
        $food = Food::findOrFail($id);
        $categories = FoodCategory::pluck('title', 'id');
        return view('admin.foods.edit', compact('food', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $food = Food::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string',
            'type_id' => 'required|exists:food_categories,id',
            'price' => 'required|numeric',
            'location' => 'required|string',
            'stars' => 'required|numeric|min:1|max:5',
            'people' => 'nullable|numeric',
            'selected_people' => 'nullable|numeric',
            'img' => 'nullable|image',
            'description' => 'nullable|string',
        ]);
        if ($request->hasFile('img')) {
            if ($food->img && Storage::disk('public')->exists($food->img)) {
                Storage::disk('public')->delete($food->img);
            }
            $data['img'] = $request->file('img')->store('foods', 'public');
        }

        $food->update($data);
        return redirect()->route('admin.foods.index')->with('success', 'Food updated!');
    }

    
    public function destroy(string $id)
    {
        $food = Food::findOrFail($id);

        if ($food->img && Storage::disk('public')->exists($food->img)) {
            Storage::disk('public')->delete($food->img);
        }

        $food->delete();
        return redirect()->route('admin.foods.index')->with('success', 'Food deleted!');
    }
}
