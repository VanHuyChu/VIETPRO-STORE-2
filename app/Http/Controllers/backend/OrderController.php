<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function ListOrder()
    {
        $data['customers']=customer::where('state','0')->orderby('created_at','DESC')->paginate(10);
        return view('backend.order.order',$data);
    }
    public function DetailOrder($id)
    {
        $data['customer']=customer::find($id);
        return view('backend.order.detailorder', $data);
    }
    public function ActiveOrder($id)
    {
        $customer=customer::find($id);;
        $customer->state='1';
        $customer->save();
        return redirect()->route('order.processed')->with('thongbao','Da hoan tat don hang');
    }
    public function Processed()
    {
        $data['customers']=customer::where('state','1')->orderby('updated_at','DESC')->paginate(10);
        return view('backend.order.orderprocessed',$data);
    }
}
