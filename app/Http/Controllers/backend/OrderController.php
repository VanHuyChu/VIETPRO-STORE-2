<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function ListOrder()
    {
        return view('backend.order.order');
    }
    public function DetailOrder()
    {
        return view('backend.order.detailorder');
    }
    public function Processed()
    {
        return view('backend.order.orderprocessed');
    }
}
