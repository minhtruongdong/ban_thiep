<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\Category;
use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClientProductController extends Controller
{
    public function category($id){

        $category = Category::findOrFail($id);
        $category_list =  Category::with('product')
            ->where('parent_id',0)
            ->get();

        $products = Product::with('category')->where('category_id',$id)->paginate(9);



        return view('client.pages.product.shop',[
                'category' => $category,
                'category_list' => $category_list,
                'products'=> $products,
                'id' => $id,

            ]
        );
    }

    public function productdetail($id){

        $products = Product::with('product_image','category')->where('id',$id)->first();
        $category_list =  Category::with('product')
            ->where('parent_id',0)
            ->get();
        $products_related = Product::with('category')
            ->where('category_id',$products->category->id)
            ->where('id','!=',$products->id)
            ->paginate(4);
        return view('client.pages.product.productdetail',[
            'products'=> $products,
            'products_related'=>$products_related,
            'category_list'=>$category_list,
            'id'=> $id,

        ]);
    }
    // public function saveCustomImage(Request $request, $id, $cart_id) {
    //     try {
    //         $product = Product::findOrFail($id);

    //         // Validate input
    //         $request->validate([
    //             'image' => 'required',
    //             'recipient_name' => 'required|string',
    //             'custom_message' => 'required|string',
    //         ]);

    //         $imageData = $request->input('image');

    //         // Tách dữ liệu base64
    //         list($type, $imageData) = explode(';', $imageData);
    //         list(, $imageData) = explode(',', $imageData);
    //         $imageData = base64_decode($imageData);

    //         // Kiểm tra xem dữ liệu hình ảnh có hợp lệ không
    //         if ($imageData === false) {
    //             throw new \Exception('Dữ liệu hình ảnh không hợp lệ.');
    //         }

    //         // Tạo tên file
    //         $fileName = 'product_' . $id . '_custom_' . time() . '.png';

    //         // Đường dẫn tới thư mục custom_images trong public
    //         $path = public_path('custom_images');

    //         // Kiểm tra và tạo thư mục nếu chưa tồn tại
    //         if (!file_exists($path)) {
    //             mkdir($path, 0777, true);
    //         }

    //         // Lưu file
    //         file_put_contents($path . '/' . $fileName, $imageData);

    //         // Đường dẫn để truy cập file
    //         $filePath = asset('custom_images/' . $fileName);

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Lưu ảnh thành công',
    //             'file_name' => $fileName,
    //             'file_path' => $filePath,
    //         ]);

    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Có lỗi xảy ra: ' . $e->getMessage(),
    //             'line' => $e->getLine(),
    //             'file' => $e->getFile()
    //         ], 500);
    //     }
    // }
    public function uploadImage(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Validate input
        $request->validate([
            'image' => 'required',
            'recipient_name' => 'required|string',
            'custom_message' => 'required|string',
            'recipientPrice' => 'required|integer',
            'recipientEmail' => 'required|string',
        ]);

        $imageData = $request->input('image');

        // Tách dữ liệu base64
        list($type, $imageData) = explode(';', $imageData);
        list(, $imageData) = explode(',', $imageData);
        $imageData = base64_decode($imageData);

        // Kiểm tra xem dữ liệu hình ảnh có hợp lệ không
        if ($imageData === false) {
            throw new \Exception('Dữ liệu hình ảnh không hợp lệ.');
        }

        // Tạo tên file
        $fileName = 'product_' . $id . '_custom_' . time() . '.png';

        // Đường dẫn tới thư mục custom_images trong public
        $path = public_path('custom_images');

        // Kiểm tra và tạo thư mục nếu chưa tồn tại
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // Lưu file
        file_put_contents($path . '/' . $fileName, $imageData);

        // Đường dẫn để truy cập file
        $filePath = asset('custom_images/' . $fileName);

        $money = $request->input('recipientPrice');
        $email = $request->input('recipientEmail');
        $image = $fileName;

        $cartData = [
            'image_custom' => $image,
            'cart_total' => $money,
            'cart_date' => now(),
            'status' => 1,
            'user_id' => 1,
            'payment_id' => 1,
            'product_id' => 1,
        ];

        $cartDetailData = [
            'money' => $money,
            'recipient_email' => $email,
            'quantity' => 1,
        ];



        session(['cart' => $cartData]);
        session(['cart_detail' => $cartDetailData]);

        // Lưu vào bảng carts
        // $cartId = DB::table('carts')->insertGetId([
        //     'image_custom' => $image, // Lưu tên file hình ảnh
        //     'cart_total' => $money, // Ví dụ
        //     'cart_date' => now(), // Ví dụ
        //     'status' => 1, // Ví dụ
        //     'user_id' => Auth::user()->id, // Lấy ID người dùng hiện tại
        //     'payment_id' => 1, // Ví dụ
        //     'product_id' => $id, // Lấy ID sản phẩm
        // ]);

        // DB::table('cart_detail')->insert([
        //     'cart_id' => $cartId, // ID của cart vừa tạo
        //     // 'product_id' => $id, // ID sản phẩm
        //     'money' => $money, // Giá sản phẩm
        //     'recipient_email' => $email,
        //     'quantity' => 1,
        // ]);

        return response()->json(['success' => true]);
    }
    public function showCart()
    {
        // Lấy dữ liệu giỏ hàng từ session
        $cart = session('cart');
        $cartDetail = session('cart_detail');

        // Kiểm tra xem dữ liệu giỏ hàng có tồn tại không
        // if (!$cart || !$cartDetail) {
        //     return redirect()->route('client.index');// Hiển thị view giỏ hàng trống nếu không có dữ liệu
        // }

        // Truyền dữ liệu giỏ hàng đến view
        return view('client.pages.cart.cart', [
            'cart' => $cart,
            'cartDetail' => $cartDetail,
        ]);
    }
}
