<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('created_at','DESC')->where('status','!=',3)->get();
        return view('admin.modules.user.index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.modules.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $users = new User();

        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        
        $users->full_name = $request->full_name;
        $users->phone = $request->phone;
        $users->level = $request->level;
        $users->status = $request->status;
        $users->save();

        return redirect()->route('admin.user.index')->with('success','Create User Successfully');
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
        $user = User::findOrFail($id);

        $edit_myself = null;

        if (Auth::user()->id == $id){
            $edit_myself = true;
        }
        else{
            $edit_myself = false;
        }

        if(Auth::user()->id != 1 && ($id == 1 || ($user['level'] == 1 && $edit_myself == false))){
            return redirect()->route('admin.user.index')->with('error', 'You do not have editing rights');
        }

        return view('admin.modules.user.edit',[
            'id' => $id,
            'user' => $user,
            'myself' => $edit_myself
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $users = User::find($id);

        $users->email = $request->email;

        if (!empty($request->password)){
            $request->validate([
                'password' => 'required|confirmed|min:8',
            ],[
                'password.required' => 'Please enter a password',
                'password.confirmed' => 'Password and confirmation password do not match',
            ]);
            $users->password = bcrypt($request->password);
        }
        
        $users->full_name = $request->full_name;
        $users->phone = $request->phone;

        if ($request->level != null) {
            $users->level = $request->level;
        }
       
    
        $users->status = $request->status;

        $users->save();

        return redirect()->route('admin.user.index')->with('success','Create User Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $users = User::findOrFail($id);

        if(($id == 1) || (Auth::user()->id != 1 && $users["level"] ==1)){
            return redirect()->route('admin.user.index')->with('error', 'You do not have editing rights');
        }

        $users->status = 3;

        $users->save();
        
        return redirect()->route('admin.user.index')->with('success','Delete User Successfully');        
    }
}
