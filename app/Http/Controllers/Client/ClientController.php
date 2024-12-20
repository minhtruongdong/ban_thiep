<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $categories = Category::where('parent_id',0)->get();

        // $categories = Category::with(['products' => function ($query) {
        //     $query->orderBy('created_at', 'DESC')->take(5); // Lấy 5 sản phẩm mới nhất cho mỗi danh mục
        // }])->where('parent_id', 0)->get();
        
        $products_lastest = Product::orderBy('created_at','DESC')
        ->with('category')
        ->skip(0)->take(5)->get();
        $products_feature_lastest =Product::orderBy('created_at','DESC')
        ->with('category')
        ->where('featured',1)
        ->first(); 
        // dd($products_lastest->toArray());
        return view('client.pages.home',[
            'categories'=> $categories,
            'products_lastest'=> $products_lastest,
            'products_feature_lastest' => $products_feature_lastest
        ]);
    }

    public function about(){
        return view('client.pages.about');
    }


    public function contact(){
        return view('client.pages.contact');
    }


    public function savePrice(Request $request){
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
