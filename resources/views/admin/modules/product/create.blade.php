@extends('admin.master')
@section('title','Create')
@section('content')

<h1>CREATE PRODUCT</h1>
<div style="width: 1000px">
        <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">     
                
                <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                            <div class="col-sm-6">
                            <!-- Form -->
                            <div class="mb-4">
                                <label for="text" >Product Name</label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control" >
                            </div>
                            <!-- End of Form -->
                            <!-- Form -->
                            <div class="mb-4">
                                <label for="text">Price</label>
                                <input type="text" name="price" value="{{old('price')}}" class="form-control" >
                            </div>
                            <!-- End of Form -->
                            <!-- Form -->
                            <div class="mb-4">
                                <label for="text">Description</label>
                                <textarea value="" class="form-control" name="description" id="" cols="20" rows="10"> {{old('description')}} </textarea>
                                <script>
                                    CKEDITOR.replace('description');
                                </script>
                            </div>
                            <!-- End of Form -->
                            <!-- Form -->
                            <div class="mb-4">
                                <label for="text">Content</label>
                                <input type="text" name="content" value="{{old('content')}}" class="form-control" >
                                <script>
                                    CKEDITOR.replace('content');
                                </script>
                            </div>
                            <!-- End of Form -->

                        
                        </div>
                        <div class="col-sm-6">
                            <!-- Form -->
                            <div class="mb-4">
                                <label class="my-1 me-2" for="country">Category</label>
                                <select class="form-select" id="country" aria-label="Default select example" name="category_id">
                                    <option value="0" {{old('category_id') == 0 ? 'selected' : '' }}>
                                        Open list category
                                    </option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{$category->name}}
                                        </option>    
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="my-1 me-2" for="country">Status</label>
                                <select class="form-select" id="country" aria-label="Default select example" name="status">
                                    <option selected>Open this select menu</option>
                                    <option value="1" {{old('status') == 1 ? 'selected' : '' }}>Show</option>
                                    <option value="2" {{old('status') == 2 ? 'selected' : '' }}>Hidden</option>
                                </select>
                            </div>
                            <!-- End of Form -->
                            <!-- Form -->
                            <div class="mb-4">
                                <label class="my-1 me-2" for="country">Featured</label>
                                <select class="form-select" id="country" aria-label="Default select example" name="featured">
                                    <option selected>Open this select menu</option>
                                    <option value="1" {{old('featured') == 1 ? 'selected' : '' }}>Featured</option>
                                    <option value="2" {{old('featured') == 2 ? 'selected' : '' }}>UnFeatured</option>
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
                                
                            </div>

                        </div>
                        <button class="btn mx-1 me-2 btn-secondary" type="submit">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{asset('myscript/ajax.js')}}"></script>


@endsection

