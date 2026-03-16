<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{

public function index()
{
$products = Product::with(['category','subcategory'])->get();

return view('admin.products.index',compact('products'));
}

public function create()
{
$categories = Category::whereNull('parent_id')->get();

return view('admin.products.create',compact('categories'));
}

public function store(Request $request)
{

$request->validate([
'name'=>'required',
'category_id'=>'required',
'price'=>'required'
]);

Product::create([
'name'=>$request->name,
'category_id'=>$request->category_id,
'subcategory_id'=>$request->subcategory_id,
'price'=>$request->price,
'description'=>$request->description
]);

return redirect()->route('products.index');

}

public function edit($id)
{

$product = Product::find($id);

$categories = Category::whereNull('parent_id')->get();

return view('admin.products.edit',compact('product','categories'));

}

public function update(Request $request,$id)
{

$request->validate([
'name'=>'required',
'category_id'=>'required',
'price'=>'required'
]);

$product = Product::find($id);

$product->update([
'name'=>$request->name,
'category_id'=>$request->category_id,
'subcategory_id'=>$request->subcategory_id,
'price'=>$request->price,
'description'=>$request->description
]);

return redirect()->route('products.index');

}

public function destroy($id)
{

Product::find($id)->delete();

return redirect()->route('products.index');

}

}
