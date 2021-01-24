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
        return redirect()->back()->with('thong-bao','Đã thêm thuộc tính '.$request->attr_name);
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
            return redirect()->route('product.add')->with('thongbao','Không có sự thay đổi');
        }else{
            $Attribute=Attributes::find($id);
            $Attribute->name=$request->name;
            $Attribute->save();
            return redirect()->route('product.add')->with('thongbao','Đã sửa thành cônng');
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
        $value->attr_id=$request->id_attr;
        $value->save();
        return redirect()->back()->with('thong-bao','Đã thêm giá trị '.$request->add_value);
    }
    public function EditValue(Request $request)
    {
        $data['values']=Values::find($request->id_value);
        return view('backend.attr.editvalue',$data);
    }
    public function EditValuePost(EditAttrRequest $request, $id)
    {
        $value=Values::find($id);
        $value->value=$request->name;
        $value->save();
        return redirect()->route('detail-attr')->with('thongbao-EditAttr','Đã sửa giá trị thuộc tính thành cônng');
    }
    public function DelValue(Request $request){
        Values::destroy($request->id_value);
        return redirect()->route('detail-attr')->with('thongbao-EditAttr','Đã xóa giá trị thuộc tính '.$request->name);
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
