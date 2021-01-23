<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function GetCategory()
   {
       echo 'Đây là trang Danh mục';
   }

   public function EditCategory()
   {
       echo 'Đây là trang sửa Danh mục';
   }
}
