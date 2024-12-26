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

    public function login(LoginRequest $request) {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công
            $user = Auth::user();
            if ($user->level == 1) {
                return redirect()->route('admin.dash.index');
            } elseif ($user->level == 2) {
                return redirect()->route('client.index');
            }
        }
    
        // Đăng nhập thất bại
        return redirect()->back()->withErrors(['email' => 'Thông tin đăng nhập không chính xác.']);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('client.index');
    }
}
