<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function GetHome()
    {
        $data['product_fe']=Products::where('featured','=','1')->take(4)->get();
        // $data['product_fe']=Products::where('featured','=','1')->where('img','<>','no-img.jpg')->take(4)->get();
        $data['product_new']=Products::orderby('created_at','DESC')->take(8)->get();
        return view('frontend.index',$data);
    }

    public function GetContact()
    {
        return view('frontend.contact');
    }

    public function GetAbout()
    {
        return view('frontend.about');
    }
}
