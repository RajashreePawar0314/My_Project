<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class CartController extends Controller
{

    public function addToCart($id)
{
    $user_id = Session::get('user_id');

    // If user not logged in → go to login
    if(!$user_id)
    {
        return redirect('/login');
    }

    // Check if product already in cart
    $exists = DB::table('cart')
        ->where('user_id', $user_id)
        ->where('product_id', $id)
        ->first();

    if($exists)
    {
        DB::table('cart')
            ->where('id', $exists->id)
            ->increment('quantity');
    }
    else
    {
        DB::table('cart')->insert([
            'user_id' => $user_id,
            'product_id' => $id,
            'quantity' => 1
        ]);
    }

    return redirect('/cart');
}
    public function cart()
{
    $user_id = Session::get('user_id');

    if(!$user_id)
    {
        return redirect('/login');
    }

    $cartItems = DB::table('cart')
        ->join('products', 'cart.product_id', '=', 'products.id')
        ->leftJoin(
            'product_images',
            'products.id',
            '=',
            'product_images.product_id'
        )
        ->select(
            'cart.id',
            'cart.quantity',
            'products.name',
            'products.price',
            DB::raw('MIN(product_images.image) as image')
        )
        ->where('cart.user_id', $user_id)
        ->groupBy(
            'cart.id',
            'cart.quantity',
            'products.name',
            'products.price'
        )
        ->get();

    return view('frontend.cart', compact('cartItems'));
}

}