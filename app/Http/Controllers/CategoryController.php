<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }
    
    public function index()
    {
        $categories = Category::all();
        return view('categories.index',compact('categories'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Category::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Category Added Succesfully');
    }
    public function edit(Category $category)
    {
        return view ('categories.edit', compact('category'));
    }
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category->update($request->all());
        return redirect()->route('categories.index')->with('success','Category updated successfully');
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success','Category deleted successfully');
    }

    public function removemenu(Category $category)
    {
        $category->menu = '0';
        $category->save();

        return redirect()->route('categories.index');
    }

    public function addmenu(Category $category)
    {
        $category->menu = '1';
        $category->save();

        return redirect()->route('categories.index');
    }
}
