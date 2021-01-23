<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function GetLogin()
    {
        return view('backend.login.login');
    }

    public function GetIndex()
    {
        return view('backend.index');
    }
}
