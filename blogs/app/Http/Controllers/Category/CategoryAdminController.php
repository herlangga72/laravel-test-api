<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        return view('category.index', ['categories' => $categories]);
    }

    public function create(Request $request)
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => ['required'],
        ]);
        Category::create(['category_name' => $request->category_name]);
        return redirect()->route('categories.index');
    }

    public function edit(Request $request, $id)
    {
        $category = Category::find($id);
        return view('category.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => ['required'],
        ]);
        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->save();
        return redirect()->route('categories.index');
    }

    public function destroy(Request $request, $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index');
    }
}
