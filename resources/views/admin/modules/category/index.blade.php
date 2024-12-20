@extends('admin.master')
@section('title','List - Category')
    
@section('content')
    <h1>LIST CATEGORY</h1>
    
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <table class="table table-centered table-nowrap mb-0 rounded" id="example">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">ID</th>
                        <th class="border-0">Name</th>
                        <th class="border-0">Parent</th>
                        <th class="border-0">Status</th>
                        <th class="border-0">Create At</th>
                        <th class="border-0">Edit</th>
                        <th class="border-0">Delete</th>
                        {{-- <th class="border-0 rounded-end">Change</th> --}}
                    </tr>
                </thead>    
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                <a href="#" class="text-primary fw-bold">{{$loop->iteration}}</a>
                            </td>
                            <td class="fw-bold d-flex align-items-center">
                                {{-- <svg class="icon icon-xxs text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path>
                                </svg> --}}
                                {{$category->name}}
                            </td>

                            <td>
                                @php
                                    DB::table('categories')->select('name','parent_id')->where('id', $category->parent_id)->first();
                                    if ($category->parent_id != 0){
                                        echo $category->name;
                                    }    
                                @endphp
                            </td>

                            <td>
                                @if ($category->status == 1)
                                    <span style="border: 1px solid gray ; padding : 5px ; border-radius: 10px ; background-color:rgb(57, 246, 183) ">Show</span>
                                @else
                                    <span style="border: 1px solid gray ; padding : 5px ; border-radius: 10px ; background-color:rgb(157, 157, 157) ; color:white">Hidde</span>
                                @endif
                            </td>
                            <td>
                                {{date('d/m/Y - H:m:i' , strtotime($category->created_at))}}
                            </td>
                            
                            <td>
                                <a href="{{route('admin.category.edit',['id'=>$category->id])}}">Edit</a>
                            </td>
                            <td>
                                <a onclick="return confirmDelete()" href="{{route('admin.category.destroy',['id'=>$category->id])}}">Delete</a>
                            </td>
                            {{-- <td>
                                <div class="row d-flex align-items-center">
                                    <div class="col-12 col-xl-2 px-0">
                                        <div class="small fw-bold">51%</div>
                                    </div>
                                    <div class="col-12 col-xl-10 px-0 px-xl-1">
                                        <div class="progress progress-lg mb-0">
                                            <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="51" aria-valuemin="0" aria-valuemax="100" style="width: 51%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </td> --}}
                            
                            {{-- <td class="text-success">
                                <div class="d-flex align-items-center">
                                    <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                                    </svg>                                   
                                    <span class="fw-bold">2.45%</span>
                                </div>
                            </td> --}}
                        
                        </tr>
                        <!-- End of Item -->
                    @endforeach
                    <!-- Item -->
                    
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection