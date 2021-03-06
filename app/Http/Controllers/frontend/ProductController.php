<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\attr;
use App\Models\Attributes;
use App\Models\Category;
use App\Models\Products;
use App\Models\Values;
use App\Models\customer;
use App\Models\order;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductController extends Controller
{
    public function ListProduct(Request $request)
    {
        if($request->category){
            $data['products']=Category::find($request->category)->product()->paginate(8);
        }
        else if($request->start){
            $data['products']=Products::whereBetween('price',[$request->start,$request->end])->paginate(8);
        }
        else if($request->value){
            $data['products']=Values::find($request->value)->product()->paginate(8);
        }
        else{
            $data['products']=Products::paginate(8);
        }
        $data['category']=Category::all();
        $data['attrs']=Attributes::all();
        return view('frontend.product.shop', $data);
    }

    public function DetailProduct($id)
    {
        $data['product']=Products::find($id);
        $data['product_new']=Products::orderby('created_at','DESC')->take(4)->get();
        return view('frontend.product.detail', $data);
    }
    public function AddCart(Request $request)
    {
       // dd($request->all());
        $product=Products::find($request->id_product);
        Cart::add(['id' => $product->product_code, 'name' => $product->name, 'qty' => $request->quantity, 'price' => getprice($product,$request->attr), 'weight' => 0, 'options' => ['img' => $product->img,'attr'=>$request->attr]]);
        return redirect()->route('site.cart');
    }
    public function GetCart()
    {
        //dd(Cart::Content());
        $data['cart']=Cart::Content();
        $data['total']=Cart::total(0,'',',');
        
        return view('frontend.product.cart',$data);
    }
    public function UpdateCart($rowId, $qty)
    {
        Cart::update($rowId,$qty);
    }
    public function RemoveCart($id)
    {
        Cart::remove($id);
        return redirect()->route('site.cart');
    }
    

    public function CheckOut()
    {
        $data['cart']=Cart::content();
        $data['total']=Cart::total(0,'',',');
        return view('frontend.checkout.checkout',$data);
    }
    public function PostCheckOut(Request $request)
    {
        
        $customer=new customer();
        $customer->full_name=$request->name;
        $customer->address=$request->address;
        $customer->email=$request->email;
        $customer->phone=$request->phone;
        $customer->total=Cart::total(0,'','');
        $customer->state=0;
        $customer->save();
        foreach (Cart::content() as $product) {
            $order=new order();
            $order->name=$product->name;
            $order->price=$product->price;
            $order->quantity=$product->qty;
            $order->image=$product->options->img;
            $order->customer_id=$customer->id;
            $order->save();
            foreach ($product->options->attr as $key => $value) {
                $attr= new attr();
                $attr->name=$key;
                $attr->value=$value;
                $attr->order_id=$order->id;
                $attr->save();
            }
        }
        Cart::destroy();
        return redirect()->route('site.complate',['id'=>$customer->id]);
    }
    public function complate($id)
    {
        $data['customer']=customer::find($id);
        return view('frontend.product.complete',$data);
    }
}
