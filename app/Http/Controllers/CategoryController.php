<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }
     public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5'
        ]);

        Category::create([
            'name' => $request->name
        ]);
        return redirect()->route('category.index');
    }

     public function update(Request $request ,Category $category)
    {
        $request->validate([
            'name' => 'required|min:5'
        ]);

        $category->update([
            'name' => $request->name
        ]);
        return redirect()->route('category.index');
    }
      public function distroy(Category $category)
    {
    $category->delete();
    return redirect()->route('category.index')->with('success','successfuly deleted');
    }

}
