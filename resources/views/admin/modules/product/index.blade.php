@extends('admin.master')
@section('title','List - Product')

@section('content')
    <h1>LIST PRODUCT</h1>
    
    <td>
        {{-- @php
        $parent_product = DB::table('products')->select('name')->where('id', $products->category_id)->first();
    if ($parent_product) {
        echo $parent_product->name;
    } else {
    echo 'Parent category not found';
    }
        @endphp  --}}
    </td>


    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="row">
                <table class="table table-centered table-nowrap mb-0 rounded" id="example">

                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">ID</th>
                            <th class="border-0">Name</th>
                            <th class="border-0">Price</th>
                            <th class="border-0">Description</th>
                            <th class="border-0">Content</th>
                            <th class="border-0">Image</th>
                            <th class="border-0">Status</th>
                            <th class="border-0">Featured</th>
                            <th class="border-0">Created At</th>
                            <th class="border-0">Edit</th>
                            <th class="border-0">Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($products as $product)
                            @php
                                $image = file_exists(public_path('images/'.$product->image)) ? asset('images/'.$product->image) : asset('images/404.jpeg')
                            @endphp
                            <!-- Item -->
                            <tr>
                                <td>
                                    <a href="#" class="text-primary fw-bold">{{$loop->iteration}}</a>
                                </td>
    
                                <td >
                                    {{$product ->name}}
                                </td>
    
                                <td>
                                    {{number_format($product ->price,0,"",'.')}} VND
                                </td>
    
                                <td>
                                    {{$product ->description}}
                                </td>
                                
                                <td>
                                    {{$product ->content}}
                                </td>
                                <td>
                                    <img src="{{$image}}" alt="" width=" 200px"/>
                                </td>
                                <td>
                                    @if ($product->status == 1)
                                        <span style="border: 1px solid gray ; padding : 5px ; border-radius: 10px ; background-color:rgb(255, 109, 5); color:white ">Show</span>
                                    @else
                                        <span style="border: 1px solid gray ; padding : 5px ; border-radius: 10px ; background-color:rgb(157, 157, 157) ; color:white">Hidde</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($product ->featured == 1)
                                        <span class="badge badge-info">Featured</span>
                                    @else
                                        <span class="badge badge-danger">UnFeatured</span>
                                    @endif
                                </td>
    
                                <td>
                                    {{date('d/m/Y - H:m:i' , strtotime($product->created_at))}}
                                </td>
    
                                <td>
                                    <a href="{{route('admin.product.edit',['id'=>$product->id])}}">Edit</a>
                                </td>
                                <td>
                                    <a onclick="return confirmDelete()" href="{{route('admin.product.destroy',['id'=>$product->id])}}">Delete</a>
                                </td>
                            </tr>
                        <!-- End of Item -->
                        @empty
                            <tr>
                                <td colspan="12" class="text-center">No data found</td>
                            </tr>   
                        @endforelse
                    </tbody>

                </table>
              </div>

            
        </div>
    </div>
    
@endsection



    