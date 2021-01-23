<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function GetLogin()
   {
       echo 'Đây là trang Login';
   }

   public function GetIndex()
   {
       echo 'Đây là trang quản trị';
   }
}
