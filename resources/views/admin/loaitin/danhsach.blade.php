@extends('admin.layout.index') 
@section('content')
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Danh sách loại tin</h3>
				</div>
				@if (session('thongbao'))
				<div class="alert alert-success alert-dismissible">
					{{session('thongbao')}}
				</div>
				@endif
				<!-- /.box-header -->
				<div class="box-body">
					<table id="danhsachloaitin" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>Tên</th>
								<th>Tên không dấu</th>
								<th>Thể loại</th>
								<th>Edit</th>
								<th>Xóa</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($loaitin as $lt)
							<tr>
								<td>{{$lt->id}}</td>
								<td>{{$lt->Ten}}</td>
								<td>{{$lt->TenKhongDau}}</td>
								<td>{{$lt->theloai->Ten}}</td>
								<td class="text-center">
									<a href="admin/loaitin/sua/{{$lt->id}}"><i class="fa fa-pencil"></i>&nbsp; Sửa</a>
								</td>
								<td class="text-center">
									<a href="admin/loaitin/xoa/{{$lt->id}}"><i class="fa fa-trash"></i>&nbsp; Xóa</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->
@endsection
 
@section('script')
<script>
	$(function () {
			$('#danhsachloaitin').DataTable()
	})

</script>
@endsection