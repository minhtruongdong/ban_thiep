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
        dd($cart);
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

    public function cart(){
        $cartCollection = Cart::getContent();
        $item_cart = Carts::all();
        // dd($item_cart);
        // dd($cartCollection);
        return view('client.pages.cart.cartPopup', [
            'cartCollection' => $cartCollection,
            'item_cart' => $item_cart,
        ]);
    }
    
    // public function addToCart($id, $quantity){
        
    //     $product = Product::find($id);

    //     Cart::add(array(
    //         'id' => $product->id, // inique row ID
    //         'name' => $product->name,
    //         'price' => $product->price,
    //         'quantity' => $quantity,
    //         'attributes' => array(
    //         'image' => $product->image
    //         )
    //     ));

    //     return redirect()->route('client.cart');
    // }

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
    public function checkoutvnpay_payment(){
       
        
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/client/thanh-toan";
        $vnp_TmnCode = "QDNBN1PJ";//Mã website tại VNPAY 
        $vnp_HashSecret = "H5PAZUPT8EDRWWC6GDN2WTONJHXV8D4Q"; //Chuỗi bí mật
        
        $vnp_TxnRef = '1000'; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toan don hang test';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = 20000 * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        
        //Billing
       
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );
        
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }
        
        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
            // vui lòng tham khảo thêm tại code demo
    }
}