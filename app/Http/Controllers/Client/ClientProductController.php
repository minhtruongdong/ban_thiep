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
//     public function uploadImage(Request $request, $id)
// {
//     $product = Product::findOrFail($id);

//     // Validate input
//     $request->validate([
//         'image' => 'required',
//         'recipient_name' => 'required|string',
//         'custom_message' => 'required|string',
//     ]);

//     $imageData = $request->input('image');

//     // Tách dữ liệu base64
//     list($type, $imageData) = explode(';', $imageData);
//     list(, $imageData) = explode(',', $imageData);
//     $imageData = base64_decode($imageData);

//     // Kiểm tra xem dữ liệu hình ảnh có hợp lệ không
//     if ($imageData === false) {
//         throw new \Exception('Dữ liệu hình ảnh không hợp lệ.');
//     }

//     // Tạo tên file
//     $fileName = 'product_' . $id . '_custom_' . time() . '.png';

//     // Đường dẫn tới thư mục custom_images trong public
//     $path = public_path('custom_images');

//     // Kiểm tra và tạo thư mục nếu chưa tồn tại
//     if (!file_exists($path)) {
//         mkdir($path, 0777, true);
//     }

//     // Lưu file
//     file_put_contents($path . '/' . $fileName, $imageData);

//     // Đường dẫn để truy cập file
//     $filePath = asset('custom_images/' . $fileName);

//     // Lưu vào bảng carts
//     DB::table('carts')->insert([
//         'image_custom' => $fileName, // Lưu tên file hình ảnh
//         'cart_total' => 100000, // Ví dụ
//         'cart_date' => now(), // Ví dụ
//         'status' => 1, // Ví dụ
//         'user_id' => Auth::user()->id, // Lấy ID người dùng hiện tại
//         'payment_id' => 1, // Ví dụ
//         'product_id' => $id, // Lấy ID sản phẩm
//     ]);

//     return response()->json(['success' => 'Hình ảnh đã được lưu thành công!']);
// }
public function uploadImage(Request $request, $id)
{
    try {
        Log::info('Start uploading image', [
            'product_id' => $id,
            'has_image' => $request->has('image'),
            'recipient_name' => $request->recipient_name
        ]);

        $product = Product::findOrFail($id);

        // Validate input
        $request->validate([
            'image' => 'required',
            'recipient_name' => 'required|string',
            'custom_message' => 'required|string',
        ]);

        $imageData = $request->input('image');
        
        // Log độ dài của dữ liệu ảnh
        Log::info('Image data length: ' . strlen($imageData));

        // Tách dữ liệu base64
        list($type, $imageData) = explode(';', $imageData);
        list(, $imageData) = explode(',', $imageData);
        $imageData = base64_decode($imageData);

        if ($imageData === false) {
            throw new \Exception('Invalid image data');
        }

        // Tạo tên file
        $fileName = 'product_' . $id . '_' . time() . '.png';
        $path = public_path('custom_images');

        // Kiểm tra và tạo thư mục
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // Kiểm tra quyền ghi
        if (!is_writable($path)) {
            throw new \Exception('Directory is not writable: ' . $path);
        }

        // Lưu file
        $fullPath = $path . '/' . $fileName;
        if (file_put_contents($fullPath, $imageData) === false) {
            throw new \Exception('Failed to save image file');
        }

        // Lưu vào database
        DB::beginTransaction();
        try {
            $cart = DB::table('carts')->insert([
                'image_custom' => $fileName,
                'cart_total' => $product->price ?? 100000,
                'cart_date' => now(),
                'status' => 1,
                'user_id' => Auth::id() ?? 1, // Fallback nếu không có user
                'payment_id' => 1,
                'product_id' => $id,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            DB::commit();
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

            return response()->json([
                'success' => true,
                'message' => 'Lưu ảnh thành công',
                'data' => [
                    'file_name' => $fileName,
                    'file_path' => asset('custom_images/' . $fileName)
                ]
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            // Xóa file nếu lưu DB thất bại
            if (file_exists($fullPath)) {
                unlink($fullPath);
            }
            throw $e;
        }

    } catch (\Exception $e) {
        Log::error('Error in uploadImage', [
            'error' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine()
        ]);

        return response()->json([
            'success' => false,
            'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
        ], 500);
    }
}
}