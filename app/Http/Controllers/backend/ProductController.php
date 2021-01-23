<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ListProduct()
    {
        return view('backend.product.listproduct');
    }

    public function AddProduct()
    {
        return view('backend.product.addproduct');
    }
    public function PostProduct(Request $request)
    {

        $request->validate([
            'product_code' => 'required|min:3',
            'product_name' => 'required|min:3',
            'product_price' => 'required|numeric',
            'product_img' => 'image',
        ], [
            'product_code.required' => 'Mã sản phẩm không được để trống!',
            'product_code.min' => 'Mã sản phẩm phải lớn hơn 3 ký tự!',
            'product_name.required' => 'Tên sản phẩm không được để trống!',
            'product_name.min' => 'Tên sản phẩm phải lớn hơn 3 ký tự!!',
            'product_price.required' => 'Giá sản phẩm không được để trống!',
            'product_price.numeric' => 'Giá sản phẩm không đúng định dạng!',
            'product_img.image' => 'File Ảnh không đúng định dạng!',
        ]);
    }

    public function EditProduct()
    {
        return view('backend.product.editproduct');
    }
    public function PostEditProduct(Request $request)
    {
        $request->validate([
            'product_code' => 'required|min:3',
            'product_name' => 'required|min:3',
            'product_price' => 'required|numeric',
            'product_img' => 'image',
        ], [
            'product_code.required' => 'Mã sản phẩm không được để trống!',
            'product_code.min' => 'Mã sản phẩm phải lớn hơn 3 ký tự!',
            'product_name.required' => 'Tên sản phẩm không được để trống!',
            'product_name.min' => 'Tên sản phẩm phải lớn hơn 3 ký tự!!',
            'product_price.required' => 'Giá sản phẩm không được để trống!',
            'product_price.numeric' => 'Giá sản phẩm không đúng định dạng!',
            'product_img.image' => 'File Ảnh không đúng định dạng!',
        ]);
    }

    public function DetailAttr()
    {
        return view('backend.attr.attr');
    }

    public function EditAttr()
    {
        return view('backend.attr.editattr');
    }


    public function EditValue()
    {
        return view('backend.attr.editvalue');
    }


    public function AddVariant()
    {
        return view('backend.variant.addvariant');
    }

    public function EditVariant()
    {
        return view('backend.variant.editvariant');
    }
}
