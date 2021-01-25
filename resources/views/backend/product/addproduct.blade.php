@extends('backend.master.master')
@section('title', 'Thêm Sản phẩm')
@section('product')
    class="active"
@endsection
@section('script_product')
    <script>
        function changeImg(input) {
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function(e) {
                    //Thay đổi đường dẫn ảnh
                    $('#avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function() {
            $('#avatar').click(function() {
                $('#img').click();
            });
        });

    </script>
@endsection
@section('content')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm sản phẩm</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-6 col-md-12 col-lg-12">
                <form action="{{route('product.addPost')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="panel panel-primary">
                        <form action="" method="post"></form>
                        <div class="panel-heading">Thêm sản phẩm</div>
                        <div class="panel-body">
                            <div class="row" style="margin-bottom:40px">
                                <div class="col-xs-8">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Danh mục</label>
                                                <select name="category" class="form-control">
                                                   {!!GetCategory($categorys, 0, '', 0)!!}
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Mã sản phẩm</label>
                                                <input type="text" name="product_code" class="form-control">
                                                {!! showErrors1($errors, 'product_code') !!}
                                            </div>
                                            <div class="form-group">
                                                <label>Tên sản phẩm</label>
                                                <input type="text" name="product_name" class="form-control">
                                                {!! showErrors1($errors, 'product_name') !!}
                                            </div>
                                            <div class="form-group">
                                                <label>Giá sản phẩm (Giá chung)</label>
                                                <input type="number" name="product_price" class="form-control">
                                                {!! showErrors1($errors, 'product_price') !!}
                                            </div>
                                            <div class="form-group">
                                                <label>Sản phẩm có nổi bật</label>
                                                <select name="featured" class="form-control" value="">
                                                    <option value="0">Không</option>
                                                    <option value="1">Có</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Trạng thái</label>
                                                <select name="product_state" class="form-control">
                                                    <option value="1">Còn hàng</option>
                                                    <option value="0">Hết hàng</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Ảnh sản phẩm</label>
                                                <input id="img" type="file" name="product_img" class="form-control hidden"
                                                    onchange="changeImg(this)">
                                                {!! showErrors1($errors, 'product_img') !!}
                                                <img id="avatar" class="thumbnail" width="100%" height="350px"
                                                    src="img/import-img.png">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Thông tin</label>
                                        <textarea name="info" style="width: 100%;height: 100px;"></textarea>
                                    </div>

                                </div>
                                <div class="col-xs-4">

                                    <div class="panel panel-default">
                                        <div class="panel-body tabs">
                                            <label>Các thuộc Tính <a href="{{ route('detail-attr') }}"><span
                                                        class="glyphicon glyphicon-cog"></span>
                                                    Tuỳ chọn</a></label>
                                                    {!! showErrors1($errors, 'attr_name') !!}
                                                    {!! showErrors1($errors, 'add_value') !!}
                                                    {{ShowSession(session('thong-bao'))}}
                                            <ul class="nav nav-tabs">
                                                @php
                                                $i=0
                                                @endphp
                                                @foreach ($attrs as $item)
                                                    <li @if ($i == 0) class='active' @endif><a
                                                            href="#tab{{ $item->id }}"
                                                            data-toggle="tab">{{ $item->name }}</a></li>
                                                    @php
                                                    $i=1
                                                    @endphp
                                                @endforeach
                                                <li><a href="#tab-add" data-toggle="tab">+</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                @foreach ($attrs as $value)
                                                    <div class="tab-pane fade @if ($i==1) active @endif in" id="tab{{ $value->id }}">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    @foreach ($value->values as $item_values)
                                                                        <th>{{ $item_values->value }}</th>
                                                                    @endforeach
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    @foreach ($value->values as $item_values)
                                                                        <td> <input class="form-check-input" type="checkbox"
                                                                                name="attr[{{$value->name}}][]" value="{{$item_values->value}}"> </td>
                                                                    @endforeach
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <hr>
                                                        <form action="{{route('add-value')}}" method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="">Thêm giá trị của thuộc tính</label>
                                                                <input type="hidden" name="id_attr" value="{{$value->id}}">
                                                                <input name="add_value" type="text" class="form-control"
                                                                    aria-describedby="helpId" placeholder="">

                                                                <div> <button name="add_val" type="submit">Thêm</button></div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    @php
                                                    $i=2
                                                    @endphp
                                                @endforeach
                                                <div class="tab-pane fade" id="tab-add">
                                                    <form action="{{ route('add-attr') }}" method="post">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="">Tên thuộc tính mới</label>
                                                            <input type="text" class="form-control" name="attr_name"
                                                                aria-describedby="helpId" placeholder="">
                                                            
                                                        </div>
                                                    <button type="submit" name="add_pro" class="btn btn-success"> <span
                                                            class="glyphicon glyphicon-plus"></span>
                                                        Thêm thuộc tính</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Miêu tả</label>
                                        <textarea id="editor" name="description"
                                            style="width: 100%;height: 100px;"></textarea>
                                    </div>
                                    <button class="btn btn-success" type="submit">Thêm sản phẩm</button>
                                    <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--/.row-->
    </div>
@endsection
