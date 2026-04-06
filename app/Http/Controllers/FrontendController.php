<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
public function index()
{
    $products = DB::table('products')
        ->select(
            'products.id',
            'products.name',
            'products.price',
            DB::raw("(SELECT image 
                      FROM product_images 
                      WHERE product_images.product_id = products.id 
                      LIMIT 1) as image")
        )
        ->get();

    $categories = DB::table('categories')
        ->whereNull('parent_id')
        ->get();

    $subcategories = DB::table('categories')
        ->whereNotNull('parent_id')
        ->get();

    return view(
        'frontend.index',
        compact('products','categories','subcategories')
    );
}



public function category($id)
{
    $products = DB::table('products')
    ->select(
        'products.id',
        'products.name',
        'products.price',
        DB::raw("(SELECT image 
                  FROM product_images 
                  WHERE product_images.product_id = products.id 
                  LIMIT 1) as image")
    )
    ->where('products.category_id', $id)
    ->get();

    $categories = DB::table('categories')
        ->whereNull('parent_id')
        ->get();

    $subcategories = DB::table('categories')
        ->whereNotNull('parent_id')
        ->get();

    return view(
        'frontend.index',
        compact('products', 'categories', 'subcategories')
    );
}


public function subcategoryProducts($id)
{
    $products = DB::table('products')
    ->select(
        'products.id',
        'products.name',
        'products.price',
        DB::raw("(SELECT image 
                  FROM product_images 
                  WHERE product_images.product_id = products.id 
                  LIMIT 1) as image")
    )
    ->where('products.subcategory_id', $id)
    ->get();

    $categories = DB::table('categories')
        ->whereNull('parent_id')
        ->get();

    $subcategories = DB::table('categories')
        ->whereNotNull('parent_id')
        ->get();

    return view(
        'frontend.index',
        compact('products', 'categories', 'subcategories')
    );
}



public function search(Request $request)
{
    $keyword = trim($request->keyword);

    $products = DB::table('products')
        ->select(
            'products.id',
            'products.name',
            'products.price',
            DB::raw("(SELECT image 
                      FROM product_images 
                      WHERE product_images.product_id = products.id 
                      LIMIT 1) as image")
        )
        ->whereRaw(
            'LOWER(products.name) LIKE ?',
            ['%' . strtolower($keyword) . '%']
        )
        ->get();

    $categories = DB::table('categories')
        ->whereNull('parent_id')
        ->get();

    $subcategories = DB::table('categories')
        ->whereNotNull('parent_id')
        ->get();

    return view(
        'frontend.index',
        compact('products', 'categories', 'subcategories')
    );
}

public function productDetails($id)
{
    $product = DB::table('products')
        ->where('id', $id)
        ->first();

    $images = DB::table('product_images')
        ->where('product_id', $id)
        ->get();

    return view(
        'frontend.product-details',
        compact('product', 'images')
    );
}

}
?>