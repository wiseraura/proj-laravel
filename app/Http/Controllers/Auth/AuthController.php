<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
    }

    public function login()
    {
        return view('auth.login');
    }

    public function action(Request $request)
    {
        $data = ['username' => $request->username, 'password' => $request->password];

        if($request->remember == "on") {
            $remember = true;
        } else {
            $remember = false;
        }

        if(Auth::attempt($data, $remember))
        {
            if(Auth::user()->level === 'admin')
                return redirect()->intended('admin/nguoi-dung');
            else
                return redirect()->intended('/');
        } else {
            return redirect()->route('auth.login')->with('notify', 'Tài khoản hoặc mật khẩu không đúng!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('auth.login')->with(['alert' => [
            'type' => 'success',
            'title' => 'Đăng xuất thành công!',
            'content' => 'Chúc bạn một ngày vui vẻ.'
        ]]);
    }
}
