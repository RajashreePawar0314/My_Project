<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{

/*public function index()
{
    $products = Product::with(['category','subcategory'])->get();

return view('admin.products.index',compact('products'));
}
public function index(Request $request)
{
    $products = Product::with('category','subcategory')->paginate(10);

    return view('admin.products.index', compact('products'));

}*/

public function index(Request $request)
{
    $query = Product::with('category','subcategory');

    // 🔍 Search by name
    if($request->search){
        $query->where('name','LIKE','%'.$request->search.'%');
    }

    // 💰 Filter by price
  /*  if($request->price){
        if($request->price == 'low'){
            $query->orderBy('price','asc');
        }else{
            $query->orderBy('price','desc');
        }
    }*/

        if($request->min_price){
    $query->where('price','>=',$request->min_price);
}
if($request->max_price){
    $query->where('price','<=',$request->max_price);
}

    // 🆕 Latest products
    if($request->latest){
        $query = $query->latest(); // important: assign back
    }

    // 📄 Pagination (10 per page) + preserve filters
    $products = $query->paginate(10)->appends($request->all());

    return view('admin.products.index', compact('products'));
}

public function create()
{
$categories = Category::whereNull('parent_id')->get();

return view('admin.products.create',compact('categories'));
}

public function store(Request $request)
{
    $product = Product::create($request->all());

    if($request->hasFile('images')){
        foreach($request->file('images') as $file){

            $path = $file->store('products','public');

            ProductImage::create([
                'product_id' => $product->id,
                'image' => $path
            ]);
        }
    }

    return redirect()->route('products.index'); // ✅ FIX
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
if($request->hasfile('images'))
    {
        foreach($request->file('images')as $file)
            {
                $path=$file->store('products','public');
                ProductImage::create([
                    'product_id'=>$product->id,
                    'image'=>$path]);
            }
    }
return redirect()->route('products.index');

}
public function deleteImage($id)
{
    $image = ProductImage::find($id);

    // delete file from storage
    if($image)
        // && Storage::exists('public/'.$image->image)){
    {    
    \Storage::delete('public/'.$image->image);
    $image->delete();
    }

    // delete from database

    return back();
}

public function destroy($id)
{

Product::find($id)->delete();

return redirect()->route('products.index');

}

}
