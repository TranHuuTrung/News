@extends('admin.layout.index') 
@section('content')
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Thêm người dùng</h3>
				</div>
				<!-- /.box-header -->
				@if (count($errors) > 0)
				<div class="alert alert-danger alert-dismissible">
					@foreach ($errors->all() as $err) {{$err}} <br> @endforeach
				</div>
				@endif
				@if (session('thongbao'))
				<div class="alert alert-success alert-dismissible">
					{{session('thongbao')}}
				</div>
				@endif
				<!-- form start -->
				<form role="form" action="admin/user/them" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}" />
					<div class="box-body">
						<div class="form-group">
							<label>Họ tên</label>
							<input type="text" name="name" class="form-control" placeholder="Nhập họ tên" />
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" placeholder="Nhập email" />
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Mật khẩu</label>
									<input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu" />
								</div>
							</div>
							<!-- /.col-md-6 -->
							<div class="col-md-6">
								<div class="form-group">
									<label>Nhập lại mật khẩu</label>
									<input type="password" name="passwordAgain" class="form-control" placeholder="Nhập lại mật khẩu" />
								</div>
							</div>
							<!-- /.col-md-6 -->
						</div>
						<!-- /.row -->
						<div class="form-group">
							<label>Loại người dùng</label>&nbsp;
							<label class="radio-inline">
								<input type="radio" name="quyen" value="0" checked>
								Thường
							</label>
							<label class="radio-inline">
								<input type="radio" name="quyen" value="1">
								Admin
							</label>
						</div>
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
						<button type="reset" class="btn btn-default btn-sm">Làm mới</button>
						<button type="submit" class="btn btn-success btn-sm">Thêm</button>
					</div>
				</form>
			</div>
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->
@endsection