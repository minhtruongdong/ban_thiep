<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
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
            'id' => $id
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
            'id'=> $id
        ]);
    }
}
