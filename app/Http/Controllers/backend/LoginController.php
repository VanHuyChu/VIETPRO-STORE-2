<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\backend\LoginRequest;
use App\Models\Users;

class LoginController extends Controller
{
   public function GetLogin()
   {
      return view('backend.login.login');
   }
   public function PostLogin(LoginRequest $request)
   {
      if( Users::where('email',$request->email)->where('password',$request->password)->count()>0)
      {
         session()->put('email',$request->email);
         return redirect('admin');
      }
      else {
         return redirect('login')->withInput()->with('thongbao','Tài khoản khoặc mật khẩu không chính xác!');
      }
   }

   public function GetIndex()
   {
      return view('backend.index');
   }

   public function Logout()
   {
      session()->forget('email');
      return redirect('login');
   }
}
