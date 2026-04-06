<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Add product to cart
    public function addToCart(Request $request, $id)
    {
        $user_id = Session::get('user_id');

        // Redirect to login if not logged in
        if (!$user_id) {
            return redirect('/login');
        }

        // Get selected size from request
        $size = $request->input('size');

        if (!$size) {
            return redirect()->back()->with('error', 'Please select a size.');
        }

        // Check if the same product with same size already exists
        $exists = DB::table('cart')
            ->where('user_id', $user_id)
            ->where('product_id', $id)
            ->where('size', $size)
            ->first();

        if ($exists) {
            // Increment quantity if duplicate
            DB::table('cart')
                ->where('id', $exists->id)
                ->increment('quantity');
        } else {
            // Insert new cart item
            DB::table('cart')->insert([
                'user_id' => $user_id,
                'product_id' => $id,
                'quantity' => $request->input('quantity', 1),
                'size' => $size
            ]);
        }

        return redirect('/cart')->with('success', 'Product added to cart!');
    }

    // Display cart page
    public function cart()
    {
        $user_id = Session::get('user_id');

        if (!$user_id) {
            return redirect('/login');
        }

        $cartItems = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->leftJoin('product_images', 'products.id', '=', 'product_images.product_id')
            ->select(
                'cart.id',
                'cart.quantity',
                'cart.size', // now fetch size
                'products.name',
                'products.price',
                DB::raw('MIN(product_images.image) as image')
            )
            ->where('cart.user_id', $user_id)
            ->groupBy(
                'cart.id',
                'cart.quantity',
                'cart.size',
                'products.name',
                'products.price'
            )
            ->get();

        return view('frontend.cart', compact('cartItems'));
    }

public function removeFromCart($id)
{
    $user_id = Session::get('user_id');
    if(!$user_id) {
        return redirect('/login');
    }

    DB::table('cart')
        ->where('id', $id)
        ->where('user_id', $user_id)
        ->delete();

    return redirect('/cart')->with('success', 'Item removed from cart!');
}

}