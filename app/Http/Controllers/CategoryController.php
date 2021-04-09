<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', ['categories' => $categories]);
    }


    public function store(Request $request)
    {
        $category = strip_tags($request->category);

        $request->validate([
            "category"=>"required"
        ]);

        Category::create([
            "name" => Str::lower($category)
        ]);

        return back();
    }


    public function destroy(Category $category, Request $request)
    {
        $category->delete();
        return back();
    }

    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('admin.categories.edit', ['category' => $category]);
    }


    public function update(Category $category, Request $request)
    {
        $request->validate([
            "category" => "required"
        ]);

        $category->name = Str::lower($request->category);
        // $category->update();

        if ($category->isDirty('name')) {
            $category->update();
            $request->session()->flash('category-update', 'category updated successfuly');
        }else{
            $request->session()->flash('category-update', 'noting to update');
        }
        return back();

    }
}
