<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function GetLogin()
   {
      return view('backend.login.login');
   }
   public function PostLogin(request $request)
   {
    $request->validate([
        'email'=>'required|email',
        'password'=>'required|min:5',
     ],[
        'email.required'=>'email không được để trống!',
        'email.email'=>'email không đúng định dạng!',
        'password.required'=>'Mật khẩu không được để trống!',
        'password.min'=>'Mật khẩu không được nhỏ hơn 5 ký tự',
     ]);
      if($request->email=='admin@gmail.com'&&$request->password=='123456')
      {
         return redirect('admin');
      }
      else {
         return redirect('login')->withInput();
      }
   }

   public function GetIndex()
   {
       return view('backend.index');
   }

   public function Logout()
   {
       return redirect('login');
   }
}
