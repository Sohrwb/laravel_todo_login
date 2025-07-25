<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class TodoController extends Controller
{
    public function index()
    {
        $todos = todo::all();
        return view('todo.index', compact('todos'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('todo.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255|min:5',
            'image' => 'required|image|max:850',
            'text' => 'required|string|max:255|min:5',
            'category' => 'required|integer|exists:categories,id',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $originalName = $request->file('image')->getClientOriginalName();
            $imageName = time() . '_' . $originalName;

            // ذخیره در پوشه public/images
            $request->file('image')->move(public_path('images'), $imageName);
        }

        Todo::create([
            'name' => $request->input('name'),
            'image' => $imageName,
            'text' => $request->input('text'),
            'category_id' => $request->input('category'),
        ]);
        return redirect()->route('todo.index');
    }

    public function show(Todo $todo)
    {

        return view('todo.show', compact('todo'));
    }

    public function edit(Todo $todo, Category $category)
    {
        $categories = $category->all();
        return view('todo.edit', compact('todo', 'categories'));
    }

    public function update(Request $request, Todo $todo)
    {

        $request->validate([
            'name' => 'required|string|max:255|min:5',
            'image' => 'nullable|image|max:850',
            'text' => 'required|string|max:255|min:5',
            'category' => 'required|integer|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            $imageName = null;
            if ($todo->image && file_exists(public_path('images/' . $todo->image))) {
                unlink(public_path('images/' . $todo->image));
            }

            $originalName = $request->file('image')->getClientOriginalName();
            $imageName = time() . '_' . $originalName;
            $request->file('image')->move(public_path('images'), $imageName);

            $todo->image = $imageName;
        } else {

            $imageName = $todo->image;
        }


        $todo->update([
            'name' => $request->input('name'),
            'image' => $imageName,
            'text' => $request->input('text'),
            'category_id' => $request->input('category'),
        ]);
        return redirect()->route('todo.index');
    }

    public function completed(Todo $todo)
    {
        $todo->update(['status' => 1]);
        return redirect()->back();
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->back();
    }
}
