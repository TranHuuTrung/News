@extends('admin.layout.index') 
@section('content')
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Thêm slide</h3>
				</div>
				<!-- /.box-header -->
				@if (count($errors) > 0)
				<div class="alert alert-danger alert-dismissible">
					@foreach ($errors->all() as $err) {{$err}} <br> @endforeach
				</div>
				@endif @if (session('thongbao'))
				<div class="alert alert-success alert-dismissible">
					{{session('thongbao')}}
				</div>
				@endif
				@if (session('loi'))
				<div class="alert alert-success alert-dismissible">
					{{session('loi')}}
				</div>
				@endif
				<!-- form start -->
				<form role="form" action="admin/slide/them" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}" />
					<div class="box-body">
						<div class="form-group">
							<label>Tên slide</label>
							<input type="text" name="Ten" class="form-control" placeholder="Nhập tên slide" />
						</div>
						<div class="form-group">
							<label>Nội dung</label>
							<textarea id="NoiDung" name="NoiDung" rows="10" cols="80" placeholder="Nhập tóm tắt tin tức"></textarea>
						</div>
						<div class="form-group">
							<label>Link</label>
							<input type="text" name="link" class="form-control" placeholder="Nhập link" />
						</div>
						<div class="form-group">
							<label>Hình đại diện</label>
							<input type="file" name="Hinh" />
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
 
@section('script')
<script>
	$(document).ready(function () {
				CKEDITOR.replace('NoiDung');
		});

</script>
@endsection