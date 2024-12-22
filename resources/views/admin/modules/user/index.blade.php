@extends('admin.master')
@section('title','List - User')
    
@section('content')
    <h1>LIST USER</h1>
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <table class="table table-centered table-nowrap mb-0 rounded" id="example">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">ID</th>
                        <th class="border-0">Email</th>
                        <th class="border-0">Level</th>
                        <th class="border-0">Status</th>
                        <th class="border-0">Fullname</th>
                        <th class="border-0">Phone</th>
                        <th class="border-0">Create At</th>
                        <th class="border-0">Edit</th>
                        <th class="border-0">Delete</th>
                        {{-- <th class="border-0 rounded-end">Change</th> --}}
                    </tr>
                </thead>    
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>
                            <a href="#" class="text-primary fw-bold">{{$loop->iteration}}</a>
                        </td>
                        <td class="fw-bold d-flex align-items-center">
                            <svg class="icon icon-xxs text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path>
                            </svg>
                            {{$user->email}}
                        </td>
                        
                        <td>
                            @if ($user->level == 1 && $user->id == 1)
                                <span style="border: 1px solid gray ; padding : 5px 10px ; border-radius: 10px ; background-color:rgb(255, 72, 5); color:white ; font-weight:bold ">Supper Admin</span>
                            @elseif($user->level == 1 )
                                <span style="border: 1px solid gray ; padding : 5px 10px ; border-radius: 10px ; background-color:rgb(4, 158, 19); color:white">Admin</span>
                            @else
                                <span style="border: 1px solid gray ; padding : 5px ; border-radius: 10px ; background-color:rgb(157, 157, 157) ; color:white">Member</span>
                            @endif
                        </td>
                        <td>
                            @if ($user->status == 1)
                                <span style="border: 1px solid gray ; padding : 5px ; border-radius: 10px ; background-color:rgb(4, 158, 19); color:white ">Show</span>
                            @else
                                <span style="border: 1px solid gray ; padding : 5px ; border-radius: 10px ; background-color:rgb(157, 157, 157) ; color:white">Hidde</span>
                            @endif
                        </td>

                        <td>
                            {{$user->full_name}}
                        </td>

                        <td>
                            <div class="row d-flex align-items-center">
                                <div class="col-12 col-xl-2 px-0">
                                    <div class="small fw-bold">{{$user->phone}}</div>
                                </div>
                            </div>
                        </td>
                        
                        <td>
                            {{date('d/m/Y - H:m:i' , strtotime($user->created_at))}}
                        </td>

                        <td>
                            <a href="{{route('admin.user.edit',['id'=>$user->id])}}" >Edit</a>
                        </td>
                        <td>
                            <a onclick="return confirmDelete()" href="{{route('admin.user.destroy',['id'=>$user->id])}}">Delete</a>
                        </td>
                    
                    </tr>
                    <!-- End of Item -->

                    @endforeach
                    <!-- Item -->
                    
                    
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection