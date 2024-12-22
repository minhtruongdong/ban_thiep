<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Http\Requests\Admin\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use function Pest\Laravel\post;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $products = Product::with('category')->orderBy('created_at', 'DESC')->get();
        
        return view('admin.modules.product.index',[
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.modules.product.create',[
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $product = new Product();

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->content = $request->content;
        $product->category_id = $request->category_id;
        $product->status = $request->status;
        $product->featured = $request->featured;
        $product->user_id = Auth::user()->id;

        $file = $request->file('image');
        $fileName = time(). '-' . $file->getClientOriginalName() ;   
        $file->move(public_path('images/'), $fileName);

        $product->image = $fileName;

        $product->save();

        if( $request->images != null){
            $count = 0 ;
            $data_images = [];
            foreach($request->images as $image_detail){
                $count ++;
                $fileNameDetail =  $count . '-' . time() . '-' . $image_detail->getClientOriginalName();
                $image_detail->move(public_path('images/'), $fileNameDetail);

                $data_images[] = [
                    'image' => $fileNameDetail,
                    'product_id' => $product->id,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime(),
                ];
            }
            
            ProductImages::insert($data_images);
        }
        
        
        return redirect()->route('admin.product.index')->with('success','Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $categories = Category::get();
        $products = Product::with('product_image')->findOrFail($id);
        
        return view('admin.modules.product.edit', [
            'id' => $products->id,
            'product' => $products,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, int $id)
    {
        $products = Product::find($id);

        if($products==null){
            abort(404);
        }

        $products ->name = $request->name;
        $products->price = $request->price;
        $products->description = $request->description;
        $products->content = $request->content;
        $products->category_id = $request->category_id;
        $products->featured = $request->featured;
        $products->status = $request->status;
        $products->user_id = Auth::user()->id;
        
        $products->save();

        if($request->images != null){
            $count = 0 ;
            $data_images = [];
            foreach($request->images as $image_detail){
                $count ++;
                $fileNameDetail =  $count . '-' . time() . '-' . $image_detail->getClientOriginalName();
                $image_detail->move(public_path('images/'), $fileNameDetail);

                $data_images[] = [
                    'image' => $fileNameDetail,
                    'product_id' => $products->id,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime(),
                ];
            }
            
            ProductImages::insert($data_images);
        }
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $products = Product::findOrFail($id);

        // if($products==null){
        //     abort(404);
        // }

        $products->delete();
        return redirect()->route('admin.product.index')->with('success','Delete Category Successfully');
    }

    public function uploadFile(Request $request ,$id){
        $file = $request->image;
        $fileName = time() . '-' . $file->getClientOriginalName();
        $file->move(public_path('images/'), $fileName);

        $product_image = ProductImages::find($id);

        $file_old_url = public_path('images/' . $product_image->image);
        if(file_exists($file_old_url)){
            unlink($file_old_url);
        }

        $product_image->image = $fileName;
        $product_image->save();

        return response()->json(['success' => 'Image uploaded successfully'],200);
    }

    public function deleteFile($id){
        $product_image = ProductImages::find($id);

        $file_old_url = public_path('images/' . $product_image->image);
        if(file_exists($file_old_url)){
            unlink($file_old_url);
        }

        $product_image->delete();

        return redirect()->back();
    }
    

    public function search(Request $request)
    {
        $query = $request->input('query'); // Lấy từ khóa tìm kiếm
        $results = Product::where('name', 'LIKE', "%{$query}%")->get(); // Thay column_name bằng tên cột cần tìm kiếm

        return response()->json($results);
    }
    
}
