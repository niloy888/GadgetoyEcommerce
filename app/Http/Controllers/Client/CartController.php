<?php

namespace App\Http\Controllers\Client;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {

        $product = Product::find($request->id);

        Cart::add([
            'id' => $request->id,
            'name' => $product->product_name,
            'qty' => $request->qty,
            'price' => $product->product_price,
            'weight' => 550,
            'options' =>
                ['image' => $product->product_image],
        ]);

        return back();

    }

    public function showCart(){

        $cartItems = Cart::content();
        return view('client.cart.show-cart',[
            'cartItems' => $cartItems,
            // Session::put('total',$total)
        ]);

    }

    public function updateCart(Request $request)
    {

        Cart::update($request->rowId, $request->qty);
        return redirect('/cart/show')->with('message','Item updated');

    }

    public function deleteCart($id)
    {
        Cart::remove($id);
        return back()->with('message','Item deleted');
    }
}
