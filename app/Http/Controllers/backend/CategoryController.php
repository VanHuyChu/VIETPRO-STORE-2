<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\AddCategoryRequest;
use App\Http\Requests\backend\EditCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function GetCategory()
    {
        $data['category'] = Category::all();
        return view('backend.category.category', $data);
    }
    public function PostCategory(AddCategoryRequest $request)
    {
        $cate = new Category;
        $cate->name = $request->name;
        $cate->parent = $request->parent;
        $cate->save();
        return redirect()->back()->with('thongbao', 'Đã thêm thành công!');
    }
    public function EditCategory($id)
    {
        $data['cate'] = Category::find($id);
        $data['category'] = Category::all();
        return view('backend.category.editcategory', $data);
    }
    public function PostEditCategory(EditCategoryRequest $request, $id)
    {
        $cate = category::find($id);
        $cate->name = $request->name;
        $cate->parent = $request->parent;
        $cate->save();
        return redirect()->route('category.index')->with('thongbao-update', 'Đã sửa thành công');
    }
    public function DelCategory($id)
    {
        category::destroy($id);
        return redirect()->route('category.index')->with('thongbao-Del', 'Đã xoá thành công!');
    }
}
