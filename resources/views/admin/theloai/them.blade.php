@extends('admin.layout.index') 
@section('content')
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Thêm thể loại</h3>
				</div>
				<!-- /.box-header -->
				@if (count($errors) > 0) 
					<div class="alert alert-danger alert-dismissible">
						@foreach ($errors->all() as $err)
							{{$err}} <br>
						@endforeach
					</div>
				@endif
				@if (session('thongbao'))
					<div class="alert alert-success alert-dismissible">
						{{session('thongbao')}}
					</div>
				@endif
				<!-- form start -->
				<form role="form" action="admin/theloai/them" method="POST">
					<input type="hidden" name="_token" value="{{csrf_token()}}" />
					<div class="box-body">
						<div class="form-group">
							<label>Tên</label>
							<input type="text" name="Ten" class="form-control" placeholder="Nhập tên thể loại" />
						</div>
					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<button type="button" class="btn btn-default btn-sm">Làm mới</button>
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