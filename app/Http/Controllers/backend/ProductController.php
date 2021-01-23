<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ListProduct()
   {
       echo 'Đây là trang Danh sách sản phẩm';
   }

   public function AddProduct()
   {
       echo 'Đây là trang Thêm sản phẩm';
   }

   public function EditProduct()
   {
       echo 'Đây là trang sửa sản phẩm';
   }

   public function DetailAttr()
   {
       echo 'Đây là trang quản lý thuộc tính';
   }

   public function EditAttr()
   {
       echo 'Đây là trang Sửa thuộc tính';
   }


   public function EditValue()
   {
       echo 'Đây là trang Sửa giá trị của thuộc tính';
   }


   public function AddVariant()
   {
       echo 'Thêm biến thể';
   }

   public function EditVariant()
   {
       echo 'Sửa biến thể';
   }
}
