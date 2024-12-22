@extends('admin.master')
@section('title','Edit')

@section('content')
    <div style="width: 1000px">
            <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">     
                    <form action="{{route('admin.product.update',['id'=>$id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                                <div class="col-sm-6">
                                <!-- Form -->
                                <div class="mb-4">
                                    <label for="text" >Product Name</label>
                                    <input type="text" name="name" value="{{old('name',$product->name)}}" class="form-control" >
                                </div>
                                <!-- End of Form -->
                                <!-- Form -->
                                <div class="mb-4">
                                    <label for="text">Price</label>
                                    <input type="text" name="price" value="{{old('price',$product->price)}}" class="form-control" >
                                </div>
                                <!-- End of Form -->
                                <!-- Form -->
                                <div class="mb-4">
                                    <label for="text">Description</label>
                                    <textarea value="{{old('description',$product->description)}}" class="form-control" name="description" id="" cols="20" rows="10"></textarea>
                                </div>
                                <!-- End of Form -->
                                <!-- Form -->
                                <div class="mb-4">
                                    <label for="text">Content</label>
                                    <input type="text" name="content" value="{{old('content',$product->content)}}" class="form-control" >
                                </div>
                                <!-- End of Form -->
                            </div>

                            {{-- --------------------------------- --}}

                            <div class="col-sm-6">
                                <!-- Form -->
                                <div class="mb-4">
                                    <label class="my-1 me-2" for="country">Category</label>
                                    <select class="form-select" id="country" aria-label="Default select example" name="category_id">
                                        <option value="0" {{old('category_id') == 0 ? 'selected' : '' }}>
                                            Open list category
                                        </option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" {{old('category_id',$product->category_id) == $category->id ? 'selected' : '' }}>
                                                {{$category->name}}
                                            </option>    
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="my-1 me-2" for="country">Status</label>
                                    <select class="form-select" id="country" aria-label="Default select example" name="status">
                                        <option selected>Open this select menu</option>
                                        <option value="1" {{old('status',$product->status) == 1 ? 'selected' : '' }}>One</option>
                                        <option value="2" {{old('status',$product->status) == 2 ? 'selected' : '' }}>Two</option>
                                    </select>
                                </div>
                                <!-- End of Form -->
                                <!-- Form -->
                                <div class="mb-4">
                                    <label class="my-1 me-2" for="country">Featured</label>
                                    <select class="form-select" id="country" aria-label="Default select example" name="featured">
                                        <option selected>Open this select menu</option>
                                        <option value="1" {{old('featured',$product->featured) == 1 ? 'selected' : '' }}>One</option>
                                        <option value="2" {{old('featured',$product->featured) == 2 ? 'selected' : '' }}>Two</option>
                                    </select>
                                </div>
                                <!-- End of Form -->

                                <!-- Form -->
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Image</label>
                                    <input class="form-control" type="file" id="formFile" name="image">
                                </div>
                                <!-- End of Form -->

                                <div class="group-image-detail">
                                    <div class="row">
                                        <button type="button" class="btn btn-white w-50 text-info" id="add-image">
                                            <i class="fas fa-plus"></i> Add image detail
                                        </button>
                                    </div>

                                    @foreach($product->product_image as $image)

                                        <div class="row d-flex align-items-center">
                                            <div class="col-md-3">
                                                <img src="{{asset('images/'.$image->image)}}" width="100%" id="image-{{$image->id}}">
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <input type="file" name="images_old" class="form-control file_old"  data-image= "{{$image->id}}" data-url="{{route('admin.product.uploadFile',['id'=>$image->id])}}">
                                            </div>

                                            <div class="col-md-3">
                                                <a href="{{route('admin.product.deleteFile',['id'=>$image->id]) }}" class="btn btn-danger w-50 text-info"  data-iamge="{{$image->id}}">
                                                    <i class="fas fa-minus"></i> 
                                                </a>
                                            </div>
                                        </div>
                                        
                                    @endforeach
                                </div>

                            </div>
                            
                            <button class="btn mx-1 me-2 btn-secondary" type="submit">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{asset('myscript/ajax.js')}}"></script>

@endsection