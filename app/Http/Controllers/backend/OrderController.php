<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function ListOrder()
    {
        echo 'Danh sách đơn hàng';
    }
    public function DetailOrder()
    {
        echo 'Chi tiết đơn hàng';
    }
    public function Processed()
    {
        echo 'Danh sách Đơn hàng đã xửa lý';
    }
}
