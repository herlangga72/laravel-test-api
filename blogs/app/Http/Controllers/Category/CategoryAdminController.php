<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category as _Category;

class CategoryAdminController extends Controller
{
    public function index()
    {

        return view('category.admin.categoryList', _Category::all() );
    }

    // public function create()
    // {
    //     return view('category.admin.categoryCreate');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'category_name' => 'required',
    //     ]);
    //     Category::create($request->all());
    //     return redirect()->route('categoryAdmin.index');
    // }

    // public function show(int $id)
    // {
    //     return view('category.admin.categoryShow');
    // }

    // public function edit(int $id)
    // {
    //     return view('category.admin.categoryEdit');
    // }

    // public function update(Request $request, int $id)
    // {
    //     // 
    // }

    // public function destroy(int $id)
    // {
    //     // 
    // }

    // public function bulkCreate()
    // {
    //     return view('category.admin.categoryBulkCreate');
    // }

    // public function bulkStore(Request $request)
    // {
    //     $categories = $request->get("categories");
    //     foreach ($categories as $category) {
    //         $category->validate([
    //             'category_name' => 'required',
    //         ]);
    //     }
    //     Category::insert($request->all());
    // }
}
