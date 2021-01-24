<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\AddProductRequest;
use App\Http\Requests\backend\AddAttrRequest;
use App\Http\Requests\backend\AddValueRequest;
use App\Http\Requests\backend\EditProductRequest;
use App\Http\Requests\backend\EditAttrRequest;
use App\Models\Attributes;
use App\Models\Products;
use App\Models\Values;

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
        $data['attrs']=Attributes::all();
        return view('backend.product.addproduct', $data);
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

    public function AddAttr(AddAttrRequest  $request)
    {
        dd($request->attr_name);
    }
    public function DetailAttr()
    {
        $data['attrs']=Attributes::all();
        return view('backend.attr.attr',$data);
    }

    public function AddValue(AddValueRequest $request)
    {
        dd($request->add_value);
        return view('backend.attr.editattr');
    }

    public function EditAttr($id)
    {
        $attrs=Attributes::find($id);
        return view('backend.attr.editattr',compact('attrs'));
    }
    public function EditAttrPost(EditAttrRequest $request, $id)
    {
        dd($request->valueEditAttr);
        $attrs=Attributes::find($id);
        return view('backend.attr.editattr',compact('attrs'));
    }
    /**
     * Value Attribute
     */
    public function EditValue($id)
    {
        $values=Values::find($id);
        return view('backend.attr.editvalue',compact('values'));
    }
    public function EditValuePost(EditAttrRequest $request, $id)
    {
        dd($request->name);
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
