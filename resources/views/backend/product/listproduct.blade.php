@extends('backend.master.master')
@section('title','Danh sách sản phẩm')
@section('product')
	class="active"
@endsection
@section('content')
	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Danh sách sản phẩm</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách sản phẩm</h1>
			</div>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">

					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<div class="alert bg-success" role="alert">
									<svg class="glyph stroked checkmark">
										<use xlink:href="#stroked-checkmark"></use>
									</svg>Đã thêm thành công<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
								</div>
								<a href="{{route('product.add')}}" class="btn btn-primary">Thêm sản phẩm</a>
								<table class="table table-bordered" style="margin-top:20px;">

									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Thông tin sản phẩm</th>
											<th>Giá sản phẩm</th>
											<th>Tình trạng</th>
											<th>Danh mục</th>
											<th>Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($products as $key => $item)
										<tr>
											<td>{{$products->firstitem()+ $key}}</td>
											<td>
												<div class="row">
													<div class="col-md-3"><img src="img/{{$item->img}}" alt="Áo đẹp" width="100px" class="thumbnail"></div>
													<div class="col-md-9">
														<p><strong>Mã sản phẩm : {{$item->product_code}}</strong></p>
														<p>Tên sản phẩm :{{$item->name}}</p>
														<p>Danh mục:{{$item->category->name}}</p>
														@foreach (attr_values($item->values) as $attibute=>$values)
														<p>{{$attibute}}:
															@foreach ($values as $value_item)
																{{$value_item}},
															@endforeach
														</p>
														@endforeach
													</div>
												</div>
											</td>
											<td>{{ number_format($item->price,0,"",",")}} VND</td>
											<td>
												@if ($item->state==1)
												<a class="btn btn-success" href="#" role="button">Còn hàng</a>
												@else
												<a class="btn btn-danger" href="#" role="button">Hết hàng</a>
												@endif
											</td>
											<td>{{$item->category->name}}</td>
											<td>
												<a href="{{route('product.edit')}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<div align='right'>
									{{$products->links()}}
								</div>
							</div>
							<div class="clearfix"></div>
						</div>

					</div>
				</div>
				<!--/.row-->


			</div>
			<!--end main-->
@endsection