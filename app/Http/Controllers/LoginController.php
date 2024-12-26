<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin(){
        
        return view('auth.login');
    }

    public function login(LoginRequest $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::check($credentials)){
            return redirect()->route('admin.dash.index');
        }else{
            return redirect()->route('client.index');
        }

        return redirect()->back();
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('client.index');
    }
}
