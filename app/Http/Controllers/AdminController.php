<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function loginAdmin()
    {
        if (auth()->check()) {
            return redirect()->to('dashboard');
        }
        return view('back-end.login');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login')->with('message', 'Đăng xuất thành công');
    }

    public function postLoginAdmin(LoginRequest $request)
    {
        $remember = $request->has('remember_me') ? true : false;
        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember)) {
            return redirect()->to('dashboard');
        }
        else{
            Session::put('error', 'Username/Password bị sai. Vui lòng nhập lại');
            return redirect()->to('admin');
        }


    }

    public function show_dashboard(){
        return view('back-end.home');
    }




}
