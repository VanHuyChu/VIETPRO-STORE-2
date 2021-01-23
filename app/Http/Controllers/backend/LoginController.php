<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\LoginRequest;

class LoginController extends Controller
{
   public function GetLogin()
   {
      return view('backend.login.login');
   }
   public function PostLogin(LoginRequest $request)
   {
      if ($request->email == 'admin@gmail.com' && $request->password == '123456') {
         session()->put('email', $request->email);
         return redirect('admin');
      } else {
         return redirect('login')->withInput();
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
