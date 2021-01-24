@extends('backend.master.master')
@section('title','Sửa giá trị của thuộc tính')
@section('product')
	class="active"
@endsection
@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Danh mục/Thuộc tính/Sửa giá trị của tính</li>
			</ol>
		</div>
		<!--/.row-->

	
		<!--/.row-->
		<div class="row col-md-offset-3 ">
			<div class="col-md-6">	
			<div class="panel panel-blue">
				<div class="panel-heading dark-overlay">Sửa giá trị của tính</div>
				{!! showErrors1($errors, 'name') !!}
				<div class="panel-body">
					<form action="{{route('edit-value-post',['id'=>$values->id])}}" method="post">
						@csrf
					<div class="form-group">
					  <label for="">Tên giá trị của thuộc tính</label>
					  <input type="text" name="name" class="form-control" placeholder="Nhập tên giá trị thuộc tính" aria-describedby="helpId" value="{{$values->value}}">
					</div>
					<div  align="right"><button class="btn btn-success" type="submit">Sửa</button></div>
				</form>
				</div>
			</div>
											
			</div>
			<!--/.col-->
		</div>
		<!--/.row-->
	</div>
	<!--/.main-->
	@endsection