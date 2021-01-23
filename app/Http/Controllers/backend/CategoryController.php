<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\AddCategoryRequest;
use App\Http\Requests\backend\EditCategoryRequest;

class CategoryController extends Controller
{
    public function GetCategory()
    {
        return view('backend.category.category');
    }
    public function PostCategory(AddCategoryRequest $request)
    {

    }
    public function EditCategory()
    {
        return view('backend.category.editcategory');
    }
    public function PostEditCategory(EditCategoryRequest $request)
    {
    }
}
