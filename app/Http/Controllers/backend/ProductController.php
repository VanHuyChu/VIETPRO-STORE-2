<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\AddProductRequest;
use App\Http\Requests\backend\EditProductRequest;
use App\Models\Attributes;
use App\Models\Products;

class ProductController extends Controller
{
    public function ListProduct()
    {
        // dd(attr_values(Products::find(1)->values()->get()));
        $data['products']=Products::paginate(10);
        return view('backend.product.listproduct', $data);
    }

    public function AddProduct()
    {
        return view('backend.product.addproduct');
    }
    public function PostProduct(AddProductRequest $request)
    {
    }

    public function EditProduct()
    {
        return view('backend.product.editproduct');
    }
    public function PostEditProduct(EditProductRequest $request)
    {
    }

    public function DetailAttr()
    {
        $data['attrs']=Attributes::all();
        // foreach ($data['attrs'] as $value){
        //     dd($value->values);
        //     return $value->value;
        // }
											
        return view('backend.attr.attr',$data);
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
