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

    public function EditProduct()
    {
        return view('backend.product.editproduct');
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
