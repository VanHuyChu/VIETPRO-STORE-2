<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\{AddProductRequest,EditProductRequest,AddAttrRequest,EditAttrRequest,AddValueRequest};
use App\Models\{Attributes,Category,Products,Values,Variant};
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // Product
    public function ListProduct()
    {
        // dd(attr_values(Products::find(1)->values()->get()));
        $data['products']=Products::paginate(10);
        return view('backend.product.listproduct', $data);
    }
    public function AddProduct()
    {
        $data['categorys']=Category::all();
        $data['attrs']=Attributes::all();
        return view('backend.product.addproduct', $data);
    }
    public function PostProduct(AddProductRequest $request)
    {
        $product = new Products();
        $product->product_code=$request->product_code;
        $product->name=$request->product_name;
        $product->price=$request->product_price;
        $product->featured=$request->featured;
        $product->state=$request->product_state;
        $product->info=$request->info;
        $product->describe=$request->description;
        $product->category_id=$request->category;
        if($request->hasFile('product_img'))
        {
        $file = $request->product_img;
        $filename= Str::random(4).'.'.$file->getClientOriginalExtension();
        $file->move('public/backend/img', $filename);
        $product->img= $filename;
        }
        else {
            $product->img='no-img.jpg';
        }
        $product->save();
        // Để biết sản phẩm vừa lưu có những thuộc tính nào(xem thuộc tính sản phẩm id 1,2 trong ds SP)
        $mang=array();
        foreach ($request->attr as $value) {
            foreach ($value as $item) {
                $mang[]=$item;
            }
        }
        $product->values()->attach($mang);
        
        // Một sản phẩm có nhiều biến thể VD XL-Đen, XL-Trắng -> 2 biến thể
        // $variant tra ve 1 mang
        $variant=get_combinations($request->attr);
        foreach($variant as $var) 
        {
            $vari=new Variant;
            $vari->product_id=$product->id;
            $vari->save();
            $vari->values()->attach($var);
        }
        return redirect('admin/product/add-variant/'.$product->id);
    }
    public function EditProduct()
    {
        return view('backend.product.editproduct');
    }
    public function PostEditProduct(EditProductRequest $request)
    {
    }
    // /Product

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
    public function AddVariant($id)
    {
        $product=Products::find($id);
        return view('backend.variant.addvariant',compact('product'));
    }
    public function EditVariant()
    {
        return view('backend.variant.editvariant');
    }
}
