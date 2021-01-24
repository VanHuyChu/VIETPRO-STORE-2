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
        $attribute=new Attributes();
        $attribute->name=$request->attr_name;
        $attribute->save();
        return redirect()->back()->with('thong-bao-addAttr','Đã thêm thuộc tính '.$request->attr_name);
    }
    public function DetailAttr()
    {
        $data['attrs']=Attributes::all();
        return view('backend.attr.attr',$data);
    }

    

    public function EditAttr($id)
    {
        $attrs=Attributes::find($id);
        return view('backend.attr.editattr',compact('attrs'));
    }
    public function EditAttrPost(EditAttrRequest $request, $id)
    {
        if (Attributes::where('name', '=', $request->name)->count() > 0) {
            return redirect()->route('product.add')->with('thongbao-EditAttr','Không có sự thay đổi');
        }else{
            $Attribute=Attributes::find($id);
            $Attribute->name=$request->name;
            $Attribute->save();
            return redirect()->route('product.add')->with('thongbao-EditAttr','Đã sửa thành cônng');
        }
        
    }
    public function DelAttr($id){
        $Attribute=Attributes::find($id);
        $Attribute->delete();
        return redirect()->route('detail-attr')->with('thongbao-DelAttr','Đã xóa thuộc tính '.$Attribute->name);
    }
    /**
     * Value Attribute
     */
    public function AddValue(AddValueRequest $request)
    {
        $value=new Values();
        $value->value=$request->add_value;
        $value->save();
        return redirect()->back()->with('thong-bao-addValue','Đã thêm giá trị thuộc tính '.$request->attr_name);
    }
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
