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
				<!-- form start -->
				<form role="form" action="admin/theloai/them" method="POST">
					<input type="hidden" name="_token" value="{{csrf_token()}}" />
					<div class="box-body">
						<div class="form-group">
							<label>Tên</label>
							<input type="text" name="Ten" class="form-control" placeholder="Nhập tên thể loại" />
						</div>
						<div class="form-group">
							<label>Tên Không Dấu</label>
							<input type="text" name="TenKhongDau" class="form-control" placeholder="Nhập tên thể loại không dấu" />
						</div>
					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<button type="button" class="btn btn-default btn-sm">Reset</button>
						<button type="submit" class="btn btn-success btn-sm">Add</button>
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