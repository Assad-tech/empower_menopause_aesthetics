<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);

        return view('backend.category.index',compact('categories'));
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|unique:categories,name',
        ]);

        Category::create([
            'name' => $request->category,
            'slug' => Str::slug($request->category,),
        ]);
        toastr()->success('Category created successfully.');
        return redirect()->route('admin.manage.categories');
    }

    public function edit( $id)
    {
        $category = Category::findOrFail($id);
        // dd($category);
        return view('backend.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // dd($id);
        $request->validate([
            'category' => 'required|string|unique:categories,name,' . $id,
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->category,
            'slug' => Str::slug($request->category),
        ]);

        toastr()->success('Category updated successfully.');
        return redirect()->route('admin.manage.categories');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        toastr()->success('Category deleted successfully.');
        return redirect()->route('admin.manage.categories');
    }
}
