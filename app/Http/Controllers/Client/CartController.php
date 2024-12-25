<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function checkout(){
        return view('client.pages.cart.checkout');
    }


    public function cart(){
        $cartCollection = Cart::getContent();
        // dd($cartCollection);
        return view('client.pages.cart.cartPopup', [
            'cartCollection' => $cartCollection
        ]);
    }
    
    public function addToCart($id, $quantity){
        
        $product = Product::find($id);

        Cart::add(array(
            'id' => $product->id, // inique row ID
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $quantity,
            'attributes' => array(
            'image' => $product->image
            )
        ));

        return redirect()->route('client.cart');
    }

    public function cartDelete($id){

        Cart::remove($id);

        return redirect()->route('client.cart');

    }

    public function cartUpdate(Request $request){
        $id = $request->id;
        $quantity = $request->quantity;
        Cart::update($id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $quantity
            )
          ));

        return response()->json([ 
            'status' =>200
           
           ]
        );
    }
}