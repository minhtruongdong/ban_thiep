<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\Category;
use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

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
        // dd($products);
        
        
        return view('client.pages.product.productdetail',[
            'products'=> $products,
            'products_related'=>$products_related,
            'category_list'=>$category_list,
            'id'=> $id,
            
        ]);
    }
    public function saveCustomImage(Request $request, $id, $cart_id){
        try {
            $product = Product::findOrFail($id);

            // Validate input
            $request->validate([
                'image' => 'required',
                'recipient_name' => 'required|string',
                'custom_message' => 'required|string',
            ]);

            $imageData = $request->input('image');
            
            // Tách dữ liệu base64
            list($type, $imageData) = explode(';', $imageData);
            list(, $imageData) = explode(',', $imageData);
            $imageData = base64_decode($imageData);

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
            // $item = Carts::all();
            
            // $cart = new Carts();
            // $cart->image_custom = $filePath; // Lưu đường dẫn hình ảnh
            // $cart->cart_total = 100000; // Ví dụ, bạn có thể thay đổi giá trị này
            // $cart->cart_date = now(); // Ngày hiện tại
            // $cart->status = 1; // Trạng thái giỏ hàng
            // $cart->user_id = auth()->user->id(); // Lấy ID người dùng hiện tại
            // $cart->payment_id = 1; // Ví dụ, thay đổi theo logic của bạn
            // $cart->product_id = $id; // Lưu ID sản phẩm
            // $cart->save(); // Lưu bản ghi vào cơ sở dữ liệu

            return response()->json([
                'success' => true,
                'message' => 'Lưu ảnh thành công',
                'file_name' => $fileName,
                'file_path' => $filePath,
                // 'cart_id' => $cart->id, // Lấy ID giỏ hàng vừa tạo
            ]);
            

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }
    // public function uploadImage(Request $request)
    // {
    //     if ($request->hasFile('image_custom')) {
    //         $image = $request->file('image_custom');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
            
    //         // Kiểm tra xem có thể di chuyển file không
    //         if ($image->move(public_path('images'), $imageName)) {
    //             $cart = new Cart();
    //             $cart->image_custom = 'images/' . $imageName; // Lưu đường dẫn tương đối
    //             // Thêm các trường khác nếu cần
    //             $cart->cart_total = 100000; // Ví dụ
    //             $cart->cart_date = now(); // Ví dụ
    //             $cart->status = 1; // Ví dụ
    //             $cart->user_id = auth()->id(); // Lấy ID người dùng hiện tại
    //             $cart->payment_id = 1; // Ví dụ, thay đổi theo logic của bạn
    //             $cart->save();
    
    //             return response()->json(['success' => 'Hình ảnh đã được lưu thành công!']);
    //         } else {
    //             return response()->json(['error' => 'Không thể lưu hình ảnh!'], 500);
    //         }
    //     }
    // }
}