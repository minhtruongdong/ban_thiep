<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $categories = Category::all();
        return view('admin.modules.category.index',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $categories = Category::select('id','name','parent_id')->get();

        return view('admin.modules.category.create',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $category = new Category();

        // tên cột trong database = tên name trong input
        $category->name = $request->name;
        $category->status = $request->status;
        $category->parent_id =$request->parent_id;
        
        $category->save();
 
        return redirect()->route('admin.category.index');
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
        $category = Category::findOrFail($id);

        $categories = Category::select('id','name','parent_id')->get();

        // if($category==null){
        //     abort(404); 
        // }
        
        return view('admin.modules.category.edit', [
            'id' => $category->id,
            'category' => $category,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, int $id)
    {
        $category = Category::findOrFail($id);

        // if($category==null){
        //     abort(404);
        // }

        $category ->name = $request->name;
        $category->status = $request->status;
        $category->parent_id =$request->parent_id;

        $category->save();
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {   
        $check_parent = Category::where('parent_id',$id)->count();

        if($check_parent >0){
            return redirect()->route('admin.category.index')->with('error','You not allow delete category because have children !');
        }


        $check_product = Product::where('category_id',$id)->count();

        if($check_product ){
            return redirect()->route('admin.category.index')->with('error','You not allow delete category because exits product !');
        }
        $category = Category::findOrFail($id);

        // if($category==null){
        //     abort(404);
        // }

        $category->delete();
        return redirect()->route('admin.category.index')->with('success','Delete Category Successfully');
    }
}


