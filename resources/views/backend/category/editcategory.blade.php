@extends('backend.master.master')
@section('title', 'Sửa danh mục')
@section('category')
    class="active"
@endsection
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">Icons</li>
            </ol>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quản lý danh mục</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <form method="post">
                                @csrf
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Danh mục cha:</label>
                                        <select class="form-control" name="parent" id="">
                                            <option>----ROOT----</option>
                                            {{ GetCategory($category, 0, '', $cate->parent) }}
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tên Danh mục</label>
                                        <input type="text" class="form-control" name="name" id=""
                                            placeholder="Tên danh mục mới" value="{{ $cate->name }}">
                                            {{ShowSession(session('name'))}}
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sửa danh mục</button>
                                </div>
                            </form>
                            <div class="col-md-7">
                                
                                <h3 style="margin: 0;"><strong>Phân cấp Menu</strong></h3>
                                <div class="vertical-menu">
                                    <div class="item-menu active">Danh mục </div>
                                    {{ ShowCategory($category, 0, '', $cate->parent) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col-->
        </div>
        <!--/.row-->
    </div>
    <!--/.main-->
@endsection
