<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::with('parent')->get();
        return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('admin.categories.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        Category::create([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id
        ]);

        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::whereNull('parent_id')->get();

        return view('admin.categories.edit',compact('category','categories'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $category = Category::find($id);

        $category->update([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id
        ]);

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('categories.index');
    }
}