<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\CartDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = Carts::with('cartDetail')->get();
        // Debug để xem dữ liệu
        dd([
            'cartItems' => $cartItems->toArray(),
            'first_item' => $cartItems->first(),
            'cart_detail' => $cartItems->first()->cartDetail
        ]);
        
        return view('client.pages.cart.cartPopup', ['cartItems' => $cartItems]);
    }

    public function addToCart($id, $quantity)
    {
        $cart = Carts::with('cartDetail')->find($id);
        
        Cart::add([
            'id' => $cart->id,
            'name' => $cart->name,
            'price' => $cart->cartDetail->money,
            'quantity' => $quantity,
            'attributes' => [
                'image' => $cart->image_custom,
                'recipient_email' => $cart->cartDetail->recipient_email,
            ]
        ]);
        
        return redirect()->route('client.cartList');
    }

    public function cartDelete($id)
    {
        Cart::remove($id);
        return response()->json(['status' => 200]);
    }

    public function cartUpdate(Request $request)
    {
        Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->quantity
            ]
        ]);
        return response()->json(['status' => 200]);
    }

    public function getCartTotal()
    {
        return response()->json([
            'total' => number_format(Cart::getTotal(), 0, "", "."),
            'status' => 200
        ]);
    }
}