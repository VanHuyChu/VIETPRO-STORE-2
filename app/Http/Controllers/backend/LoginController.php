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
